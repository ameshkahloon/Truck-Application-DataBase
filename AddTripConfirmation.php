<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trip Add Confirmation</title>
</head>
<body>

<?php
include 'DataBaseConnection.php';
session_start();
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

$sql = "INSERT INTO trips (truck_number, departure_date, arrival_date, start_location, end_location, freight_charges, expenses, driver_pay, repair, profit) 
		VALUES ('$truck_number','$departure_date', '$arrival_date', '$start_location', '$end_location', '$freight_charges', '$expenses', '$driver_pay', '$repair', '$profit')";
			            
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
	echo "Trip sucessfully added";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}// end if-else block

$entry = "A new trip with id: " . $last_id . " for truck with id: " . $truck_number . " has been added into the database";
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