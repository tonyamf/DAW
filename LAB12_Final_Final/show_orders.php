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
    $template->loadTemplatefile('order_template.html', true, true);

    $name = $_SESSION['user'];
    $id = $_SESSION['id'];

    $id_order = $_GET['id'];
    //echo $_SESSION['id_order'];
    $template->setVariable('MENU1', "Welcome ". $name);
    $template->setVariable('MENU2', "Orders");
    $template->setVariable('LINK2', "orders_view.php");
    $template->setVariable('MENU3', "Logout");
    $template->setVariable('LINK3', "logout_action.php");
    $template->setVariable('MENU4', "Contactos");

    $query1 = "SELECT * FROM orders WHERE id = '$id_order';";
    $sql1 = mysql_query($query1);
    $tuple1 = mysql_fetch_array($sql1, MYSQL_ASSOC);
    $total = $tuple1['total'];
    //echo $total;
    $template->setVariable('TOTAL', "$total");   
    $template->setVariable('ORDER_ID', $id_order);

    $query0 = "SELECT products.id, products.description , products.price, products.image, order_items.quantity
      FROM products
      INNER JOIN order_items ON products.id = order_items.product_id
      WHERE order_items.order_id = '$id_order';";

    $sql0 = mysql_query($query0, $db);
    $nrows  = mysql_num_rows($sql0);

    for($i=0; $i<$nrows; $i++) 
      {
      $tuple0 = mysql_fetch_array($sql0, MYSQL_ASSOC);
      $template->setCurrentBlock("TODOS");
     // echo " ".$tuple0['id'];
     // echo " ".$tuple0['description'];
      //echo " ".$tuple0['price'];
     // echo " ".$tuple0['image'];
      $template->setVariable('ID', $tuple0['id']);
      $template->setVariable('INF', $tuple0['description']);
      $template->setVariable('VALOR', $tuple0['price']);
      $template->setVariable('IMG', $tuple0['image']);
      $template->setVariable('NUM', $tuple0['quantity']);
      $template->parseCurrentBlock();
      }

    // Mostra a tabela
    $template->show();
    // fechar a ligação à base de dados
   mysql_close($db);
  // end if 
}