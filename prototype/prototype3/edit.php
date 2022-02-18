<?php
    include 'config.php';
    include 'person.php';
    include 'personManager.php';

    $personManager = new PersonManager();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $person = $personManager->getPerson($conn, $id);

    }

    if(isset($_POST['update'])){
        $person = new person();
        $person->setFirstName($_POST['fname']);
        $person->setLastName($_POST['lname']);
        $person->setAge($_POST['age']);

        $personManager->editperson($conn, $person, $id);

        header('Location: index.php');
        
    }
?>

<body>
<div>
        <div>
		<div><h3>Create a User</h3>
        <form method="POST" action="">
			<div>
				<label for="inputFName">First Name</label>
				<input type="text" required="required" id="inputFName" value=<?php echo $person['prenom']?> name="fname" placeholder="First Name">
				<span></span>
			</div>
			
			<div>
				<label for="inputLName">Last Name</label>
				<input type="text" required="required" id="inputLName" value=<?php echo $person['nom']?> name="lname" placeholder="Last Name">
        		<span></span>
			</div>
			
			<div>
				<label for="inputAge">Age</label>
				<input type="number" required="required" class="form-control" id="inputAge" value=<?php echo $person['age']?> name="age" placeholder="Age">
				<span></span>
			</div>
			<div class="form-actions">
					<input name="update" type="submit" value="Update">
					<a href="index.php">Back</a>
			</div>
		</form>
        </div></div>        
</div>
</body>
</html>