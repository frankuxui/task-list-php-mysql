<?php

$conexionName=  "localhost";
$user= "root"; 
$password= "";
$dataBaseName= "task_list";

try {
  $connection = new PDO("mysql:host=$conexionName;dbname=$dataBaseName", $user, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
  echo "Conection failed: " . $error->getMessage(); 
}


?>