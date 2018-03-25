<!DOCTYPE html>
<html>
<head>
	<title>FOODIES | Good food is good mood</title>

	<!-- CSS Files go here -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- Fonts & Icons -->
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,700" rel="stylesheet"> 

	<!-- Font Awesome -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

	<style>
		.loginForm {
			margin-top: 10%;
			width: 30%;
			border: 1px solid black;
			padding: 1em;
			text-align: center;
		}
	</style>
</head>

<body>
	
	<?php
		ob_start();
		require('db.php');
		session_start();
		// If form submitted, insert values into the database.
		if (isset($_POST['username'])){
			// removes backslashes
			$username = stripslashes($_REQUEST['username']);
			//escapes special characters in a string
			$username = mysqli_real_escape_string($con,$username);
			$password = stripslashes($_REQUEST['password']);
			$password = mysqli_real_escape_string($con,$password);
			//Checking is user existing in the database or not
			$query = "SELECT * FROM `users` WHERE username='$username'
			and password='".md5($password)."'";
			$result = mysqli_query($con,$query) or die(mysql_error());
			$rows = mysqli_num_rows($result);
			//echo "<h1>test 1</h1>";
			if($rows==1){
				$_SESSION['username'] = $username;
				//echo "test 2";
				// Redirect user to index.php
				header("Location: explore.html");
				//echo "test 3";
			}else{
				echo "<div class='form'>
				<h3>Username/password is incorrect.</h3>
				<br/>Click here to <a href='login.php'>Login</a></div>";
			}
		}else{

	?>






	<div class="topText">Every food item from menu will be delivered in betweeen 9 AM to 4 AM. It takes around 45 minutes to deliver.</div>

	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<!-- <a class="navbar-brand navbar-logo" href="#">
	    	<img src="bootstrap-solid.svg" width="20" height="20" alt="">
	  </a> -->
	  <a class="navbar-brand foodies" href="landing.html">FOODIES</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarText">
	    <span class="navbar-text">
		Good food is good mood
			</span>
			</div>
			<div class="collapse navbar-collapse" id="navbarText"></div>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.html"><i class="fas fa-home"></i> Home </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="explore.html"><i class="fas fa-utensils"></i> Explore dishes</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="creviews.html"><i class="fas fa-users"></i> Customer Reviews</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="about_us.html"><i class="fas fa-info-circle"></i> About Us</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="login.html"><i class="fas fa-sign-in-alt"></i> Login / Sign Up <span class="sr-only">(current)</span></a>
				</li>
			</ul>
	  </div>
	</nav>

	<!-- Form -->
	<div class="container loginForm">
		<form action="" method="post" name="login">
			<div class="form-group">
				<label for="exampleInputEmail1">Username</label>
				<input type="text" name="username" class="form-control" name="u_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
				<small id="emailHelp" class="form-text text-muted">User privacy is our first concern</small>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" name="password" class="form-control" name="pwd" id="exampleInputPassword1" placeholder="Password">
			</div>
			<p>For new user registeration, <a href="signup.php">Click Here</a></p>
			<button type="submit" class="btn btn-dark">Submit</button>
		</form>
	</div>

	<!-- Javascript files go here -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="js/main.js"></script>

	<?php } 
	ob_end_flush(); ?>
</body>
</html>