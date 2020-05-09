<!DOCTYPE html>
<html>
<head>
	<title>Truck Deletion Confirmation</title>
</head>
<body>

<?php
session_start();
include 'DataBaseConnection.php';
$company_id = $_GET['company_id'];
$_SESSION['checker'] = 1;
$sql = "SELECT companyName FROM company WHERE company_ID LIKE '$company_id'";
$result = $conn->query($sql);
while ($row = mysqli_fetch_array($result)){
	$_SESSION['deletedName'] = $row['companyName'];
}// end while loop
$sql = "DELETE FROM company WHERE company_ID LIKE '$company_id'";
if ($conn->query($sql) === TRUE){
	$last_id = $conn->insert_id;
}
else {}// end if-else

$entry = "A company with id: " . $company_id . " has been deleted";
$sql = "INSERT INTO logtable (log_entry)
VALUES ('$entry')";

if ($conn->query($sql) === TRUE) {
	echo "log sucessfully added";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}// end if-else block

header('Location: CompanyDataTable.php');
?>


</body>
</html>