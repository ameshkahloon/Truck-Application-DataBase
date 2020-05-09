<!DOCTYPE html>
<html>
<head>
    <title>Truck Deletion</title>
</head>
<body>

<?php
session_start();
include 'DataBaseConnection.php';
$trip_id = $_GET['trip_id'];
$_SESSION['tripChecker'] = 1;
$sql = "SELECT trip_id FROM trips WHERE trip_id LIKE '$trip_id'";
$result = $conn->query($sql);
while ($row = mysqli_fetch_array($result)){
	$_SESSION['deletedTripID'] = $row['trip_id'];
}// end while loop
$sql = "DELETE FROM trips WHERE trip_id LIKE '$trip_id'";
if ($conn->query($sql) === TRUE) {} else {} // end if-else

$entry = "A trip with id: " . $trip_id . " has been deleted";
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