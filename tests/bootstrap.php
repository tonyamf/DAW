<?php
// Minimal stand-ins for the CodeIgniter pieces Blog_model touches, so the model
// can be tested without MySQL, a web server or the framework itself.
define('BASEPATH', __DIR__ . '/');
define('APPPATH', dirname(__DIR__) . '/LAB12/application/');

class FakeDb
{
    public $queries = [];
    public $inserts = [];
    public $rows = [];          // what query()->result_array() returns
    private $nextId = 41;

    public function query($sql)
    {
        $this->queries[] = $sql;
        $rows = $this->rows;
        return new class($rows) {
            private $rows;
            public function __construct($rows) { $this->rows = $rows; }
            public function result_array() { return $this->rows; }
        };
    }
    public function insert($table, $data) { $this->inserts[] = [$table, $data]; }
    public function insert_id() { return ++$this->nextId; }
}

class FakeLoader { public function database() {} }

class FakeInput
{
    public $post = [];
    public function post($key) { return $this->post[$key] ?? null; }
}

class FakeCart
{
    public $items = [];
    public $total = 0;
    public function contents() { return $this->items; }
    public function total() { return $this->total; }
}

// Like the real CI_Model, collaborators appear lazily (Blog_model never calls parent::__construct()).
class CI_Model
{
    private $services = [];
    public function __get($name)
    {
        if (!isset($this->services[$name])) {
            $make = [
                'load' => function () { return new FakeLoader(); },
                'db' => function () { return new FakeDb(); },
                'input' => function () { return new FakeInput(); },
                'session' => function () { return new stdClass(); },
                'cart' => function () { return new FakeCart(); },
            ];
            $this->services[$name] = $make[$name]();
        }
        return $this->services[$name];
    }
}

require APPPATH . 'models/Blog_model.php';
