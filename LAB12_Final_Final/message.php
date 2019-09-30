<?php
  require_once "HTML/Template/IT.php";
  require_once "db.php";

   require_once "HTML/Template/IT.php";
  require_once "db.php";  
  $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
  if ($db)
  {
  // Cria um novo objecto template
  $template = new HTML_Template_IT('.');

  // Carrega o template Filmes2_TemplateIT.html
  $template->loadTemplatefile('message_template.html', true, true);

  $code = $_GET["msg"];
  if ($code==1)
  {
    $template->setVariable('MESSAGE', "Registo Efectuado com Sucesso");
    $template->setVariable('URL', "index.php");
  }
  elseif ($code==2) 
  {
    $template->setVariable('MESSAGE', "Bem Vindo");
    $template->setVariable('URL', "index.php");
  }
  elseif ($code==3) 
  {
    $template->setVariable('MESSAGE', "Volte Sempre");
    $template->setVariable('URL', "index.php");
  }
  elseif ($code==4) 
  {
    $template->setVariable('MESSAGE', "Obrigado pela compra!");
    $template->setVariable('URL', "index.php");
  }
  elseif ($code==5)
  {
    $template->setVariable('MESSAGE', "Pode continuar as suas compras!");
    $template->setVariable('URL', "checkout.php");
  }
  elseif ($code==6)
  {
    $template->setVariable('MESSAGE', "Carrinho Vazio");
    $template->setVariable('URL', "index.php");
  }

  $template->show();
  mysql_close($db);
}
?>