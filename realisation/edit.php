<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php
    include 'employeeManager.php';

    $employeeManager = new EmployeeManager();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $employee = $employeeManager->getEmployee($id);

    }

    if(isset($_POST['update'])){

		$ficher = $_FILES["uploadfile"]["name"];
		$employeeToEdit = new Employee();
	
		$employeeToEdit->setNom($_POST['Nom']);
		$employeeToEdit->setPrenom($_POST['Prenom']);
		$employeeToEdit->setDateNaissance( $_POST['dateNaissance']);
		$employeeToEdit->setDéoartement($_POST['Déoartement']);
		$employeeToEdit->setFonction($_POST['Fonction']);
		$employeeToEdit->setSalaire( $_POST['Salaire']) ;
		$tempname = $_FILES["uploadfile"]["tmp_name"];    

        if(!empty($ficher)){
            $employeeToEdit->setPhoto($ficher);
            $employeeManager->upload_photo($ficher, $tempname);
        } else {
            $employeeToEdit->setPhoto($employee->getPhoto());
        }


        $employeeManager->editEmployee($employeeToEdit, $id);

        header('Location: index.php');
        
    }
	
    
?>





	

			<div class="col-6 " style="margin-left:320px" >
		      	<form action="#" method="POST" class=""style="background-color: #05445E;border-radius: 16px; text-align: center;margin-top:50px; height: 670px;" enctype='multipart/form-data'>
				  <h2 style="padding-top:30px; color:white">Ajoute les informations</h2>
					<div class="">
						<input style="width:350px ;margin-top:40px; height: 40px; border-radius: 10px;  border:1px solid" type="text" value=<?php echo $employee->getNom() ?> class=" col-6" name="Nom" placeholder="Nom" required>
					</div>
					<div class="">
						<input type="text" style="width:350px ;margin-top:20px; height: 40px; border-radius: 10px;border:1px solid" class=" col-6" value=<?php echo $employee->getPrenom()?> name="Prenom" placeholder="Prenom" required>
					</div>
					<div class="">
						<input type="Date" style="width:350px ;margin-top:20px; height: 40px; border-radius: 10px;border:1px solid" class="col-6 " value=<?php echo $employee->getDateNaissance()?> name="dateNaissance"  required>
					</div>
					<div class="" >
					<select class="form-select "required style="width:350px ;margin-top:20px;margin-left:250px; height: 40px; border-radius: 10px;border:1px solid ;" class="col-6"  name="Déoartement"  aria-label="Default select example">
										<option selected>Département...</option>
										<option value="Accounting" <?= $employee->getDéoartement()== 'Accounting' ? 'selected' : '' ?>>Accounting</option>
										<option value="Marketing" <?= $employee->getDéoartement()== 'Marketing' ? 'selected' : '' ?>>Marketing</option>
										<option value="Production" <?= $employee->getDéoartement()== 'Production' ? 'selected' : '' ?>>Production</option>
										<option value="I.T" <?= $employee->getDéoartement()== 'I.T' ? 'selected' : '' ?>>I.T</option>
									</select>
					</div>
					<div class="">
                               
									<select class="form-select" class="" required name="Fonction" class="col-6" style="margin-left:250px;width:350px;margin-top:20px; height: 40px; border-radius: 10px;border:1px solid" placeholder="Function"  	aria-label="Default select example">
										<option selected>Function...</option>
										<option value="auditor" <?= $employee->getFonction()== 'auditor' ? 'selected' : '' ?>>auditor</option>
										<option value="CFO" <?= $employee->getFonction()== 'CFO' ? 'selected' : '' ?>>CFO</option>
										<option value="payroll specialist" <?= $employee->getFonction()== 'payroll specialist' ? 'selected' : '' ?>>payroll specialist</option>
										<option value="tax specialist" <?= $employee->getFonction()== 'tax specialist' ? 'selected' : '' ?>>tax specialist</option>
										<option value="advertising manager" <?= $employee->getFonction()== 'advertising manager' ? 'selected' : '' ?>>advertising manager</option>
										<option value="brand manager"  <?= $employee->getFonction()== 'brand manager' ? 'selected' : '' ?>>brand manager</option>
                                    </select >
					</div>
					
					<div class="">
						<input type="number" style="width:350px;margin-top:20px; height: 40px; border-radius: 10px;border:1px solid" class="col-6" name="Salaire" value=<?php echo $employee->getSalaire()?> placeholder="Salaire" required>
					</div>
					<div class="">

						<input type="file" style="width:350px;margin-top:20px;margin-bottom:20px; height: 40px; margin-left:40px;" class="col-6" value=<?php echo './images/'.$employee->getPhoto(); ?> name="uploadfile"  required >
					</div>
	            <div class="">
	            	<button type="submit" name="update" style="width:350px; background-color:#189AB4;" class="  btn btn-primary submit px-3" >Modiffer</button>
	            </div>
				<a href="index.php" style="margin-right:300px ;color: #189AB4 ;">Retourner</a>
	            
	          </form>
				
			
		</div>
	</section>
