<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="About.css">
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
        <li><a href="Login.php"><i class="fas fa-sign-in-alt"></i> Log In</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class='container'>
  <div class='jumbotron'>
    <div class="page-header">
        <h2 class='header'>Welcome To My Trucking Application! <small>By: Amesh Kahloon</small></h2>
        <hr>
    </div>
    <h3> Overview </h3>
    <p id='description'> This program enables you to input/store various data in your truck company, allowing you to efficently access trip information for each truck </p>
    <h3>Main Features </h3>
    <ul id="features" class="list-group">
      <li class="list-group-item"><h4>MySQL DataBase</h4> Uses MYSQL Database to store/save crucial  information about your truck company (trucks, trips, profits)</li>
      <li class="list-group-item"><h4>Log Table</h4>Gives updates on any changes/mofication to information in your database </li>
      <li class="list-group-item"><h4>Report</h4>Gives reports on revenue on compaines, trucks and trips</li>
      <li class="list-group-item"><h4>Passport Protected</h4>All your information will be avaliable to you only</li>
    </ul>
  </div>
</div>

</body>
</html>