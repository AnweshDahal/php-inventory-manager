<?php
  // create a new data source name
  $dsn = "mysql:host=localhost;dbname=clausia_inventory";
  // username
  $username = "root";
  // password
  // $password = "p@5$w0rd";

  // try creating a PDO
  try{
    $db = new PDO($dsn, $username);
  } catch (PDOException $e){
    $error = "Database Error: ";
    $error .= $e->getMessage();
    include('view/error.php');
    exit();
  }
?>