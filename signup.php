<?php
	
	require('config.php');
	
	if (isset($_GET)){
		@$email = $_GET['email'];
		@$projectid = $_GET['projectid'];
	}
?>

<!DOCTYPE html>
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
			    	<button id="sign-in" class="btn-all-btn btn-blue">Sign In</button>
			    </form>
			  </div>
		  </div>
		</nav>	
	</header>

	<main>
		<input type="hidden" name="invite-sign-up-email" id="invite-sign-up-email" value="<?php if (isset($email)){ echo $email; }?>">
		<input type="hidden" name="invite-sign-up-projectid" id="invite-sign-up-projectid" value="<?php if (isset($projectid)){ echo $projectid; }?>">
		<!-- Main page Welcome and login in section for registered user -->
		<div class="container-fluid" style="background: #fff;">
			<p class="row-height-xs"></p>
			<div class="row">
				<div class="col-md-10 offset-md-1">
					<p class="row-height-sm"></p>
					<div class="row">
						<p class="row-height-xs"></p>
						<h3 class="full-width">Join Cohort</h3>
						<form class="homepage-login" action="processsignup.php" method="POST">
							<div class="row">
								<div class="form-group">
								    <small style="width: 100%; text-align: center;" id="input-error-msg" class="form-text text-danger"></small>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="form-group">
										<div class="input-group">
											<div id="err-border-user" class="input-group-addon">
												<i class="icons fas fa-user fa-2x"></i>
											</div>
											<input type="text" class="form-control" name="lastname" id="lastname" aria-describedby="" placeholder="Enter Lastname ">
											<small class="full-width" id="lastname-status-msg" class="form-text text-danger"></small>
										</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="form-group">
										<div class="input-group">
											<div id="err-border-user" class="input-group-addon">
												<i class="icons fas fa-user fa-2x"></i>
											</div>
											<input type="text" class="form-control" name="firstname" id="firstname" aria-describedby="" placeholder="Enter Firstname ">
											<small class="full-width" id="firstname-status-msg" class="form-text text-danger"></small>
										</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="form-group">
										<div class="input-group">
											<div id="err-border-user" class="input-group-addon">
												<i class="icons fas fa-envelope fa-2x"></i>
											</div>
											<input type="text" class="form-control" name="email" id="email" aria-describedby="" placeholder="Enter Email ">
											<small class="full-width" id="email-status-msg" class="form-text text-danger"></small>
										</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="form-group">
										<div class="input-group">
											<div id="err-border-user" class="input-group-addon">
												<i class="icons fas fa-phone fa-2x"></i>
											</div>
											<input type="text" class="form-control" name="telephone" id="telephone" aria-describedby="" placeholder="Enter Telephone number ">
											<small class="full-width" id="telephone-status-msg" class="form-text text-danger"></small>
										</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="form-group">
											<div class="input-group">
												<div id="err-border-pass" class="input-group-addon">
													<i class="icons fas fa-lock fa-2x"></i>
												</div>
												<input type="password" class="form-control" name="uPassword" id="uPassword" aria-describedby="" placeholder="Enter Password">
												<small class="full-width" id="password-status-msg" class="form-text text-danger"></small>
											</div>
									  	</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
									  	<div class="form-group">
											<div class="input-group">
												<div id="err-border-pass" class="input-group-addon">
													<i class="icons fas fa-lock fa-2x"></i>
												</div>
												<input type="password" class="form-control" name="confirmPassword" id="confirmPassword" aria-describedby="" placeholder="Confirm Password">
												<small class="full-width" id="con-pass-status-msg" class="form-text text-danger"></small>
											</div>
									  	</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="row">
									  	<div class="form-group">
											<div class="input-group">
												<div id="err-border-pass" class="input-group-addon">
													<i class="icons fas fa-calendar fa-2x"></i>
												</div>
												<input type="date" class="form-control" name="dateOfBirth" id="dateOfBirth" aria-describedby="" placeholder="Enter Date of Birth">
												<small class="full-width" id="dob-status-msg" class="form-text text-danger"></small>
											</div>
									  	</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
									  	<div class="form-group">
											<!-- <div class="input-group">
												<div id="err-border-pass" class="input-group-addon">
													<i class="icons fas fa-file fa-2x"></i>
												</div>
												<input type="file" class="form-control" name="upload" id="upload" aria-describedby="" placeholder="Confirm Password">
												<small class="full-width" id="upload-status-msg" class="form-text text-danger"></small>
											</div> -->
									  	</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group" style="width: 100%; text-align: center;">
									<div class="form-check">
										<input id="policy-signup-check" name="policy-signup-check" type="checkbox" value="" id="defaultCheck1" />
										<label  for="defaultCheck1">
											<span id="forgot-password-all-text" class="forgot-password-all-text">
												I agree with <a href="">terms and conditions</a>
											</span>
										</label>
									</div>	
							    </div>
							  	<div class="form-group" style="width: 100%; text-align: center;">
										<button type="submit" id="sign-up-click" name="sign-up-click" class="btn-all-btn btn-red"><i class="btn-icons fas fa-sign-in-alt"></i>&nbsp;&nbsp;Sign up</button>
							  	</div>
							</div>
						</form>
						<p id="test-data" style="width: 100%;"></p>
					</div>
				</div>
			</div>
		</div>
		<!-- Ends Main page Welcome and login in section for registered user -->
	</main>

	<!-- Scripting  -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
	<script type="text/javascript" src="js/signup.js"></script>
	<script type="text/javascript">
	</script>
<?php require('formfooter.php'); ?>