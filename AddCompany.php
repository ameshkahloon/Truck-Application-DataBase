<!DOCTYPE html>
<html>
<head>
	<title>Add Company</title>
	<link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="AddCompanyy.css">
</head>
<body>

<?php
	$direction = 'CompanyDataTable.php';
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="Index.php"><i class="fas fa-home"></i> Home</a>
	</div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav"> 
		<li><a href="CompanyDataTable.php">Companies Data Table</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a class='topButton' href="#"><i class="fas fa-table"></i> Log Table</a></li>
      </ul>
	</div>
  </div>
</nav>

<div class='container-fluid'>
<div class='jumbotron'>
	<h1 class="head">Add Truck Company</h1>
	<hr>
	<div class='container-fluid'>
		<form class='form-group' id='submission' action="AddCompanyConfirmation.php" method="post">
			<input class="textInput" type="text" name="companyName" placeholder="Enter Company Name"required><br>
		</form>
		<button class="btn btn-default btn-sm" id="myBtn">Go Back</button>
		<button class="btn btn-default btn-sm" type='submit' form='submission'>Add Company</button>
	</div>
</div>
</div>

<script type="text/javascript">
	var btn = document.getElementById('myBtn');
	btn.addEventListener('click', function(){
		document.location.href = '<?php echo $direction; ?>'; 
	});
</script>

</body>
</html>