<?php
  session_start();
  require_once "HTML/Template/IT.php";
  require_once "db.php";
  $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
  if ($db)
  {
      $msg = 3;
      $error = 2;
     // echo " ". $msg;
      if(isset($_SESSION['id']))
      {
      $id = $_SESSION['id']; 
      $date = date("Y-m-d H:i:s");
      $total = $_SESSION['valor'];
      $query = "INSERT INTO orders (customer_id, created_at, status, total) VALUES ('$id', '$date', '1', '$total');";
      $query2 = "SELECT MAX(id) FROM orders WHERE customer_id='$id';";
      $sql = mysql_query($query, $db);
      $sql2 = mysql_query($query2, $db);
      //echo $sql2['id_order'];
      $tuple2 = mysql_fetch_array($sql2, MYSQL_ASSOC);
      $id_order = $tuple2['MAX(id)'];

      foreach ($_SESSION['cart'] as $id) 
        {
          $query7 = "SELECT * FROM order_items WHERE order_id='$id_order' AND product_id='$id';";
          $sql7 = mysql_query($query7, $db);
          $nrows  = mysql_num_rows($sql7);


          if($nrows==1)
          {
             $tuple7 = mysql_fetch_array($sql7,MYSQL_ASSOC);
             $unity = $tuple7['quantity'];
             $unity_final = $unity+1;
              
             $query8 = "UPDATE order_items SET quantity='$unity_final' WHERE order_id='$id_order' AND product_id='$id';";
             $sql8 =mysql_query($query8, $db);
          }
          else
        {
          $query2 = "INSERT INTO order_items(order_id, product_id, quantity) VALUES ('$id_order', '$id', '1');";
          $result2 = mysql_query($query2, $db);
        }
        }

      $array = array();
      $_SESSION['cart'] = $array;
      unset($_SESSION['id_order']);

      unset($_SESSION['valor']);
      header("location: message.php?msg=4");
      }

    if(empty($_SESSION['id']))
    {
      header("Location: login.php?error=2");
    }
    mysql_close($db);
  }
?>