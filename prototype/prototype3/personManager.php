<?php

    class PersonManager {

        public function getToutPerson($conn){
            $sqlGetData = 'SELECT id, prenom, nom, age FROM person';
            $result = mysqli_query($conn ,$sqlGetData);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $data;
        }


        public function insertPerson($conn, $person){
            $prenom = $person->getprenom();
            $nom = $person->getnom();
            $age = $person->getAge();

                 // sql insert query
        $sqlInsertQuery = "INSERT INTO person(prenom, nom, age) 
                            VALUES('$prenom', 
                                    '$nom',
                                    '$age')";

        mysqli_query($conn, $sqlInsertQuery);
        }


        public function suprimerPerson($conn, $id){
            $sqlDeleteQuery = "DELETE FROM person WHERE id= '$id'";

            mysqli_query($conn, $sqlDeleteQuery);
        }


        public function modifferPerson($conn, $person, $id){
            $prenom = $person->getprenom();
            $nom = $person->getnom();
            $age = $person->getAge();
     
            // Update query
            $sqlUpdateQuery = "UPDATE person SET 
                         prenom='$prenom', nom='$nom', age='$age'
                         WHERE id=$id";
     
             // Make query 
             mysqli_query($conn, $sqlUpdateQuery);
       
        }

        public function getPerson($conn, $id){
            $sqlGetQuery = "SELECT * FROM person WHERE id= $id";
    
        // get result
        $result = mysqli_query($conn, $sqlGetQuery);
    
        // fetch to array
        $person = mysqli_fetch_assoc($result);
        return $person;
        }
    }


    
?>