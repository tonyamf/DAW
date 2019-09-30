<?php

  require_once "HTML/Template/IT.php";
  require_once "db.php";

  $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
  if ($db)
  {
  // Cria um novo objecto template
  $template = new HTML_Template_IT('.');

  // Carrega o template Filmes2_TemplateIT.html
  $template->loadTemplatefile('register_template.html', true, true);

  $template->setVariable('MENU1', "Home");
  $template->setVariable('LINK1', "index.php");
  $template->setVariable('MENU2', "Register");
  $template->setVariable('LINK2', "register.php");
  $template->setVariable('MENU3', "Login");
  $template->setVariable('LINK3', "login.php");
  $template->setVariable('MENU4', "Contactos");
  $template->setVariable('NAME', "");
  $template->setVariable('MAIL', "");

  $x = $_GET["error"];

  if ($x==1)
  {
    echo 1;
    $nome = $_GET["NAME"];
    $template->setVariable('NAME', "$nome");
    $template->setCurrentBlock("BLOCK");
    $template->setVariable('MESSAGE', "Mail em Uso");
    $template->parseCurrentBlock();
  }
  elseif ($x==2)
  {
    echo 2;
    $nome = $_GET["NAME"];
    $template->setVariable('NAME', "$nome");
    $template->setCurrentBlock("BLOCK");
    $template->setVariable('MESSAGE', "Mail invalido");
    $template->parseCurrentBlock();
  }
  elseif ($x==3)
  {
    echo 3;
    $nome = $_GET["NAME"];
    $mail = $_GET["MAIL"];
    $template->setVariable('NAME', "$nome");
    $template->setVariable('MAIL', "$mail");
    $template->setCurrentBlock("BLOCK");
    $template->setVariable('MESSAGE', "Passwords Diferentes");
    $template->parseCurrentBlock();
  }
  else
  {
    $template->setVariable('NAME', "");
    $template->setVariable('MAIL', "");
  }

  $template->show();
  mysql_close($db);
  }
?>