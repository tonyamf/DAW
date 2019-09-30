<?php

  require_once "HTML/Template/IT.php";
  require_once "db.php";

  session_start();
  // ligação à base de dados
  $db = dbconnect($hostname,$db_name,$db_user,$db_passwd); 
  if($db) 
  {

  	// Cria um novo objecto template
  	$template = new HTML_Template_IT('.');
  	// Carrega o template Filmes2_TemplateIT.html
  	$template->loadTemplatefile('checkout_template.html', true, true);
    //echo $_SESSION['id'];

  	if (isset($_SESSION['id']))
	{
	  $name = $_SESSION['user'];
	  //echo $atual_valor;
	  $template->setVariable('MENU1', "Welcome ". $name);
	  $template->setVariable('MENU2', "Orders");
 	  $template->setVariable('LINK2', "orders_view.php");
	  
	  $template->setVariable('MENU3', "Logout");
	  $template->setVariable('LINK3', "logout_action.php");
	  $template->setVariable('MENU4', "Contactos");
	  $template->setVariable('VALUE', $_SESSION['valor']);
	  $template->setVariable('CAR', "Voltar as compras");
	  $template->setVariable('LINKCAR', "index.php");

	  $sucess = $_GET['success'];
 	  if (isset($sucess))
  	  {
    	echo '<script language="javascript">';
    	echo 'alert("Item removido do Carrinho")';
    	echo '</script>';
  	  }
    }

    if (empty($_SESSION['id']))
    {
    $atual_valor = $_SESSION['valor'];
    //echo $atual_valor;
    $template->setVariable('MENU1', "Home");
    $template->setVariable('LINK1', "index.php");
    $template->setVariable('MENU2', "Register");
    $template->setVariable('LINK2', "register.php");
    $template->setVariable('MENU3', "Login");
    $template->setVariable('LINK3', "login.php");
    $template->setVariable('MENU4', "Contactos");
    $template->setVariable('VALUE', $atual_valor);

    $template->setVariable('CAR', "Voltar as compras");
    $template->setVariable('LINKCAR', "index.php");

    $sucess = $_GET['success'];
    if (isset($sucess))
      {
      echo '<script language="javascript">';
      echo 'alert("Item removido do Carrinho")';
      echo '</script>';
      }
    }

    foreach ($_SESSION['cart'] as $x) 
    {
    
    $query1 = "SELECT products.id, products.description , products.price, products.image, order_items.quantity
    FROM products
    INNER JOIN order_items ON products.id = order_items.product_id
    WHERE products.id = '$x';";

    $sql1 = mysql_query($query1, $db);
    $tuple1 = mysql_fetch_array($sql1, MYSQL_ASSOC);
    $template->setCurrentBlock("TODOS");
    $template->setVariable('ID', $tuple1['id']);
    $template->setVariable('INF', $tuple1['description']);
    $template->setVariable('VALOR', $tuple1['price']);
    $template->setVariable('IMG', $tuple1['image']);
    $template->setVariable('NUM', $tuple1['quantity']);
    $template->parseCurrentBlock();
    }

    $atual_cart = $_SESSION['cart'];
  print_r($atual_cart);

  foreach ($atual_cart as $x) 
  {
    echo $x. " ";  
  } 


  	// Mostra a tabela
  	$template->show();
  	// fechar a ligação à base de dados
  	mysql_close($db);
  }
?>