<?php
	class Animal{
        private $name; //nome
		private $age; //idade
		private $hasDeficiency; //têm deficiência?
		private $deficiency; //deficiência
		private $type; //tipo
		private $breed; //raça
		private $gender; //gênero
		private $size; //porte
		private $fur; //pelagem
		private $furCollor; //cor da pelagem
		private $additionalFeatures; //características adicionais
		
		function __construct($name, $age, $hasDeficiency, $deficiency, $type, $breed, $gender, $size, $fur, $furCollor, $additionalFeatures)
        {
            $this->name = $name;
            $this->age = $age;
            $this->hasDeficiency = $hasDeficiency;
            $this->deficiency = $deficiency;
            $this->type = $type;
            $this->breed = $breed;
            $this->size = $size;
            $this->fur = $fur;
            $this->furCollor = $furCollor;
            $this->additionalFeatures = $additionalFeatures;
        }

        public function getName(){
            return $this->name;
        }
    
        public function setName($name){
            $this->name = $name;
        }
    
        public function getAge(){
            return $this->age;
        }
    
        public function setAge($age){
            $this->age = $age;
        }
    
        public function getHasDeficiency(){
            return $this->hasDeficiency;
        }
    
        public function setHasDeficiency($hasDeficiency){
            $this->hasDeficiency = $hasDeficiency;
        }
    
        public function getDeficiency(){
            return $this->deficiency;
        }
    
        public function setDeficiency($deficiency){
            $this->deficiency = $deficiency;
        }
    
        public function getType(){
            return $this->type;
        }
    
        public function setType($type){
            $this->type = $type;
        }
    
        public function getBreed(){
            return $this->breed;
        }
    
        public function setBreed($breed){
            $this->breed = $breed;
        }
    
        public function getGender(){
            return $this->gender;
        }
    
        public function setGender($gender){
            $this->gender = $gender;
        }
    
        public function getSize(){
            return $this->size;
        }
    
        public function setSize($size){
            $this->size = $size;
        }
    
        public function getFur(){
            return $this->fur;
        }
    
        public function setFur($fur){
            $this->fur = $fur;
        }
    
        public function getFurCollor(){
            return $this->furCollor;
        }
    
        public function setFurCollor($furCollor){
            $this->furCollor = $furCollor;
        }
    
        public function getAdditionalFeatures(){
            return $this->additionalFeatures;
        }
    
        public function setAdditionalFeatures($additionalFeatures){
            $this->additionalFeatures = $additionalFeatures;
        }
    }
?>
