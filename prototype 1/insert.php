<?php
    if(!empty($_POST)){
		$id = uniqid(false);
        $firstName = $_POST['fname'];
        $lastName = $_POST['lname'];
        $age = $_POST['age'];
        $person = array($id, $firstName, $lastName, $age);
        $file = file_get_contents('people.json');
        $data = json_decode($file, true);
        array_push($data, $person);
        file_put_contents('people.json', json_encode($data));
        header("Location: index.php");

    }
?>


<html lang="en">
<body>
<div>
        <div>
		<div><h3>Create a User</h3>
        <form method="POST" action="">
			<div>
				<label for="inputFName">First Name</label>
				<input type="text" required="required" id="inputFName" name="fname" placeholder="First Name">
				<span></span>
			</div>
			
			<div>
				<label for="inputLName">Last Name</label>
				<input type="text" required="required" id="inputLName" name="lname" placeholder="Last Name">
        		<span></span>
			</div>
			
			<div>
				<label for="inputAge">Age</label>
				<input type="number" required="required" class="form-control" id="inputAge" name="age" placeholder="Age">
				<span></span>
			</div>
			<div class="form-actions">
					<button type="submit">Create</button>
					<a href="index.php">Back</a>
			</div>
		</form>
        </div></div>        
</div>
</body>
</html>