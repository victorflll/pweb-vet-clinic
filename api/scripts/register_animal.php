<?php
    include('../connection.php');
    include('../../models/animal.php');
    
    if(
        empty($_POST['name']) || 
        empty($_POST['age']) || 
        empty($_POST['type']) || 
        empty($_POST['breed']) || 
        empty($_POST['gender']) || 
        empty($_POST['size']) ||
        empty($_POST['fur']) || 
        empty($_POST['furCollor'])
        ){
        header('Location: ../../pages/register_animal.html');
        exit();
    }

	$animal = new Animal(
        $_POST['name'], 
        $_POST['age'], 
        $_POST['deficiency'], 
        $_POST['type'], 
        $_POST['breed'],
        $_POST['gender'],
        $_POST['size'],
        $_POST['fur'],
        $_POST['furCollor'],
        $_POST['additionalFeatures'],
    );
    
    $name = $animal->getName();
    $age = $animal->getAge();
    $deficiency = $animal->getDeficiency();
    $type = $animal->getType();
    $breed = $animal->getBreed();
    $gender = $animal->getGender();
    $size = $animal->getSize();
    $fur = $animal->getFur();
    $furCollor = $animal->getFurCollor();
    $additionalFeatures = $animal->getAdditionalFeatures();

    $sql = "INSERT INTO `animal` (`name`, 
    `age`, 
    `deficiency`, 
    `type`, 
    `breed`, 
    `gender`, 
    `size`, 
    `fur`,
    `furCollor`,
    `additionalFeatures`) 
    VALUES ('$name', 
    '$age', 
    '$deficiency', 
    '$type',
    '$breed',
    '$gender',
    '$size',
    '$fur',
    '$furCollor',
    '$additionalFeatures')";

	mysqli_query($connection, $sql) or die(error());
	$response = array("success" => true);
	echo json_encode($response);

    echo "Cadastro realizado com sucesso.";
?>