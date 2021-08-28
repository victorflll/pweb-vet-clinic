<?php
    include('../connection.php');
    include('../../models/user.php');
    include('../../models/adress.php');
    
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
        header('Location: register_user.html');
        exit();
    }

    $adress = new Adress(
        $_POST['street'], 
        $_POST['housenumber'], 
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

    $stmt = $connection->prepare("INSERT INTO `user`(
        `name`, 
        `email`, 
        `cpf`, 
        `password`, 
        `street`, 
        `houseNumber`, 
        `neighborhood`, 
        `city`, 
        `state`) 
    VALUES (
        :name, 
        :email, 
        :cpf, 
        :password, 
        :street, 
        :houseNumber, 
        :neighborhood, 
        :city, 
        :state
        )");

    $fetch = "SELECT `cpf`, `email` FROM `user`";
    $result = $conn->query($fetch);
    while($row = $result->fetch()) {
        if($row['cpf'] == $cpf || $row['email'] == $email){
            $i++;
        }
    }

    if($i>0){
        echo "Cliente já existente.";
    }else{
        $stmt->execute(array(
            ':name' => $name, 
            ':email' => $email, 
            ':cpf' => $cpf, 
            ':password'=> $password,
            ':street' => $street, 
            ':houseNumber' => $houseNumber, 
            ':neighborhood' => $neighborhood, 
            ':city'=> $city,
            ':state'=> $state
        ));

        echo "Cadastro realizado com sucesso.";
        header("Location: index.html");
    }
?>