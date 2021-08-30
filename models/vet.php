<?php
    require_once "adress.php";

	class Vet{
		private $name;
		private $email;
		private $password;
        private $cpf;
        private Adress $adress;
        private $crmv;
        private $wage;
        private $workload;

		function __construct($name, $email, $password, $cpf, $adress, $crmv, $wage, $workload)
        {
			$this->name = $name;
			$this->email = $email;
			$this->password = $password;
			$this->cpf = $cpf;
            $this->adress = $adress;
            $this->crmv = $crmv;
            $this->wage = $wage;
            $this->workload = $workload;
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
    
        public function getCrmv(){
            return $this->crmv;
        }
    
        public function setCrmv($crmv){
            $this->crmv = $crmv;
        }
    
        public function getWage(){
            return $this->wage;
        }
    
        public function setWage($wage){
            $this->wage = $wage;
        }
    
        public function getWorkload(){
            return $this->workload;
        }
    
        public function setWorkload($workload){
            $this->workload = $workload;
        }
	}
?>