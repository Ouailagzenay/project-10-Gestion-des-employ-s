<?php

    include 'config.php';
	include 'person.php';
	include 'personManager.php';

    if(!empty($_POST)){
		$person = new Person();	
		$personManager = new PersonManager();

        $person->setprenom($_POST['fname']);
        $person->setnom($_POST['lname']);
        $person->setAge($_POST['age']);

		$personManager->insertEmployee($conn, $person);
     
        header("Location: index.php");

    }
?>

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