<!DOCTYPE html>
<html>
<head>
	<title>Truck Data</title>  
	<link rel="stylesheet" type="text/css" href="TruckDataTable.css">
	<link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php 
	include 'DataBaseConnection.php';
	session_start();
	$add = 'AddTruck.php';
	$back = 'CompanyDataTable.php';
	$_SESSION['company_id'] = $_GET['company_id'];
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
        <li><a href="LogTable.php"><i class="fas fa-table"></i> Log Table</a></li>
      </ul>
	</div>
  </div>
</nav>

<div class='container-fluid'>
<div class='jumbotron'>
	<h1 class="head">Trucking Data Table</h1>
	<hr>
	<?php
		$sql = "SELECT truck_ID, company_ID, truckName FROM truck
				WHERE '{$_SESSION['company_id']}' LIKE company_ID";

		echo "<table id='truckData' border='1'>
			<thead>
		  		<tr>
		  			<th width='30%'>Truck ID</th>
		  			<th width='55%'>Truck Name</th>
		  			<th width='15%'>Modify</th>
		  		</tr>
			</thead>
			<tbody>" ;
		$result = $conn->query($sql);
		while ($row = mysqli_fetch_array($result)) {
			echo "<tr>";  
	  		echo "<td>" . $row['truck_ID'] . "</td>";  
			echo "<td> 	<a class='truckName' href='TripDataTable.php?truck_id={$row['truck_ID']}'>
						{$row['truckName']}</a> </td>";
			echo "<td>
	  		<span class='edit'>
				<a 	href='TruckNameEdit.php?truck_id={$row['truck_ID']}' 
					<i class='fas fa-edit' type='submit'></i>
				</a>
			</span>
			<span class='delete'>
				<a 	onclick='return deleteCompany()' 
					href='TruckDeletionConfirmation.php?truck_id={$row['truck_ID']}'
					<i class='far fa-trash-alt' type='submit'></i>
				</a>
			</span>
			</td>
		</tr>
		</tbody>";
	 	}// end while loop
		echo "</table>";
		 
		$result = $conn->query($sql);
		$count = 0;
		while ($row = mysqli_fetch_array($result)){
			$count++;
		}// end while loop

		echo '<span class="truckNumber">
		 	Number of Trucks: '. + $count . '</span><br>';
	?>
		<button class="btn btn-default btn-sm" id="back"> Go Back </button>
		<button class="btn btn-default btn-sm" id="add">Add New Truck</button>
	<?php
		if($_SESSION['truckChecker'] == 1){
			$message = "Truck: " . $_SESSION['deletedTruckName'] . " has been deleted";
			echo "<script type='text/javascript'>
					alert('$message');
				  </script>";
		}// end if
		$_SESSION['truckChecker'] = 0;
	?>	
</div>
</div>

<script type="text/javascript">
	function deleteCompany(){
		if(confirm('Are you sure you want to delete this truck?')){
		} else{
			return false;
		}// end if-else
	}// end function

	var insertBtn = document.getElementById('add');
	insertBtn.addEventListener('click', function(){
		document.location.href = '<?php echo $add; ?>'; 
	});
	var backBtn = document.getElementById('back');
	backBtn.addEventListener('click', function(){
		document.location.href = '<?php echo $back; ?>'; 
	});

	$(document).ready(function(){
		$(".edit").hover(function(){
			$('.edit').attr("title", "Edit Truck");
		})// end .edit function
		$(".delete").hover(function(){
			$('.delete').attr("title", "Delete Truck");
		})// end .delete funciton
		$(".truckName").hover(function(){
			$('.truckName').attr("title", "Truck Trip Data");
		})// end .delete funciton
	})// end document jquery
</script>

</body>
</html>