<!DOCTYPE html>
<html>
<head>
	<title>Company DataTable</title>
	<link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="CompanyDataTable.css">
</head>
<body>

<?php
	include 'DataBaseConnection.php';
	session_start(); 
	$direction = 'AddCompany.php';
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
        <li><a class='topButton' href="LogTable.php"><i class="fas fa-table"></i> Log Table</a></li>
      </ul>
	</div>
  </div>
</nav>

<div class='container-fluid'>
<div class='jumbotron'>
	<h1 class="head">Truck Companies Data Table</h1>
	<hr>
	<?php
		$sql = "SELECT company_ID, companyName FROM company";

		echo "<table id='companyData'>
			<thead>
		  		<tr>
		  			<th width='30%'>Company ID</th>
		  			<th width='55%'>Company Name</th>
		  			<th width='15%'>Modify</th>
		  		</tr>
			  </thead>
			  <tbody>";
		$result = $conn->query($sql);
		while ($row = mysqli_fetch_array($result)) {
			echo "<tr>";  
	  		echo "<td>" . $row['company_ID'] . "</td>";  
			echo "<td> 	<a class='companyName' href='TruckDataTable.php?company_id={$row['company_ID']}'>
						{$row['companyName']}</a> </td>";
			echo "<td>
	  		<span class='edit'>
	  			<a href='CompanyNameEdit.php?company_id={$row['company_ID']}' 
					<i class='fas fa-edit' type='submit'></i>
				</a>
			</span>
			<span class='delete'>
				<a href='CompanyDeletionConfirmation.php?company_id={$row['company_ID']}'
					onclick='return deleteCompany()'
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
		echo '<span class="companyNumber">
			 Number of Companies: '. + $count . '</span><br>';
	?>
		<button class="btn btn-default btn-sm" id="myBtn">Add New Company</button>
	<?php
		if($_SESSION['checker'] == 1){
			$message = "Truck company: " . $_SESSION['deletedName'] . " has been deleted";
			echo "<script type='text/javascript'>
					alert('$message');
				</script>";
		}// end if
		$_SESSION['checker'] = 0;
	?>	
</div>
</div>

<script type="text/javascript">
	function deleteCompany(){
		if(confirm('Are you sure you want to delete this company?')){
		} 
		else{
			return false;
		}// end if-else
	}// end function
	
	var btn = document.getElementById('myBtn');
	btn.addEventListener('click', function(){
		document.location.href = '<?php echo $direction; ?>'; 
	});

	$(document).ready(function(){
		$(".edit").hover(function(){
			$('.edit').attr("title", "Edit Company");
		})// end .edit function
		$(".delete").hover(function(){
			$('.delete').attr("title", "Delete Company");
		})// end .delete function
		$(".companyName").hover(function(){
			$('.companyName').attr("title", "Company Data");
		})// end .companyName function
	})// end document jquery
</script>

</body>
</html>