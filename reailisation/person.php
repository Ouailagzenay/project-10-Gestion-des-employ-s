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

        public function getPrenom(){
            return $this->prenom;
        }

        public function setPrenom($value){
            $this->prenom = $value;
        }

        public function getNom(){
            return $this->nom;
        }

        public function setNom($value){
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