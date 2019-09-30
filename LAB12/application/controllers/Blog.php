<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Blog extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->library('cart');
    }

    public function is_login(){
      $this->load->library('session');
      $data['addcart'] = base_url()."index.php/blog/CartItemInsert";
      $data['link1'] = site_url()."/blog/";
      $data['menu1'] = 'Home';
      $data['filtro_link'] = base_url()."index.php/blog/index";
      $data['addcart'] = base_url()."index.php/blog/CartItemInsert";

      $data['link2'] = site_url()."/blog/showOrders";
      $data['menu2'] = 'View Order';

      $data['link3'] = site_url()."/blog/logout";
      $data['menu3'] = 'Log Out';

      //$data['update_link'] = site_url()."/blog/post";
      $data['session_id'] = $this->session->id;
      $data['welcome'] = $this->session->name;
      return $data;
    }

    public function not_login(){
      $data['addcart'] = base_url()."index.php/blog/CartItemInsert";
      $data['link1'] = site_url()."/blog/";
      $data['menu1'] = 'Home';
      $data['filtro_link'] = base_url()."index.php/blog/index";
      $data['addcart'] = base_url()."index.php/blog/CartItemInsert";

      $data['link2'] = site_url()."/blog/register";
      $data['menu2'] = 'Register';

      $data['link3'] = site_url()."/blog/login";
      $data['menu3'] = 'Log In';

      $data['welcome'] = '';
      return $data;
    }

    public function index($category_id = NULL)
    {

      $this->load->library('session');
      if($this->session->id != NULL){
        $data = $this->is_login();
      }
      else{
        $data = $this->not_login();
      }

        $data['cart_link'] = site_url()."/blog/checkout";


        $data['empty_cart'] = site_url()."/blog/delete";
        $data['base_url'] = base_url();

        $data['cart'] = $this->cart->total();
        $data['total_price'] = $this->cart->total();
        $data['cartitems'] = $this->cart->total_items();
        $data['categories'] = $this->blog_model->get_category(0);
        if($category_id != 0){
          $result = $this->blog_model->get_product($category_id);
          $data['products'] = $result;
          $tupple = $this->blog_model->get_category($category_id);
          $data['filtro'] = $tupple[0]['name'];
        }else{
          $id=0;
          $data['filtro'] = "Pens";
          $result = $this->blog_model->get_product($id);
          $data['products'] = $result;
        }

      // $tuple = mysql_fetch_array($result, MYSQL_ASSOC);


        $this->smarty->view("application/views/templates/index_template.tpl", $data);
    }



    public function register()
    {
      $this->load->library('session');
      if($this->session->id != NULL){
        redirect('/blog');
      }
      $data = $this->not_login();
      $this->load->library('form_validation');
      $this->smarty->view("application/views/templates/register_template.tpl", $data);
      $data['name']  = $this->input->post('name');
			$data['email'] = $this->input->post('email');

      if(isset($_POST['register'])){
        $this->load->helper(array('form', 'url'));
        $this->form_validation->set_rules('pwd', 'Password', 'min_length[4]');
        $this->form_validation->set_rules('pwd2', 'Confirm password', 'matches[pwd]');
        $this->form_validation->set_rules('email', 'Email address', 'is_unique[customers.email]');

        if ($this->form_validation->run() === FALSE)
         {
           $data['messagem'] = validation_errors();

           $this->smarty->view('application/views/templates/register_template.tpl', $data);
         }

         else
         {
           $this->blog_model->register_user();
           $data['message']= 'Success: New user registered';
           $this->smarty->view('register_success.tpl');
         }
       }
     }


    public function login() {
         $this->load->library('session');
        if($this->session->id != NULL){
        redirect('/blog');
        }
       $data = $this->not_login();
       $this->smarty->view('application/views/templates/login_template.tpl', $data);
     }

     public function login_action() {
       if($this->session->id != NULL){
         redirect('/blog');
       }
       $this->load->library('session');
      $tupple = $this->blog_model->validate_user();
      if ($tupple != NULL)   {
          $this->session->name =  $tupple[0]['name'];
          $this->session->id = $tupple[0]['id'];
          $this->index();
        }
      else{
            $data['message'] = 'Login failed' ;
            $this->login();
        }
      }

      public function logout(){
        $this->load->library('session');
        session_destroy();
        redirect('/blog');
       }

      public function checkout(){
        $this->load->library('session');
        if($this->session->id != NULL){
          $data = $this->is_login();
        }
        else{
          $data = $this->not_login();
        }

        $data['cart_link'] = site_url()."/blog/checkout";

        if($this->cart->total_items() > 0){
          $data['criarOrder'] = site_url()."/blog/createOrder";
        }
        $data['cart'] = $this->cart->total();
        $data['buttoncart'] = site_url()."/blog/CartEdit";
        $data['empty_cart'] = site_url()."/blog/delete";
        $data['total_price'] = $this->cart->total();
        $data['cartitems'] = $this->cart->total_items();
        $data['products'] = $this->cart->contents();
        $this->smarty->view("application/views/templates/cart_template.tpl", $data);
      }

  public function CartItemInsert($product_cart){
    $sql  = "SELECT * FROM products
              WHERE id = '$product_cart';";
      $query = $this->db->query($sql);
      $result = $query->result_array();
      $data = array(
        'id'      => $result[0]['id'],
        'qty'     => 1,
        'price'   => $result[0]['price'],
        'name'    => $result[0]['name'],
        'image'    => $result[0]['image'],
        'description'    => $result[0]['description']
      );
      $this->cart->insert($data);
        redirect('/blog/index');
      // $this->smarty->view("application/views/templates/index_template.tpl", $data);
     }

     public function CartEdit($rowid, $added){
       $data = array(
         'rowid'      => $rowid,
         'qty'     => $added
       );
       $this->cart->update($data);
         redirect('/blog/checkout');
     }

     public function createOrder(){
       if($this->session->id != NULL &&  $this->cart->total_items() > 0){
         $data = $this->is_login();
          $id = $this->blog_model->create_products();
          $this->blog_model->create_order($id);
          $this->cart->destroy();
            redirect('/blog/index');
       }
       else if($this->session->id == NULL AND $this->cart->total_items() > 0){
         $data = $this->not_login();
          redirect('/blog/login');
       }   else{
             $this->cart->destroy();
         redirect('/blog/logout');
       }

     }


       public function showOrders(){
         if($this->session->id != NULL){
           $data = $this->is_login();

           $data['cart_link'] = site_url()."/blog/checkout";

           $data['cart'] = $this->cart->total();
           $data['empty_cart'] = site_url()."/blog/delete";
           $data['veritens'] = site_url()."/blog/showItems";
           $data['cartitems'] = $this->cart->total_items();
           $customer_id = $this->session->id;
           $data['orders'] = $this->blog_model->get_orders($customer_id);
           $this->smarty->view("application/views/templates/order_template.tpl", $data);
         }
         else{
           $data = $this->not_login();
            redirect('/blog/login');
         }
       }

       public function showItems($order_id){
         if($this->session->id != NULL){
           $data = $this->is_login();
           $data['cart_link'] = site_url()."/blog/checkout";
           $data['cart'] = $this->cart->total();
           $data['empty_cart'] = site_url()."/blog/delete";
           $data['voltar'] = site_url()."/blog/showOrders";
           $data['cartitems'] = $this->cart->total_items();
           $data['products_order'] = $this->blog_model->get_order_items($order_id);
           $this->smarty->view("application/views/templates/items_template.tpl", $data);
         }
         else{
           $data = $this->not_login();
            redirect('/blog/login');
         }
       }


    public function delete(){
      $this->cart->destroy();
      redirect('/blog/index');
    }




}
?>
