s<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="keywords" content="" />
    <meta name="author" content="Ode Akugbe" />
    <meta name="description" content="" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
	<link href="https://fonts.googleapis.com/css?family=Dosis|Open+Sans:300" rel="stylesheet">
	
	<!-- Link to CSS Style -->
	<link rel="stylesheet" type="text/css" href="css/general.css" />
	<link rel="stylesheet" type="text/css" href="css/homepage.css" />

	<title>Cohort | Welcome to Cohort</title>
	</style>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container">
			  <a class="navbar-brand" href="#"><h1><span  id="logox">Cohort.<span class="small-navbar-brand">com</span></span></h1></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			       <!-- Empty Menu Item -->
			    </ul>
			    <form class="form-inline my-2 my-lg-0">
			    	<button id="sign-up" class="btn-all-btn btn-red">Sign Up</button>
			    </form>
			  </div>
		  </div>
		</nav>	
	</header>

	<main>
		<!-- Main page Welcome and login in section for registered user -->
		<div class="container-fluid" style="background: #fff;">
			<p class="row-height-xs"></p>
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<p class="row-height-sm"></p>
					<div class="row">
						<h3 class="full-width">Log into Cohort</h3>
						<p class="row-height-xs"></p>
						<form class="homepage-login" action="login.php" Method="POST">
							<div class="form-group">
						    <small class="full-width" id="input-error-msg" class="form-text text-danger"></small>
						  </div>
							<div class="form-group">
								<div class="input-group">
									<div id="err-border-user" class="input-group-addon">
										<i class="icons fas fa-user"></i>
									</div>
									<input type="text" class="form-control" name="email" id="email" aria-describedby="" placeholder="Enter Email">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div id="err-border-pass" class="input-group-addon">
										<i class="icons fas fa-lock"></i>
									</div>
									<input type="password" class="form-control" name="uPassword" id="uPassword" aria-describedby="" placeholder="Enter Password">
								</div>
						  </div>
						  <div class="form-group" style="width: 100%; text-align: center;">
									<button type="button" id="login-click" class="btn-all-btn btn-blue"><i class="btn-icons fas fa-sign-in-alt"></i>&nbsp;&nbsp;Sign in</button>
						  </div>
						  <div class="form-group" style="width: 100%; text-align: center;">
									<span class="forgot-password-all-text"><span class="forgot-password">Forgot your password?</span> <a href="resetpassword.php">Get a new password!</a></span>
						  </div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Ends Main page Welcome and login in section for registered user -->
	</main>

	<?php require('formfooter.php'); ?>


	<!-- Scripting  -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
	<script type="text/javascript">

		///
		///		Document ready method code
		///
		$(document).ready(function(){


			///
			///	Go to Sign Up Page
			$("#sign-up").click(function(e){
				e.preventDefault();
				window.location = "signup.php";
			});//ends Go to Sign Up 


		});// ends document ready method
	
	</script>
</body>
</html>
