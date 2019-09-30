<?php

  require_once "HTML/Template/IT.php";
  require_once "db.php";

  $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
  if ($db)
  {
  	$email = $_POST["mail"];
  	$pwd = $_POST["pwd"];
    $password = substr(md5($pwd),0,32);
    $error = 0;
    $msg = 0;

    $result = mysql_query("SELECT * FROM customers WHERE email = '$email' AND password_digest = '$password';");
     //SELECT * FROM users WHERE email = 'vascolhao@gmail.com' AND password_digest = '3de57671408862bb3945d01f000fa991';
    
    $tuple = mysql_fetch_array($result,MYSQL_ASSOC);
    
    $nrows  = mysql_num_rows($result);
    if ($nrows==1)
    {
      session_start();
      $_SESSION['id'] = $tuple['id'];
      $_SESSION['user'] = $tuple['name'];  
      header("Location:message.php?msg=5");
      }
    else
    {
      header("Location:login.php?error=1");
    }
    mysql_close($db);
  } 
?>