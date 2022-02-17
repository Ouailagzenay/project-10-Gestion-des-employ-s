<?php 
if (isset($_GET['id'])){
    $data = json_decode(file_get_contents('test.json'));

    foreach($data as $value){
        if($value[0]== $_GET['id']){
            $editValue = $value;
        break;
        }
    }
 
    
}
if (!empty($_POST)){
    $id = uniqid();
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];
    $editValue = array($id,$firstName,$lastName,$age);
    $files = file_get_contents('test.json');
    $data = json_decode($files);

    for($i= 0 ; count($data) ; $i++){
        if($data[$i][0]== $_GET['id']){
            $data[$i] == $editValue;
            break;
        }
    }
    for($i =0 ;count($data);$i++){
        
    }



}
?>