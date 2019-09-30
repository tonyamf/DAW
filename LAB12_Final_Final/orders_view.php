<?php  
require_once "HTML/Template/IT.php"; 
require_once "db.php";
session_start();
// ligação à base de dados
$db = dbconnect($hostname,$db_name,$db_user,$db_passwd); 
if($db) {
  // Cria um novo objecto template
  $template = new HTML_Template_IT('.');
  // Carrega o template Filmes2_TemplateIT.html
  $template->loadTemplatefile('orderlist_template.html', true, true);

  $name = $_SESSION['user'];
  $id = $_SESSION['id'];
  //echo $atual_valor;
  $template->setVariable('MENU1', "Welcome ". $name);
  $template->setVariable('MENU2', "Menu Inicial");
  $template->setVariable('LINK2', "index.php");
  $template->setVariable('MENU3', "Logout");
  $template->setVariable('LINK3', "logout_action.php");
  $template->setVariable('MENU4', "Contactos");
  $query0 = "SELECT * FROM orders WHERE customer_id = '$id' AND status = '1';";

  $sql0 = mysql_query($query0, $db);
  //echo $id;
  //echo $name;
  $nrows  = mysql_num_rows($sql0);
  //echo "Ola";
  for($i=0; $i<$nrows; $i++) 
  {
    $tuple0 = mysql_fetch_array($sql0, MYSQL_ASSOC);
    $template->setCurrentBlock("TODOS");
    $template->setVariable('ID', $tuple0['id']);
    $template->setVariable('DATE', $tuple0['created_at']);
    $template->setVariable('STATUS', "Enviada");
    $template->setVariable('TOTAL', $tuple0['total']);
    $template->parseCurrentBlock();
  }

      $query2 = "SELECT MAX(id) FROM orders WHERE customer_id='$id';";
      $sql2 = mysql_query($query2, $db);
      //echo $sql2['id_order'];
      $tuple2 = mysql_fetch_array($sql2, MYSQL_ASSOC);
      $_SESSION['id_order'] = $tuple2['MAX(id)'];
      //echo $_SESSION['id_order'];
// Mostra a tabela
  $template->show();
  // fechar a ligação à base de dados
  mysql_close($db);
} // end if 
?>