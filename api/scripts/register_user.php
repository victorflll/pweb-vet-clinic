<?php
    include('../connection.php');
    include('../../models/user.php');
    
    if(
        empty($_POST['name']) || 
        empty($_POST['email']) || 
        empty($_POST['cpf']) || 
        empty($_POST['password']) ||
        empty($_POST['street']) || 
        empty($_POST['neighborhood']) || 
        empty($_POST['city']) || 
        empty($_POST['state'])
        ){
        header("Location: ../../pages/register_user.html");
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
	$user = new User(
        $_POST['name'], 
        $_POST['email'], 
        $ps,
        $_POST['cpf'],
        $adress
    );
    
    $name = $user->getName();
    $email = $user->getEmail();
    $cpf = $user->getCpf();
    $password = $user->getPassword();
    $street = $adress->getStreet();
    $houseNumber = $adress->getHouseNumber();
    $neighborhood = $adress->getNeighborhood();
    $city = $adress->getCity();
    $state = $adress->getState();
    
    $i = 0;

    $sql = "INSERT INTO `user` (`name`, 
        `email`, 
        `cpf`, 
        `password`, 
        `street`, 
        `houseNumber`, 
        `neighborhood`, 
        `city`, 
        `state`) 
    VALUES ('$name', 
        '$email', 
        '$cpf', 
        '$password',
        '$street',
        '$houseNumber',
        '$neighborhood',
        '$city',
        '$state')";


    $select = "SELECT `cpf`, `email` FROM `user`";
    $result = mysqli_query($connection, $select);

    while($row = mysqli_fetch_array($result)) {
        if($row['cpf'] == $cpf || $row['email'] == $email){
            $i++;
        }
    }

    if($i>0){
        echo "Cliente já existente.";
    }else{
        mysqli_query($connection, $sql) or die(error());
        $response = array("success" => true);
	    echo json_encode($response);

        echo "Cadastro realizado com sucesso.";
    } 
	
?>
