<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log Table Delete</title>
</head>
<body>

<?php
session_start();
include 'DataBaseConnection.php';
$log_id = $_GET['log_id'];
$_SESSION['logChecker'] = 1;
$sql = "DELETE FROM logtable WHERE log_id LIKE '$log_id'";
if ($conn->query($sql) === TRUE){
    echo "Log successfully deleted";
}
else {}// end if-else
$_SESSION['deletedLogID'] = $log_id;

header('Location: LogTable.php');
?>



</body>
</html>