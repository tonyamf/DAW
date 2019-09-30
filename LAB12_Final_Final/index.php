<?php  
require_once "HTML/Template/IT.php"; 
require_once "db.php";
session_start();
// ligação à base de dados
$db = dbconnect($hostname,$db_name,$db_user,$db_passwd); 
if($db) {

  if (empty($_SESSION['cart']))
    {
      $cart = array();
      $_SESSION['cart'] = $cart;
      $_SESSION['valor'] = 0;
    }
  //$cart = array();
  //$_SESSION['cart'] = $cart; 
  $atual_cart = $_SESSION['cart'];
  print_r($atual_cart);

  foreach ($atual_cart as $x) 
  {
    echo $x. " ";  
  } 

  echo "Valor e:". $_SESSION['valor'];
  // Cria um novo objecto template
  $template = new HTML_Template_IT('.');
  // Carrega o template Filmes2_TemplateIT.html
  $template->loadTemplatefile('index_template.html', true, true);
  //echo $_SESSION['id_order'];
  if (empty($_SESSION['id']))
  {
  $template->setVariable('MENU1', "Home");
  $template->setVariable('LINK1', "index.php");
  $template->setVariable('MENU2', "Register");
  $template->setVariable('LINK2', "register.php");
  $template->setVariable('MENU3', "Login");
  $template->setVariable('LINK3', "login.php");
  $template->setVariable('MENU4', "Contactos");

  $query5 = "SELECT * from orders WHERE customer_id='2';";
  $sql5 = mysql_query($query5);
  $tuple5 = mysql_fetch_array($sql5, MYSQL_ASSOC);
  $total = $_SESSION['valor'];

  $template->setVariable('VALUE', "$total");

  if ($_SESSION['valor']!=0)
  {
    $template->setVariable('CAR', "Carrinho");
  }
  }

  if (isset($_SESSION['id']))
  {
  $name = $_SESSION['user'];
 // echo $id_order;
  $template->setVariable('MENU1', "Welcome ". $name);
  $template->setVariable('MENU2', "Orders");
  $template->setVariable('LINK2', "orders_view.php");
  $template->setVariable('MENU3', "Logout");
  $template->setVariable('LINK3', "logout_action.php");
  $template->setVariable('MENU4', "Contactos");
  $template->setVariable('VALUE', $_SESSION['valor']);

  if ($atual_valor!=0)
  $template->setVariable('CAR', "Carrinho");

  
  }

  $sucess = $_GET['success'];
  if (isset($sucess))
  {
    echo '<script language="javascript">';
    echo 'alert("Adicionado no Carrinho")';
    echo '</script>';
  }
  
  $template->setVariable('SEC1', "Todos");
  $template->setVariable('SEC2', "Bundesliga");
  $template->setVariable('SEC3', "La Liga");
  $template->setVariable('SEC4', "Ligue 1");
  $template->setVariable('SEC5', "Premier League");
  $template->setVariable('SEC6', "Liga NOS");
  $template->setVariable('SEC7', "Serie A");

  $query = "SELECT * 
  			FROM products
  			ORDER BY price DESC";

  if(!($result = @ mysql_query($query,$db)))
   showerror();

	$nrows  = mysql_num_rows($result);
    for($i=0; $i<$nrows; $i++) 
    {
      $tuple = mysql_fetch_array($result,MYSQL_ASSOC);
      $template->setCurrentBlock("TODOS");
      $template->setVariable('ID', $tuple['id']);
      $template->setVariable('INF', $tuple['description']);
      $template->setVariable('VALOR', $tuple['price']);
      $template->setVariable('IMG', $tuple['image']);
      $template->parseCurrentBlock();

     	$template->setCurrentBlock("GER");
     	if ($tuple['cat_id']==1)
     	{
	     	$template->setVariable('ID', $tuple['id']);
	     	$template->setVariable('INF', $tuple['description']);
	     	$template->setVariable('VALOR', $tuple['price']);
	     	$template->setVariable('IMG', $tuple['image']);
     	}
     	$template->parseCurrentBlock();

     	$template->setCurrentBlock("SPN");
     	if ($tuple['cat_id']==2)
     	{
	     	$template->setVariable('ID', $tuple['id']);
	     	$template->setVariable('INF', $tuple['description']);
	     	$template->setVariable('VALOR', $tuple['price']);
	     	$template->setVariable('IMG', $tuple['image']);
     	}
     	$template->parseCurrentBlock();

     	$template->setCurrentBlock("FR");
     	if ($tuple['cat_id']==3)
     	{
	     	$template->setVariable('ID', $tuple['id']);
	     	$template->setVariable('INF', $tuple['description']);
	     	$template->setVariable('VALOR', $tuple['price']);
	     	$template->setVariable('IMG', $tuple['image']);
     	}
     	$template->parseCurrentBlock();

     	$template->setCurrentBlock("ENG");
     	if ($tuple['cat_id']==4)
     	{
	     	$template->setVariable('ID', $tuple['id']);
	     	$template->setVariable('INF', $tuple['description']);
	     	$template->setVariable('VALOR', $tuple['price']);
	     	$template->setVariable('IMG', $tuple['image']);
     	}
     	$template->parseCurrentBlock();

     	$template->setCurrentBlock("PT");
     	if ($tuple['cat_id']==5)
     	{
	     	$template->setVariable('ID', $tuple['id']);
	     	$template->setVariable('INF', $tuple['description']);
	     	$template->setVariable('VALOR', $tuple['price']);
	     	$template->setVariable('IMG', $tuple['image']);
     	}
     	$template->parseCurrentBlock();

     	$template->setCurrentBlock("ITA");
     	if ($tuple['cat_id']==6)
     	{
	     	$template->setVariable('ID', $tuple['id']);
	     	$template->setVariable('INF', $tuple['description']);
	     	$template->setVariable('VALOR', $tuple['price']);
	     	$template->setVariable('IMG', $tuple['image']);
     	}
     	$template->parseCurrentBlock();


    }

  // Mostra a tabela
  $template->show();
  // fechar a ligação à base de dados
  mysql_close($db);
} // end if 
?>