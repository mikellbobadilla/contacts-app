<?php

$HOST = "localhost";
$DATABASE = "contactos";
$USER = "root";
$PASS = "";

// conecting to database
try{
  $conn = new PDO(
    "mysql:host=$HOST;dbname=$DATABASE",
    $USER,
    $PASS
  );
}catch(PDOException $e){
  die("PDO Connection Error: " . $e->getMessage());
}

?>
