<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Index.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<?php
  session_start();
  $_SESSION['checker'] = 0;
  $_SESSION['truckChecker'] = 0;
  $_SESSION['tripChecker'] = 0;
  $_SESSION['loginChecker'] = 0;
  $_SESSION['logChecker'] = 0;
?>

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
        <li><a href="Login.php"><i class="fas fa-sign-in-alt"></i> Log In</a></li>
      </ul>
	</div>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbo">
                <h1>Trucking DataBase</h1>
                <hr>
                <a class="btn btn-primary btn-lg" href="Login.php" role="button"><i class="fas fa-database"></i> Get Started Now</a>
                <h6>A Database for Truck Companies</h6>
            </div>
        </div>
    </div>
</div>

</body>
</html>