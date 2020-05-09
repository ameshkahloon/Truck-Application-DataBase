<!DOCTYPE html>
<html>
<head>
	<title>Add Company Addition</title>
<body>
	
<?php
include 'DataBaseConnection.php';
session_start();
$company_id = $_SESSION['company_id'];
$name = $_POST['truckName'];
$sql = "INSERT INTO truck (company_ID, truckName)
		VALUES ('$company_id','$name')";
			            
if ($conn->query($sql) === TRUE) {
	$last_id = $conn->insert_id;
	echo "Truck sucessfully added";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}// end if-else block

$entry = "A new truck with id: " . $last_id . " for company with id: " . $company_id . " has been added into the database";
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