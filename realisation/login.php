<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php

if(isset($_POST['input'])){
	
	$password = $_POST['input'];
	if($password == "admin"){
		header("location: index.php");
	}
	else{
		$message ;
	}
}



?>
<div class="col-6 " style="margin-left:320px" >
		      <form action="#" method="POST"  class=""style="background-color:#05445E;border-radius: 16px; text-align: center;margin-top:50px; height: 450px;" >
			  <img src="images/stisla.png" alt="logo" width="70" class="shadow-light rounded-circle mb-5 mt-2">

			     <h2 style="padding-top:px; color:white">connexion</h2>
					
					
					<div class="">
						<input type="text" style="width:350px;margin-top:20px; height: 40px; border-radius: 10px;border:1px solid" class="col-6" name="input"  placeholder="Nom d'utilisateur" required>
					</div>
					<div>
						
					</div>
					<div class="">
						<input type="password"  style="width:350px;margin-top:20px; height: 40px; border-radius: 10px;border:1px solid ; margin-bottom:20px;" class="col-6"  placeholder="mot de pass" name="input"  required >
					</div>
					<p style="color: #189AB4; font-size:18px;"  ><?php if(isset($_POST['input'])){
                      echo $message = "Mauvais mot de passe, réessayez"; 
					} ?></p>
	            <div class="">
	            	<button type="submit" style="width:350px ;background-color: #189AB4 ;" class="  btn btn-primary submit px-3" >Se connecter</button>
	            </div>
				
	            
	          </form>
				
			
		</div>
	</section>