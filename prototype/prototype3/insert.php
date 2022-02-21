<?php

    include 'config.php';
	include 'person.php';
	include 'personManager.php';

    if(!empty($_POST)){
		$person = new Person();	
		$personManager = new PersonManager();

        $person->setprenom($_POST['Prenom']);
        $person->setnom($_POST['Nom']);
        $person->setAge($_POST['Age']);

		$personManager->insertPerson($conn, $person);
     
        header("Location: index.php");

    }
?>

<body>
<div>
        <div>
		<div><h3>Create a User</h3>
        <form method="POST" action="">
			<div>
				<label for="inputPrenom">First Name</label>
				<input type="text" required="required" id="inputPrenom" name="Prenom" placeholder="First Name">
				<span></span>
			</div>
			
			<div>
				<label for="inputNom">Last Name</label>
				<input type="text" required="required" id="inputNom" name="Nom" placeholder="Last Name">
        		<span></span>
			</div>
			
			<div>
				<label for="inputAge">Age</label>
				<input type="number" required="required" class="form-control" id="inputAge" name="Age" placeholder="Age">
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