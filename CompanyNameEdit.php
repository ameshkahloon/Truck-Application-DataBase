<!DOCTYPE html>
<html>
<head>
	<title>Company Edit</title>
	<link rel="stylesheet" type="text/css" href="CompanyNameEditCSS.css">
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
$direction = 'CompanyDataTable.php';
session_start();
$company_id = $_GET['company_id'];
$_SESSION['company_id'] = $company_id;

$sql = "SELECT company_ID, CompanyName FROM company WHERE company_ID LIKE '$company_id'";
$result = $conn->query($sql);
while ($row = mysqli_fetch_array($result)) {
	$prevCompanyName = $row['CompanyName'];
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
	<h1 class="head">Edit Company Name</h1>
	<hr>
	<div class='container-fluid'>
    <form id='submission' action="CompanyNameEditConfirmation.php" method="post">
      <label class="editName">Enter New Company Name:</label>
      <input class="textInput" type="text" name="newCompanyName" 
      value = "<?php echo $prevCompanyName; ?>" placeholder="New Company Name" required/><br>
    </form>

    <button class="btn btn-default" id="myBtn">Go Back</button>
    <button class="btn btn-default" type='submit' form='submission'>Save</button>
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