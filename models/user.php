<?php
    require_once "adress.php";

	class User{
		private $name;
		private $email;
		private $password;
        private $cpf;
        private Adress $adress;

		function __construct($name, $email, $password, $cpf, $adress){
			$this->name = $name;
			$this->email = $email;
			$this->password = $password;
			$this->cpf = $cpf;
			$this->adress = $adress;
		}

        public function getName(){
            return $this->name;
        }
    
        public function setName($name){
            $this->name = $name;
        }
    
        public function getEmail(){
            return $this->email;
        }
    
        public function setEmail($email){
            $this->email = $email;
        }
    
        public function getPassword(){
            return $this->password;
        }
    
        public function setPassword($password){
            $this->password = $password;
        }
    
        public function getCpf(){
            return $this->cpf;
        }
    
        public function setCpf($cpf){
            $this->cpf = $cpf;
        }
    
        public function getAdress(){
            return $this->adress;
        }
    
        public function setAdress($adress){
            $this->adress = $adress;
        }

	}
?>