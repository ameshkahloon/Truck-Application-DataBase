<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Login.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="Index.php"><i class="fas fa-home"></i> Home</a>
	</div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
		<li><a href="About.php">About</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fas fa-sign-in-alt"></i> Log In</a></li>
        <li><a href="#"><i class="fas fa-user-plus"></i> Sign Up</a></li>
      </ul>
	</div>
  </div>
</nav>

<div class='jumbotron'>
  <h1>Sign In</h1>
    <hr>
    <div class='container'>
      <form action="LoginConfirmation.php" method="POST">
        <input name="username" class='username' type="text" placeholder="Username" required>
        <input name='password' class='password' type="password" placeholder="Password" required>
        <input id='submit' class="btn btn-default" type="submit" value='Sign In'>
      </form>  
      <label class='bottom'>Log In</label>
    <div>
</div>

<?php
  session_start();
  if($_SESSION['loginChecker'] == 1){
    $message = "Username or Password is incorrect";
			echo "<script type='text/javascript'>
					alert('$message');
				  </script>";
  }// end if
  $_SESSION['loginChecker'] = 0;
?>

</body>
</html>