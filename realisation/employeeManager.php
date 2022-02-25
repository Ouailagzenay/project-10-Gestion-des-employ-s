<?php
    include 'employee.php';

    class EmployeeManager {

        private $Connection = null;

        private function getConnection(){
            if(is_null($this->Connection)){
                $this->Connection = mysqli_connect('localhost', 'test', 'test123', 'employes_db');

                if(!$this->Connection){
                    $message = 'Connection Error: ' .mysqli_connect_error();
                    throw new Exception($message);
                }
            }
            return $this->Connection;
        }

        
        public function getAllEmployees(){
            $sqlGetData = 'SELECT * FROM employes';
            $result = mysqli_query($this->getConnection() ,$sqlGetData);
            $employeesList = mysqli_fetch_all($result, MYSQLI_ASSOC);

            $employees = array();
            foreach($employeesList as $employee_list){
                $employee = new Employee();
                $employee->setId($employee_list['id']);
                $employee->setNom($employee_list['Nom']);
                $employee->setPrenom($employee_list['Prenom']);
                $employee->setDateNaissance($employee_list['DateNaissance']);
                $employee->setDéoartement($employee_list['Déoartement']);
                $employee->setFonction($employee_list['Fonction']);
                $employee->setSalaire($employee_list['Salaire']);
                $employee->setPhoto($employee_list['Photo']);
                

                array_push($employees, $employee);
            }

            return $employees;
        }


        public function insertEmployee($employee){
            $Nom = $employee->getNom ();
            $Prenom = $employee->getPrenom();
            $DateNaissance  = $employee->getDateNaissance();
            $Déoartement  = $employee->getDéoartement();
            $Fonction = $employee->getFonction();
            $Salaire = $employee->getSalaire();
            $Photo = $employee->getPhoto();
                 // sql insert query
        $sqlInsertQuery = "INSERT INTO employes(Nom, Prenom,  DateNaissance ,  Déoartement , Fonction , Salaire ,Photo) 
                            VALUES('$Nom', 
                                    '$Prenom',
                                    '$DateNaissance',
                                    '$Déoartement',
                                    '$Fonction',
                                    '$Salaire',
                                    '$Photo'
                                    )";

        mysqli_query($this->getConnection(), $sqlInsertQuery);
        }

    

        public function upload_photo($ficher, $tempname){

            $folder = './images/'.$ficher;
            // Now let's move the uploaded image into the folder: image
            move_uploaded_file($tempname, $folder);
        }

        public function deleteEmployee($id){
            $sqlDeleteQuery = "DELETE FROM employes WHERE id= '$id'";

            mysqli_query($this->getConnection(), $sqlDeleteQuery);
        }


        public function editEmployee($employee,$id){
            $Nom = $employee->getNom();
            $Prenom = $employee->getPrenom();
            $DateNaissance = $employee->getDateNaissance();
            $Déoartement = $employee->getDéoartement ();
            $Fonction = $employee->getFonction();
            $Salaire = $employee->getSalaire();
            $Photo = $employee->getPhoto();
     
            // Update query
            $sqlUpdateQuery = "UPDATE employes SET 
                         Nom='$Nom', 
                         Prenom='$Prenom', 
                         DateNaissance='$DateNaissance',
                         Déoartement = '$Déoartement',
                         Fonction = '$Fonction',
                         Salaire = '$Salaire',
                         Photo = '$Photo'
                         WHERE id=$id";
     
             // Make query 
             mysqli_query($this->getConnection(), $sqlUpdateQuery);

             
       
        }
       

       
      public function getEmployee($id){
        $sqlGetQuery = "SELECT * FROM employes WHERE id= $id";
    
        // get result
        $result = mysqli_query($this->getConnection(), $sqlGetQuery);
    
        // fetch to array
        $employee_data = mysqli_fetch_assoc($result);

        $employee = new Employee();

        $employee->setId($employee_data['id']);
        $employee->setNom($employee_data['Nom']);
        $employee->setPrenom($employee_data['Prenom']);
        $employee->setDateNaissance($employee_data['DateNaissance']);
        $employee->setDéoartement($employee_data['Déoartement']);
        $employee->setFonction($employee_data['Fonction']);
        $employee->setSalaire($employee_data['Salaire']);
        $employee->setPhoto($employee_data['Photo']);
        return $employee;
    }  
    


    
    }
    ?>