<?php
    class Employee {
        private $id;
        private $Nom;
        private $Prenom;
        private $DateNaissance;
        private $Déoartement;
        private $Salaire;
        private $Photo;
        private $Fonction;
        
        public function getId(){
            return $this->id;
        }
        public function setId($value){
            $this->id = $value;
        }

        public function getNom(){
            return $this->Nom;
        }

        public function setNom($value){
            $this->Nom = $value;
        }

        public function getPrenom(){
            return $this->Prenom;
        }

        public function setPrenom($value){
            $this->Prenom= $value;
        }

        public function getDateNaissance(){
            return $this->DateNaissance;
        }

        public function setDateNaissance($value){
            $this->DateNaissance= $value;
        }

        public function getDéoartement(){
            return $this->Déoartement;
        }

        public function setDéoartement($value){
            $this->Déoartement = $value;
        }
        public function getFonction(){
            return $this->Fonction;
        }
        public function setFonction($value){
            $this->Fonction = $value;
        }
        public function getSalaire(){
            return $this->Salaire;
        }

        public function setSalaire($value){
            $this->Salaire = $value;
        }
    
         public function getPhoto(){
        return $this->Photo;
        }

    public function setPhoto($value){
        $this->Photo = $value;
        }
}
    
?>