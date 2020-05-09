<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Confirmation</title>
</head>
<body>

<?php
include 'DataBaseConnection.php';
echo $_POST['username']."<br>";
echo $_POST['password'];

$sql = "SELECT login, password FROM signin WHERE log_id LIKE '1'";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $username=$row["login"];
        $password=$row["password"];
    }// end while loop
} else {
    echo "0 results";
}// end if-else

if($username == $_POST['username'] && $password == $_POST['password']){
    header("Location: CompanyDataTable.php");
} else{
    session_start();
    $_SESSION['loginChecker'] = 1;
    header("Location: Login.php");
}// end if-else

?>


</body>
</html>