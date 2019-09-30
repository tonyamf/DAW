<?php
  session_start();
  require_once "HTML/Template/IT.php";
  require_once "db.php";

  $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
  if ($db)
  {
    $id = $_GET['id'];
    $sucess=1;
    //die($_GET['id']);
    //echo "id do produto ". $id;
    //echo "\nid do utilizador " . $id_user; 
    $query = "SELECT * FROM products WHERE id='$id';";
    $result = mysql_query($query, $db);
    $tuple = mysql_fetch_array($result,MYSQL_ASSOC);
    $valor = $tuple['price'];

    if(isset($_SESSION['id']))
    {

    $id_order = $_SESSION['id_order'];
    $query0 = "SELECT * FROM orders WHERE id='$id_order';";
    $result0 = mysql_query($query0, $db);
    $tuple0 = mysql_fetch_array($result0,MYSQL_ASSOC);

    $query3 = "SELECT * FROM order_items WHERE product_id='$id' AND order_id='$id_order';";
    $sql3 = mysql_query($query3, $db);
    $tuple3 = mysql_fetch_array($sql3, MYSQL_ASSOC);
    $atual_qt = $tuple3['quantity'];
    $final_qt = $atual_qt - 1;

    if ($final_qt==0)
    {
      $query2 = "DELETE from order_items where product_id = '$id' AND order_id = '$id_order';";
      $result2 = mysql_query($query2, $db);
    }
    else
    {
    $query4 = "UPDATE order_items SET quantity='$final_qt' WHERE product_id='$id' AND order_id='$id_order';";
    $sql4 = mysql_query($query4, $db);
    }
    
    //echo $valor;
    $atual_valor = $tuple0['total'];
   // echo " ".$_SESSION['valor'];
    $total = $atual_valor-$valor;

    $query1 = "UPDATE orders SET total='$total' WHERE id='$id_order';";
    $result1 = mysql_query($query1, $db);
    

    header("Location: checkout.php?success=1");
    }

     // echo $valor;
      
      $_SESSION['valor']-=$valor;
     // echo $_SESSION['valor'];
      echo " ".$_SESSION['cart'][4];
      echo $id;
      $key = array_search($id, $_SESSION['cart']);
      echo " ".$key;


    if (($key = array_search($id, $_SESSION['cart'])) !== false) 
    {
      echo " ".$_SESSION['cart'][$key];
      unset($_SESSION['cart'][$key]);
    }

    header("Location: checkout.php?success=1");
    mysql_close($db);
  }
?>