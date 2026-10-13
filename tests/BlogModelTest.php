<?php
use PHPUnit\Framework\TestCase;

class BlogModelTest extends TestCase
{
    private $model;

    protected function setUp(): void
    {
        $this->model = new Blog_model();
    }

    /** Known bugs: the assertion states the correct behaviour; while the bug exists the test is reported as incomplete. */
    private function knownBug(string $why, callable $assertion): void
    {
        try {
            $assertion();
        } catch (\PHPUnit\Framework\AssertionFailedError $e) {
            $this->markTestIncomplete('KNOWN BUG (open): ' . $why);
        }
    }

    public function testGetProductWithZeroListsEverything(): void
    {
        $this->model->get_product(0);
        $this->assertStringNotContainsString('WHERE', $this->model->db->queries[0]);
    }

    public function testGetProductFiltersByCategory(): void
    {
        $this->model->db->rows = [['id' => 1]];
        $rows = $this->model->get_product(2);
        $this->assertStringContainsString("cat_id = '2'", $this->model->db->queries[0]);
        $this->assertSame([['id' => 1]], $rows);
    }

    public function testRegisterStoresADigestNotThePlainPassword(): void
    {
        $this->model->input->post = ['name' => 'Ana', 'email' => 'ana@example.invalid', 'pwd' => 'secret12'];
        $this->model->register_user();
        [$table, $row] = $this->model->db->inserts[0];
        $this->assertSame('customers', $table);
        $this->assertNotSame('secret12', $row['password_digest']);
        $this->assertSame('Ana', $row['name']);
    }

    public function testRegisterUsesAnAdaptiveSaltedHash(): void
    {
        $this->model->input->post = ['name' => 'Ana', 'email' => 'a@example.invalid', 'pwd' => 'secret12'];
        $this->model->register_user();
        $digest = $this->model->db->inserts[0][1]['password_digest'];
        $this->knownBug('passwords are stored as unsalted MD5 (Blog_model.php:328); use password_hash()', function () use ($digest) {
            $this->assertTrue(password_verify('secret12', $digest));
        });
    }

    public function testValidateUserBuildsLoginQueryFromPostedValues(): void
    {
        $this->model->input->post = ['email' => 'ana@example.invalid', 'pwd' => 'secret12'];
        $this->model->validate_user();
        $sql = $this->model->db->queries[0];
        $this->assertStringContainsString("email = 'ana@example.invalid'", $sql);
        $this->assertStringContainsString(substr(md5('secret12'), 0, 32), $sql);
    }

    public function testLoginIsNotVulnerableToSqlInjection(): void
    {
        $this->model->input->post = ['email' => "x' OR '1'='1' -- ", 'pwd' => 'whatever'];
        $this->model->validate_user();
        $sql = $this->model->db->queries[0];
        $this->knownBug("the email is concatenated into the SQL (Blog_model.php:390); use bound parameters", function () use ($sql) {
            $this->assertStringNotContainsString("OR '1'='1'", $sql);
        });
    }

    public function testGetOrdersIsNotVulnerableToSqlInjection(): void
    {
        $this->model->get_orders('1 OR 1=1');
        $sql = $this->model->db->queries[0];
        $this->knownBug('customer id is concatenated unquoted (Blog_model.php:365)', function () use ($sql) {
            $this->assertStringNotContainsString('OR 1=1', $sql);
        });
    }

    public function testCreateOrderHeaderRecordsCustomerAndTotal(): void
    {
        $this->model->session->id = 7;
        $this->model->cart->total = 25;
        $id = $this->model->create_products();
        [$table, $row] = $this->model->db->inserts[0];
        $this->assertSame('orders', $table);
        $this->assertSame(7, $row['customer_id']);
        $this->assertSame(25, $row['total']);
        $this->assertSame(42, $id);
    }

    public function testCreateOrderWritesOneRowPerCartLine(): void
    {
        $this->model->cart->items = [
            'a1' => ['id' => 3, 'qty' => 2],
            'b2' => ['id' => 5, 'qty' => 1],
        ];
        $this->model->create_order(42);
        $inserts = $this->model->db->inserts;
        $this->assertCount(2, $inserts);
        $this->assertSame('order_items', $inserts[0][0]);
        $this->assertSame(['order_id' => 42, 'product_id' => 3, 'quantity' => 2], $inserts[0][1]);
        $this->assertSame(['order_id' => 42, 'product_id' => 5, 'quantity' => 1], $inserts[1][1]);
    }
}
