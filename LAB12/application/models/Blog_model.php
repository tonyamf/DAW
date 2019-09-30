<?php
class Blog_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_product($id)
	{
		if($id != 0){
			$sql  = "SELECT * FROM products
             	WHERE cat_id = '$id';";
						}else{
							$sql  = "SELECT * FROM products;";
						}
	    $query = $this->db->query($sql);
	    //$db = $this->load->database();
	    $result = $query->result_array();
	    return $result;
	}

	public function get_cart($id)
	{
			$sql  = "SELECT * FROM products
							WHERE id = '$id';";
			$query = $this->db->query($sql);
			//$db = $this->load->database();
			$result = $query->result_array();
			return $result;
	}

	public function get_category($id)
	{
		if($id != 0){
			$sql  = "SELECT * FROM categories
							WHERE id = '$id';";
						}else{
							$sql  = "SELECT* FROM categories";
						}
						$query = $this->db->query($sql);
	    //$db = $this->load->database();
	    $result = $query->result_array();
			return $result;
	}

	public function register_user()  {

		//$password = substr(md5($pwd),0,32);
		$password = substr(md5($this->input->post('pwd')),0,32);
		$data = array(
			'name'  => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password_digest' => $password,
			'created_at' =>  date("Y-m-d H:i:s"),
			'updated_at' =>  date("Y-m-d H:i:s")
		);
		$this->db->insert('customers', $data);
	}

	public function create_products(){
		$data = array(
			'customer_id'  => $this->session->id,
			'created_at' =>  date("Y-m-d H:i:s"),
			'total' =>  $this->cart->total()

		);
		$this->db->insert('orders', $data);
				return $this->db->insert_id();
	}

	public function create_order($id){

		foreach ($this->cart->contents() as $items):
			$data = array(
				'order_id'  => $id,
				'product_id' => $items['id'],
				'quantity' => $items['qty']
			);
			$this->db->insert('order_items', $data);
		endforeach;
	}

	public function get_orders($customer_id)
	{
			$sql  = "SELECT* FROM orders
							WHERE customer_id = $customer_id";
			$query = $this->db->query($sql);
			//$db = $this->load->database();
			$result = $query->result_array();
			return $result;
	}


	public function get_order_items($orders_id)
	{
			$sql  = "SELECT order_items.quantity, products.image, products.price,
			products.name, products.description
			 FROM order_items INNER JOIN products ON
			 products.id = order_items.product_id WHERE order_items.order_id = $orders_id";
			$query = $this->db->query($sql);
			//$db = $this->load->database();
			$result = $query->result_array();
			return $result;
	}


	public function validate_user(){

		$password = substr(md5($this->input->post('pwd')),0,32);
		$email = $this->input->post('email');
		$query = $this->db->query("SELECT * FROM customers WHERE email = '$email' AND password_digest='$password'");
		return $query->result_array();
	}



}
?>
