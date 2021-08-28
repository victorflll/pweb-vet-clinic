<?php
  try {
    $username = "root";
    $password = "root";
  
    $connection = new PDO('mysql:host=localhost;dbname=vetsystem', $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  } catch(PDOException $e) {
    echo 'Conexão não realizada. Erro: ' . $e->getMessage();
  }
?>