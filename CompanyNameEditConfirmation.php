<!DOCTYPE html>
<html>
<head>
	<title>Company Edit</title>
</head>
<body>
	
<?php
include 'DataBaseConnection.php';
session_start();
$company_id = $_SESSION['company_id'];
$newCompanyName = $_POST['newCompanyName'];
$sql = "UPDATE company SET companyName='$newCompanyName' 
		WHERE company_ID LIKE '$company_id'";
if ($conn->query($sql) === TRUE) {	
   	echo "Company successfully updated";
} else {
   	echo "Error updating record: " . $conn->error;
}// end if-else

$entry = "A company with id: " . $company_id . " has been edited to a new name: " .$newCompanyName;
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