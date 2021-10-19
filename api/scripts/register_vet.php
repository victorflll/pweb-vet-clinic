<?php
    include('../connection.php');
    include('../../models/vet.php');

    if(
        empty($_POST['name']) || 
        empty($_POST['email']) || 
        empty($_POST['cpf']) || 
        empty($_POST['password']) || 
        empty($_POST['street']) || 
        empty($_POST['neighborhood']) || 
        empty($_POST['city']) || 
        empty($_POST['state']) ||
        empty($_POST['crmv']) || 
        empty($_POST['wage']) || 
        empty($_POST['workload'])
        ){
        header('Location: ../../pages/register_vet.html');
        exit();
    }
    
    $adress = new Adress(
        $_POST['street'], 
        $_POST['houseNumber'], 
        $_POST['neighborhood'], 
        $_POST['city'], 
        $_POST['state']
    );
    $ps = md5($_POST["password"]);
	$vet = new Vet(
        $_POST['name'], 
        $_POST['email'], 
        $ps,
        $_POST['cpf'], 
        $adress,
        $_POST['crmv'], 
        $_POST['wage'], 
        $_POST['workload']
    );
    
    $name = $vet->getName();
    $email = $vet->getEmail();
    $cpf = $vet->getCpf();
    $password = $vet->getPassword();
    $street = $adress->getStreet();
    $houseNumber = $adress->getHouseNumber();
    $neighborhood = $adress->getNeighborhood();
    $city = $adress->getCity();
    $state = $adress->getState();
    $crmv = $vet->getCrmv();
    $wage = $vet->getWage();
    $workload = $vet->getWorkload();
    
    $i = 0;

    $sql = "INSERT INTO `vet`(
        `name`, 
        `email`, 
        `cpf`, 
        `password`, 
        `street`, 
        `houseNumber`, 
        `neighborhood`, 
        `city`, 
        `state`,
        `crmv`,
        `wage`,
        `workload`) 
    
    VALUES (
        '$name', 
        '$email', 
        '$cpf', 
        '$password',
        '$street',
        '$houseNumber',
        '$neighborhood',
        '$city',
        '$state',
        '$crmv',
        '$wage',
        '$workload')
    ");


    $select = "SELECT `cpf`, `email` FROM `vet`";
    $result = mysqli_query($connection, $select);
    
    while($row = mysqli_fetch_array($result)) {
        if($row['cpf'] == $cpf || $row['email'] == $email){
            $i++;
        }
    }

    if($i>0){
        echo "Veterinário já existente.";
    }else{ 
        mysqli_query($connection, $sql) or die(error());
        $response = array("success" => true);
        echo json_encode($response);

        echo "Cadastro realizado com sucesso.";
    }
?>