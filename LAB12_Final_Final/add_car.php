<?php
  
  require_once "HTML/Template/IT.php";
  require_once "db.php";

  $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
  if ($db)
  {
    session_start();
    //echo $_SESSION['id'];
    //echo " ".$_SESSION['id_order'];
    $id = $_GET['id'];
    $sucess=1; 
    $query = "SELECT * FROM products WHERE id='$id';";
    $result = mysql_query($query, $db);
    $tuple = mysql_fetch_array($result,MYSQL_ASSOC);
    $valor = $tuple['price'];
    array_push($_SESSION['cart'], $id);
    $_SESSION['valor']+=$valor;
    header("Location: index.php?success=1");
    echo $id. " ";
    
    echo " ".$_SESSION['cart']; 


    mysql_close($db);
  }
?>