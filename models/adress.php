<?php
    require_once "models/animal.php";

	class Adress{
		private $street;
		private $neighborhood;
		private $city;
        private $state;

		function __construct($street, $neighborhood, $city, $state){
			$this->street = $street;
			$this->neighborhood = $neighborhood;
			$this->city = $city;
			$this->state = $state;
		}

        public function getStreet(){
            return $this->street;
        }
    
        public function setStreet($street){
            $this->street = $street;
        }
    
        public function getNeighborhood(){
            return $this->neighborhood;
        }
    
        public function setNeighborhood($neighborhood){
            $this->neighborhood = $neighborhood;
        }
    
        public function getCity(){
            return $this->city;
        }
    
        public function setCity($city){
            $this->city = $city;
        }
    
        public function getState(){
            return $this->state;
        }
    
        public function setState($state){
            $this->state = $state;
        }
	}
?>