<!DOCTYPE html>
<html>
<head>
    <title>Truck Edit</title>
</head>
<body>
	
<?php
include 'DataBaseConnection.php';
session_start();
$truck_id = $_SESSION['truck_id'];
$newTruckName = $_POST['newTruckName'];
$sql = "UPDATE truck SET truckName='$newTruckName' 
		WHERE truck_ID LIKE '$truck_id'";
if ($conn->query($sql) === TRUE) {	
   echo "Truck successfully updated";
} else {
   echo "Error updating record: " . $conn->error;
}// end if-else
session_start();

$entry = "A truck with id: " . $truck_id . " has been edited to a new name: " . $newTruckName;
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