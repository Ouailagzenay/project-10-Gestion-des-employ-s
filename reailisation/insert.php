<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/style.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php


    include 'config.php';
	include 'person.php';
	include 'personManager.php';

    if(!empty($_POST)){
		$person = new Person();	
		$personManager = new PersonManager();

        $person->setPrenom($_POST['Prenom']);
        $person->setNom($_POST['Nom']);
        $person->setAge($_POST['Age']);

		$personManager->insertPerson($conn, $person);
     
        header("Location: index.php");

    }
?>

<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      
		      	<form action="#" method="POST" class="signin-form">
					<div class="form-group">
						<input type="text" class="form-control" name="Prenom" placeholder="prenom" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="Nom" placeholder="nom" required>
					</div>
					
					<div class="form-group">
						<input type="number" class="form-control" name="Age" placeholder="age" required >
					</div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
				<a href="index.php">Back</a>
	            
	          </form>
	         
	          
		      </div>
				</div>
			</div>
		</div>
	</section>