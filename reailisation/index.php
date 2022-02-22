<?php
    include 'config.php';
    include 'personManager.php';

    $personManager = new PersonManager();
    $data = $personManager->getToutPerson($conn);

?>




       
 
<!doctype html>
<html lang="en">
  <head>
  	<title>Table 03</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="style.css">

	</head>
	<body>
    <a href="insert.php">Insert Data</a>
		
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			<div class="form-group pull-right">
			<input type="text" class="search form-control" placeholder="What you looking for?">
		</div>
		<span class="counter pull-right">kkk</span>
			</div>
			<div class="row">
				<div class="col-md-12">
					

						<table class="table  table-hover table-bordered results">
					    <thead class="thead-primary">
					      <tr>
					        <th>TLD</th>
					        <th>Duration</th>
					        <th>Registration</th>
					        <th>Renewal</th>
					        <th>Transfer</th>
					        <th>Register</th>
					      </tr>
					    </thead>
						
						<tr class="warning no-result">
							<td colspan="4"><i class="fa fa-warning"></i> No result</td>
						  </tr>
						  <?php
                          foreach($data as $value){
                        ?>
					    <tbody>
					      
						  <tr>
							
							<td><?= $value['prenom']?></td>
							<td><?= $value['nom']?></td>
							<td><?= $value['age']?></td>
                            <td><button><a href="modiffer.php?id=<?php echo $value['id'] ?>">Modiffer</a></button></td>
						<td><button><a href="suprimer.php?id=<?php echo $value['id'] ?>">suprimer</a></button></td>
						</tr>
					     
					    </tbody>
                        <?php }?>
					  </table>
				</div>
			</div>
		</div>
	</section>

  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script >
	  $(document).ready(function() {
    $(".search").keyup(function () {
      var searchTerm = $(".search").val();
      var listItem = $('.results tbody').children('tr');
      var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
      
    $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
          return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
      }
    });
      
    $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
      $(this).attr('visible','false');
    });
  
    $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
      $(this).attr('visible','true');
    });
  
    var jobCount = $('.results tbody tr[visible="true"]').length;
      $('.counter').text(jobCount + ' item');
  
    if(jobCount == '0') {$('.no-result').show();}
      else {$('.no-result').hide();}
            });
  });
  </script>

	</body>
</html>



