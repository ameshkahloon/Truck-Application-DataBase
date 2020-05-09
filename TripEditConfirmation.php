<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Trip Confirmation</title>
</head>
<body>

<?php
include 'DataBaseConnection.php';
session_start();
$trip_id = $_GET['trip_id'];
$truck_number = $_SESSION['truck_id'];
$departure_date = $_POST['departureDate'];
$arrival_date = $_POST['arrivalDate'];
$start_location = $_POST['startLocation'];
$end_location = $_POST['endLocation'];
$freight_charges = $_POST['freightCharges'];
$expenses = $_POST['expensePay'];
$driver_pay = $_POST['driverPay'];
$repair = $_POST['repair'];
$profit = $_POST['profit'];

$sql = "UPDATE trips SET departure_date='$departure_date', arrival_date='$arrival_date', start_location='$start_location', end_location='$end_location', freight_charges='$freight_charges', expenses='$expenses', driver_pay='$driver_pay', repair='$repair', profit='$profit' WHERE trip_id='$trip_id'";
			            
if ($conn->query($sql) === TRUE) {
	echo "Trip sucessfully added";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}// end if-else block

$entry = "A trip with id: " . $trip_id . " has been modified";
$sql = "INSERT INTO logtable (log_entry)
VALUES ('$entry')";
    
if ($conn->query($sql) === TRUE) {
    echo "log sucessfully added";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}// end if-else block

header("Location: TripDataTable.php?truck_id={$_SESSION['truck_id']}");
?>

</body>
</html>