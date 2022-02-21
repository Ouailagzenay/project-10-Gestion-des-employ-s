<?php

    class PersonManager {

        public function getAllpersons($conn){
            $sqlGetData = 'SELECT id, prenom, nom, age FROM person';
            $result = mysqli_query($conn ,$sqlGetData);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $data;
        }


        public function insertperson($conn, $person){
            $firstName = $person->getFirstName();
            $lastName = $person->getLastName();
            $age = $person->getAge();

                 // sql insert query
        $sqlInsertQuery = "INSERT INTO person(prenom, nom, age) 
                            VALUES('$firstName', 
                                    '$lastName',
                                    '$age')";

        mysqli_query($conn, $sqlInsertQuery);
        }


        public function deletePerson($conn, $id){
            $sqlDeleteQuery = "DELETE FROM person WHERE id= '$id'";

            mysqli_query($conn, $sqlDeleteQuery);
        }


        public function editPerson($conn, $person, $id){
            $first_name = $person->getFirstName();
            $last_name = $person->getLastName();
            $age = $person->getAge();
     
            // Update query
            $sqlUpdateQuery = "UPDATE person SET 
                         prenom='$first_name', nom='$last_name', age='$age'
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