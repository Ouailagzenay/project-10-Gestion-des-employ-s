<?php
    class Person {
        private $id;
        private $prenom;
        private $nom;
        private $age;

        public function getId(){
            return $this->id;
        }
        public function setId($value){
            $this->id = $value;
        }

        public function getprenom(){
            return $this->prenom;
        }

        public function setprenom($value){
            $this->prenom = $value;
        }

        public function getnom(){
            return $this->nom;
        }

        public function setnom($value){
            $this->nom= $value;
        }
        public function getAge(){
            return $this->age;
        }

        public function setAge($value){
            $this->age = $value;
        }
    }
?>