<?php

    
    if(isset($_GET['id'])){
        $data = json_decode(file_get_contents('people.json'));

        foreach($data as $value){
            if($value[0]== $_GET['id']){
                $editPerson = $value;
                break;
            }
        }
    }

    if(!empty($_POST)){
		$id = uniqid();
        $firstName = $_POST['fname'];
        $lastName = $_POST['lname'];
        $age = $_POST['age'];
        $editPerson = array($id, $firstName, $lastName, $age);
        $file = file_get_contents('people.json');
        $data = json_decode($file);

       for($i = 0; $i < count($data); $i++){
        if($data[$i][0]== $_GET['id']){
            $data[$i] = $editPerson;
            break;
        }
       }
        file_put_contents('people.json', json_encode($data));
        header("Location: index.php");

    }
?>


<html lang="en">
<body>
<div>
        <div>
		<div><h3>Edit a User</h3>
        <form method="POST" action="">
			<div>
				<label for="inputFName">First Name</label>
				<input type="text" required id="inputFName" value=<?= $editPerson[1]?> name="fname" placeholder="First Name">
				<span></span>
			</div   >
			
			<div>
				<label for="inputLName">Last Name</label>
				<input type="text" required id="inputLName" value=<?= $editPerson[2] ?> name="lname" placeholder="Last Name">
        		<span></span>
			</div>
			
			<div>
				<label for="inputAge">Age</label>
				<input type="number" required class="form-control" value=<?= $editPerson[3] ?> id="inputAge" name="age" placeholder="Age">
				<span></span>
			</div>
    
			<div class="form-actions">
					<button type="submit">Edit</button>
					<a href="index.php">Back</a>
			</div>
		</form>
        </div></div>        
</div>
</body>
</html>