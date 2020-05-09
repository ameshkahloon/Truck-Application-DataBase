<!DOCTYPE html>
<html>
<head>
	<title>Add Company Addition</title>
</head>
<body>
	
<?php
include 'DataBaseConnection.php';
$savedString = $_POST["companyName"];

$sql = "INSERT INTO company (companyName)
VALUES ('$savedString')";

if ($conn->query($sql) === TRUE) {
	echo "Company sucessfully added";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}// end if-else block

$entry = "A new company: " . $savedString . " has been added into the database";
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