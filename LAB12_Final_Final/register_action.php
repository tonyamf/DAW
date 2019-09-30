<?php

  require_once "HTML/Template/IT.php";
  require_once "db.php";

  
  $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
  if ($db)
  {
  	$nome = htmlspecialchars($_GET["name"]);
  	$email = $_GET["mail"];
  	$pwd1 = $_GET["pwd"];
  	$pwd2 = $_GET["pwdcf"];
    $error = 0;
    $msg = 0;

  	$select = mysql_query("SELECT email FROM customers WHERE email = '$email';");

  	if (mysql_num_rows($select))
    {
    	header("Location:register.php?error=1&NAME=$nome");
    }
	  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
    	header("Location:register.php?error=2&NAME=$nome");
    }
    elseif ($pwd1!=$pwd2) 
    {
      header("Location:register.php?error=3&NAME=$nome&MAIL=$email");
    }
    else
    {
      $password = substr(md5($pwd1),0,32);
      $date = date("Y-m-d H:i:s");
  	  $query = "INSERT INTO customers (name, email, created_at, updated_at, password_digest) VALUES ('$nome', '$email','$date', '$date', '$password');";
      mysql_query($query,$db);
  	  header("Location: message.php?msg=1");
    }
   	mysql_close($db);
  }	
?>