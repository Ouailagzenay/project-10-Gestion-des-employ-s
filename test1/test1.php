<?php
if(!empty($_POST)){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];
    $person= array($firstName,$lastName,$age);
    
    $ficher = file_get_contents('test.json');
    $data = json_decode($ficher);

    array_push($data , $person);
    file_put_contents('test.json' , json_encode($data));
    header("Location: test.php");


}
?>
<html>
    <body>
        <form action="" method="POST">
        
        <div>
            <label for="inputFirstName">first name</label>
            <input type="text" required='required' name="firstName" id="inputFirstName">
        </div>
        <div>
            <label for="inputLastName">last Name</label>
            <input type="text" required='required' name="lastName" id="inputLastName">
        </div>
        <div>
            <label for="inputAge">age</label>
            <input type="number" required='required' name="age" id="inputAge">
        </div>
        <div>
            <button type="submit">craete</button>
            <a href="test.php">back</a>
        </div>
       </form>
    </body>
</html>
