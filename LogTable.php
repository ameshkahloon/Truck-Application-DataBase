<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log Table</title>
	<link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="LogTable.css">
</head>
<body>

<?php
	include 'DataBaseConnection.php';
	session_start(); 
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
	<h1 class="head">Log Table</h1>
	<hr>
	<?php
		$sql = "SELECT log_id, log_entry FROM logtable";

		echo "<table id='logData'>
			<thead>
		  		<tr>
		  			<th width='30%'>Log ID</th>
		  			<th width='55%'>Log Entry</th>
		  			<th width='15%'>Delete</th>
		  		</tr>
			  </thead>
			  <tbody>";
		$result = $conn->query($sql);
		while ($row = mysqli_fetch_array($result)) {
			echo "<tr>";  
	  		echo "<td>" . $row['log_id'] . "</td>";  
			echo "<td>" . $row['log_entry'] . "</td>";
			echo "<td>
			<span class='delete'>
				<a href='LogTableDeletionConfirmation.php?log_id={$row['log_id']}'
					onclick='return deleteEntry()'
					<i class='far fa-trash-alt' type='submit'></i>
				</a>
			</span>
			</td>
		</tr>
		</tbody>";
	 	}// end while loop
		echo "</table>";
		$count=0;
		$result = $conn->query($sql);
		while ($row = mysqli_fetch_array($result)){
			$count++;
		}// end while loop
		echo '<span class="logNumber">
			 Number of Entries: '. + $count . '</span><br>';
	?>
		<?php
		if($_SESSION['logChecker'] == 1){
			$message = "Entry with Log ID: " . $_SESSION['deletedLogID'] . " has been deleted";
			echo "<script type='text/javascript'>
					alert('$message');
				  </script>";
		}// end if
		$_SESSION['logChecker'] = 0;
	?>	
</div>
</div>

<script type="text/javascript">
	function deleteEntry(){
		if(confirm('Are you sure you want to delete this entry?')){
		} 
		else{
			return false;
		}// end if-else
	}// end function

	$(document).ready(function(){
		$(".delete").hover(function(){
			$('.delete').attr("title", "Delete Entry");
		})// end .delete function
		$(".companyName").hover(function(){
			$('.companyName').attr("title", "Entry Data");
		})// end .companyName function
	})// end document jquery
</script>

</body>
</html>