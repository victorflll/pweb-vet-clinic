<?php
  try {
    $username = "root";
    $password = "root";
  
    $conn = new PDO('mysql:host=localhost;dbname=vetsystem', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  } catch(PDOException $e) {
    echo 'Conexão não realizada. Erro: ' . $e->getMessage();
  }
?>