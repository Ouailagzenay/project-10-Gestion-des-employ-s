<?php
    include 'employee.php';

    class EmployeeManager {

        private $Connection = null;

        private function getConnection(){
            if(is_null($this->Connection)){
                $this->Connection = mysqli_connect('localhost', 'test', 'test123', 'employees_db');

                if(!$this->Connection){
                    $message = 'Connection Error: ' .mysqli_connect_error();
                    throw new Exception($message);
                }
            }
            return $this->Connection;
        }

        public function getAllEmployees(){
            $sqlGetData = 'SELECT id,Nom, Prenom ,Age FROM employes1';
            $result = mysqli_query($this->getConnection() ,$sqlGetData);
            $employeesList = mysqli_fetch_all($result,MYSQLI_ASSOC);

            $employees = array();
            foreach($employeesList as $employee_list){
                $employee = new Employee();
                $employee->setId($employee_list['id']);
                $employee->setFirstName($employee_list['Nom']);
                $employee->setLastName($employee_list['Prenom']);
                $employee->setAge($employee_list['Age']);
                array_push($employees, $employee);
            }

            return $employees;
        }


        public function insertEmployee($employee){
            $firstName = $employee->getFirstName();
            $lastName = $employee->getLastName();
            $age = $employee->getAge();
            

                 // sql insert query
        $sqlInsertQuery = "INSERT INTO employes1(Nom, Prenom, Age) 
                            VALUES('$firstName', 
                                    '$lastName',
                                    '$age')";

        mysqli_query($this->getConnection(), $sqlInsertQuery);
        }


        public function deleteEmployee($id){
            $sqlDeleteQuery = "DELETE FROM employes1 WHERE id= '$id'";

            mysqli_query($this->getConnection(), $sqlDeleteQuery);
        }


        public function editEmployee($id, $first_name, $last_name,  $age){
     
            // Update query
            $sqlUpdateQuery = "UPDATE employes1 SET 
                         Nom='$first_name', 
                         Prenom='$last_name', 
                         Age='$age'
                         WHERE id=$id";
     
             // Make query 
             mysqli_query($this->getConnection(), $sqlUpdateQuery);

             if(mysqli_error($this->getConnection())){
                 $msg = 'Erreur' . mysqli_errno($this->getConnection());
                 throw new Exception($msg);
             }
       
        }

        public function getEmployee($id){
            $sqlGetQuery = "SELECT * FROM employes1 WHERE id= $id";
        
            // get result
            $result = mysqli_query($this->getConnection(), $sqlGetQuery);
        
            // fetch to array
            $employee_data = mysqli_fetch_assoc($result);

            $employee = new Employee();
            $employee->setId($employee_data['id']);
            $employee->setFirstName($employee_data['Nom']);
            $employee->setLastName($employee_data['Prenom']);
            $employee->setAge($employee_data['Age']);
           
            
            return $employee;
        }
    }


    
?>