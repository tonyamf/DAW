<?php

  require_once "HTML/Template/IT.php";
  require_once "db.php";
  session_start();

  $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
  if ($db)
  {

  // Cria um novo objecto template
  $template = new HTML_Template_IT('.');

  // Carrega o template Filmes2_TemplateIT.html
  $template->loadTemplatefile('login_template.html', true, true);

  $template->setVariable('MENU1', "Home");
  $template->setVariable('LINK1', "index.php");
  $template->setVariable('MENU2', "Register");
  $template->setVariable('LINK2', "register.php");
  $template->setVariable('MENU3', "Login");
  $template->setVariable('LINK3', "login.php");
  $template->setVariable('MENU4', "Contactos");

  $x = $_GET["error"];

  if ($x==1)
  {
  	$template->setCurrentBlock("BLOCK");
    $template->setVariable('MESSAGE', "Login Invalido");
    $template->parseCurrentBlock();
  }
  elseif ($x==2)
  {
    $template->setCurrentBlock("BLOCK");
    $template->setVariable('MESSAGE', "Necessita Login para avancar na Order");
    $template->parseCurrentBlock();
  }
  $template->show();
  mysql_close($db);
  }
?>