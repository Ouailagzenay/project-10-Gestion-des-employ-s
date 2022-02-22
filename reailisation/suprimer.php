<?php
    include "config.php";
    include "personManager.php";
    
        if(isset($_GET['id'])){
            $id = $_GET['id'];
           
            $personManager = new PersonManager();
            $personManager->suprimerPerson($conn, $id);
            header('Location: index.php');   
    }
?>