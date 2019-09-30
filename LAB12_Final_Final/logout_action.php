<?php

  require_once "HTML/Template/IT.php";
  require_once "db.php";

  session_start();
  $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
  if ($db)
  {
  session_destroy();
  $msg = 0;
  header("Location:message.php?msg=3");
  mysql_close($db);

  }
?>