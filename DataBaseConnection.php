<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "truckingsystem";
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);
?>
 
</body>
</html>