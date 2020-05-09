<!DOCTYPE html>
<html>
<head>
	<title>Truck Data</title>  
	<link rel="stylesheet" type="text/css" href="TripDataTable.css">
	<link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
</head>
<body>

<?php 
	include 'DataBaseConnection.php';
	session_start();
    $_SESSION['truck_id'] = $_GET['truck_id'];
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
	<h1 class="head">Trip Data Table</h1>
	<hr>

	<?php
		$sql = "SELECT trip_id, truck_number, departure_date, arrival_date, start_location, end_location, freight_charges, expenses, driver_pay, repair, profit FROM trips
				WHERE '{$_SESSION['truck_id']}' LIKE truck_number";

		echo "<table id='truckData' border='1'>
			<thead>
		  		<tr>
		  			<th>Trip ID</th>
		  			<th>Departure Date</th>
                    <th>Arrival Date</th>
                    <th>Start Location</th>
		  			<th>End Location</th>
                    <th>Freight Charges</th>
                    <th>Expenses</th>
                    <th>Driver Pay</th>
                    <th>Repair</th>
                    <th>Profit</th>
                    <th>Modify</th>
		  		</tr>
			</thead>
			<tbody>" ;
		$result = $conn->query($sql);
		while ($row = mysqli_fetch_array($result)) {
			echo "<tr>";  
	  		echo "<td>" . $row['trip_id'] . "</td>";  
            echo "<td>" . $row['departure_date'] . "</td>";
            echo "<td>" . $row['arrival_date'] . "</td>";
            echo "<td>" . $row['start_location'] . "</td>";
            echo "<td>" . $row['end_location'] . "</td>";
            echo "<td>" . $row['freight_charges'] . "</td>";
            echo "<td>" . $row['expenses'] . "</td>";
            echo "<td>" . $row['driver_pay'] . "</td>";
            echo "<td>" . $row['repair'] . "</td>";
            echo "<td>" . $row['profit'] . "</td>";
			echo "<td>
	  		<span class='edit'>
				<a 	href='TripEdit.php?trip_id={$row['trip_id']}' 
					<i class='fas fa-edit' type='submit'></i>
				</a>
			</span>
			<span class='delete'>
				<a 	onclick='return deleteCompany()' 
					href='TripDeletionConfirmation.php?trip_id={$row['trip_id']}'
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
		 	Number of trips: '. + $count . '</span><br>';
	?>
	<button class="btn btn-default btn-sm" id="myBtn">Go Back</button>
	<button class="btn btn-default btn-sm" onclick='myFunction()'>Add new trip</button>
	<?php
		if($_SESSION['tripChecker'] == 1){
			$message = "Trip ID: " . $_SESSION['deletedTripID'] . " has been deleted";
			echo "<script type='text/javascript'>
					alert('$message');
				  </script>";
		}// end if
		$_SESSION['tripChecker'] = 0;
	?>
</div>
</div>	

<script type="text/javascript">
	function deleteCompany(){
		if(confirm('Are you sure you want to delete this trip?')){
		} else {
			return false;
		}// end if-else
	}// end function

	var btn = document.getElementById('myBtn');
	btn.addEventListener('click', function(){
		document.location.href = 'TruckDataTable.php?company_id=<?php echo $_SESSION['company_id'] ?>'; 
	});
	function myFunction(){
		document.location.href = 'AddTrip.php?truck_id=<?php echo $_SESSION['truck_id'] ?>';
	}// end function
	
	$(document).ready(function(){
		$(".edit").hover(function(){
			$('.edit').attr("title", "Edit Trip");
		})// end .edit function
		$(".delete").hover(function(){
			$('.delete').attr("title", "Delete Trip");
		})// end .delete funciton
	})// end document jquery
</script>

</body>
</html>