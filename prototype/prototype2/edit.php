<?php
    include 'config.php';

    if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $sqlGetQuery = "SELECT * FROM person WHERE id= $id";

    // get result
    $result = mysqli_query($conn, $sqlGetQuery);

    // fetch to array
    $person = mysqli_fetch_assoc($result);

    }

    if(isset($_POST['update'])){

       $prenom = $_POST['prenom'];
       $nom = $_POST['nom'];
       $age = $_POST['age'];

       // Update query
       $sqlUpdateQuery = "UPDATE person SET 
                    prenom='$prenom', nom='$nom', age='$age'
                    WHERE id=$id";

        // Make query 
        mysqli_query($conn, $sqlUpdateQuery);

        //Check if no errors
        if(mysqli_error($conn)){
            echo 'query error' . mysqli_errno($conn);
        } else {
            header('Location: index.php');
        }
    }
?>

<body>
<div>
        <div>
		<div><h3>Create a User</h3>
        <form method="POST" action="">
			<div>
				<label for="inputFName">First Name</label>
				<input type="text" required="required" id="inputFName" value=<?php echo $person['prenom']?> name="prenom" placeholder="First Name">
				<span></span>
			</div>
			
			<div>
				<label for="inputLName">Last Name</label>
				<input type="text" required="required" id="inputLName" value=<?php echo $person['nom']?> name="nom" placeholder="Last Name">
        		<span></span>
			</div>
			
			<div>
				<label for="inputAge">Age</label>
				<input type="number" required="required" class="form-connrol" id="inputAge" value=<?php echo $person['age']?> name="age" placeholder="Age">
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