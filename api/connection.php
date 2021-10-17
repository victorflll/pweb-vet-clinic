<?php

    $connection = mysqli_connect("127.0.0.1", "root", "");

    if (!$connection) die ("<h1>Falha na conexão com o Banco de Dados!</h1>");

    $db = mysqli_select_db($connection, "vetsystem");

?>