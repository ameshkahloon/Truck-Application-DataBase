<!DOCTYPE html>
<html>
<head>
   	<title>Page Title</title>
   	<link rel="stylesheet" href="TruckNameEDIT.css">
   	<link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<?php
include 'DataBaseConnection.php';
session_start();
$truck_id = $_GET['truck_id'];
$_SESSION['truck_id'] = $truck_id;
$sql = "SELECT truck_ID, company_ID, truckName FROM truck WHERE truck_ID LIKE '$truck_id'";
$result = $conn->query($sql);
while ($row = mysqli_fetch_array($result)) {
	$prevTruckName = $row['truckName'];
}// end while loop
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
        <li><a href="#"><i class="fas fa-table"></i> Log Table</a></li>
      </ul>
	</div>
  </div>
</nav>

<div class='container-fluid'>
<div class='jumbotron'>
	<h1 class="head">Edit Truck Name</h1>
	<hr>
	<div class='container-fluid'>
		<form id='submission' action="TruckNameEditConfirmation.php" method="post">
			<label>Enter New Truck Name: </label>
			<input class="textInput" type="text" name="newTruckName" 
			value = "<?php echo $prevTruckName; ?>" placeholder="New Truck Name" required/><br>
		</form>

	<button id="myBtn">Go Back</button>
	<button type='submit' form='submission'>Save</button>
	</div>
</div>
</div>

<script type="text/javascript">
	var btn = document.getElementById('myBtn');
	btn.addEventListener('click', function(){
		document.location.href = 'TruckDataTable.php?company_id=<?php echo $_SESSION['company_id'] ?>'; 
	});
</script>


</body>
</html>