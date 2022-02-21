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
        $person->setprenom($_POST['Prenom']);
        $person->setnom($_POST['Nom']);
        $person->setAge($_POST['Age']);

        $personManager->modifferPerson($conn, $person, $id);

        header('Location: index.php');
        
    }
?>

<body>
<div>
        <div>
		<div><h3>Create a User</h3>
        <form method="POST" action="">
			<div>
				<label for="inputPrenom">First Name</label>
				<input type="text" required="required" id="inputPrenom" value=<?php echo $person['prenom']?> name="Prenom" placeholder="First Name">
				<span></span>
			</div>
			
			<div>
				<label for="inputNom">Last Name</label>
				<input type="text" required="required" id="inputNom" value=<?php echo $person['nom']?> name="Nom" placeholder="Last Name">
        		<span></span>
			</div>
			
			<div>
				<label for="inputAge">Age</label>
				<input type="number" required="required" class="form-control" id="inputAge" value=<?php echo $person['age']?> name="Age" placeholder="Age">
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