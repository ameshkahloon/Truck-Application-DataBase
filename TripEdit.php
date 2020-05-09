<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trip Edit</title>
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="TripEditCSS.css">
</head>
<body>

<?php
    session_start();
    include 'DataBaseConnection.php';
    $trip_id = $_GET['trip_id'];
    $sql = "SELECT departure_date, arrival_date, start_location, end_location, freight_charges, expenses, driver_pay, repair, profit FROM trips WHERE trip_id LIKE '$trip_id'";
    $result = $conn->query($sql);
    while ($row = mysqli_fetch_array($result)) {
        $departure_date = $row['departure_date'];
        $arrival_date = $row['arrival_date'];
        $start_location = $row['start_location'];
        $end_location = $row['end_location'];
        $freight_charges = $row['freight_charges'];
        $expenses = $row['expenses'];
        $driver_pay = $row['driver_pay'];
        $repair = $row['repair'];
        $profit = $row['profit'];
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
        <li><a class='topButton' href="#"><i class="fas fa-table"></i> Log Table</a></li>
      </ul>
	</div>
  </div>
</nav>

<div class='container-fluid'>
<div class='jumbotron'>
	<h1 class="head">Edit Trip</h1>
	<hr>
	<div class='container-fluid'>
        <form class='form-group' id='submission' action="TripEditConfirmation.php?trip_id=<?php echo $trip_id; ?>" method="POST">
                <label class='skipper'>Departure Date</label>
                <label>Arrival Date</label>
            <div class='form-group'>
                <input value = "<?php echo $departure_date; ?>" name='departureDate' placeholder="Departure Date" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" required>
                <input value = "<?php echo $arrival_date; ?>" name='arrivalDate' placeholder="Arrival Date" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" required>
            </div>
                <label class='skipperr'>Start Location</label>
                <label>End Location</label>
            <div class='form-group'>
                <input value = "<?php echo $start_location; ?>" class='start' type='text' name='startLocation' placeholder="Start Location" required>
                <input value = "<?php echo $end_location; ?>" class='end' type='text' name='endLocation' placeholder="Arrival Location" required>
            </div>
            <!- this is arithmetic portion -->
                <label class="skipperrr">Freight Charges</label>
                <label class="skipperrrr">Expenses</label>
                <label class="skipperrrrr">Driver Pay</label>
                <label>Repair</label>
            <div class='form-group'>
                <input value = "<?php echo $freight_charges; ?>" onchange='freightCheck()' id='freight' type='text' name='freightCharges' placeholder="Freight Charges" required>
                <input value = "<?php echo $expenses; ?>" onchange='expensesCheck()' id='expense' type='text' name='expensePay' placeholder="Expenses" required>
                <input value = "<?php echo $driver_pay; ?>" onchange='driverPayCheck()' id='driver' type='text' name='driverPay' placeholder="Driver Pay" required>
                <input value = "<?php echo $repair; ?>" onchange='repairCheck()' id='repair' type='text' name='repair' placeholder="Repair" required><label>
            </div>
                <label>Profit</label>
            <div class='form-group'>
                <input value = "<?php echo $profit; ?>" id='profit' type='text' name='profit' placeholder="Profit" readonly required>
            </div>
        </form>

        <button class="btn btn-default btn-sm" id='myBtn' onclick='myFunction()'>Go Back</button>
        <button class="btn btn-default btn-sm" form='submission' >Save</button>

	</div>
</div>
</div>

<script>
function myFunction()
{
    document.location.href = 'TripDataTable.php?truck_id=<?php echo $_SESSION['truck_id'] ?>';
}// end function

function isitNumber(str)
{
    return /^\-?[0-9]+(e[0-9]+)?(\.[0-9]+)?$/.test(str);
}// end function

function calculate()
{
    var freightCharges = document.getElementById('freight').value;
    var expense        = document.getElementById('expense').value;
    var driverPay      = document.getElementById('driver').value;
    var repair         = document.getElementById('repair').value;
    if(isitNumber(freightCharges) && isitNumber(expense) && isitNumber(driverPay) && isitNumber(repair))
    {
        document.getElementById('profit').value = freightCharges - expense - driverPay - repair;
    }// end if
    else
    {
        document.getElementById('profit').value = "";
    }// end else
}// end function
 
function freightCheck(){
    var freightCharges = document.getElementById('freight').value;
    if(!isitNumber(freightCharges) && freightCharges != "")
    {
        alert('Freight Charges is not a valid number');
        document.getElementById('profit').value = "";
        document.getElementById('freight').value = "";
    }// end if
    else
    {
        calculate();
    }// end else
}// end function

function expensesCheck(){
    var expenseCharges = document.getElementById('expense').value;
    if(!isitNumber(expenseCharges) && expenseCharges != "")
    {
        alert('Expense is not a valid number');
        document.getElementById('profit').value = "";
        document.getElementById('expense').value = "";
    }// end if
    else
    {
        calculate();
    }// end else
}// end function

function driverPayCheck(){
    var driverPayCharges = document.getElementById('driver').value;
    if(!isitNumber(driverPayCharges) && driverPayCharges != "")
    {
        alert('Driver Pay is not a valid number');
        document.getElementById('profit').value = "";
        document.getElementById('driver').value = "";
    }// end if
    else
    {
        calculate();
    }// end else
}// end function

function repairCheck(){
    var repairCharges = document.getElementById('repair').value;
    if(!isitNumber(repairCharges) && repairCharges != "")
    {
        alert('Repair is not a valid number');
        document.getElementById('profit').value = "";
        document.getElementById('repair').value = "";
    }// end if
    else
    {
        calculate();
    }// end else
}// end function

</script>
</body>
</html>