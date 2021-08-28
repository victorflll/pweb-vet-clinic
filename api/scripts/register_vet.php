<?php
    include('connection.php');
    include('models/vet.php');
    include('models/adress.php');
    
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
        header('Location: register_vet.html');
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

    $stmt = $connection->prepare("INSERT INTO `vet`(
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
        :name, 
        :email, 
        :cpf, 
        :password, 
        :street, 
        :houseNumber, 
        :neighborhood, 
        :city, 
        :state,
        :crmv,
        :wage,
        :workload
        )");

    $fetch = "SELECT `cpf`, `email` FROM `vet`";
    $result = $conn->query($fetch);
    while($row = $result->fetch()) {
        if($row['cpf'] == $cpf || $row['email'] == $email){
            $i++;
        }
    }

    if($i>0){
        echo "Veterinário já existente.";
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
            ':state'=> $state,
            ':crmv'=> $crmv,
            ':wage'=> $wage,
            ':workload'=> $workload
        ));

        echo "Cadastro realizado com sucesso.";
        header("Location: index.html");
    }
?>