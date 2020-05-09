<!DOCTYPE html>
<html>
<head>
    <title>Truck Deletion</title>
</head>
<body>

<?php
session_start();
include 'DataBaseConnection.php';
$truck_id = $_GET['truck_id'];
$_SESSION['truckChecker'] = 1;
$sql = "SELECT truckName FROM truck WHERE truck_ID LIKE '$truck_id'";
$result = $conn->query($sql);
while ($row = mysqli_fetch_array($result)){
	$_SESSION['deletedTruckName'] = $row['truckName'];
}// end while loop
$sql = "DELETE FROM truck WHERE truck_ID LIKE '$truck_id'";
if ($conn->query($sql) === TRUE) {} else {} // end if-else

$entry = "A truck with id: " . $truck_id . " has been deleted";
$sql = "INSERT INTO logtable (log_entry)
        VALUES ('$entry')";

if ($conn->query($sql) === TRUE) {
    echo "log sucessfully added";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}// end if-else block


header("Location: TruckDataTable.php?company_id={$_SESSION['company_id']}");
?>

</body>
</html>