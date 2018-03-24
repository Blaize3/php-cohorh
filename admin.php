<?php require('config.php'); ?>

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
	<link rel="stylesheet" type="text/css" href="css/defaultuser.css" />

	<title>Cohort | Welcome to Cohort</title>
	<style>
		.info-status{
			width: 100%;
			text-align: center;
		}
	</style>
</head>
<body>
	<header>
		
	</header>

	<main>
		<?php 
			
		?>
		<div class="">
			<div id="all-content">
				<div id="side-menu">
					<!-- user profile images -->
					<table style="width: 245px; margin-bottom: 30px;">
						<tr>
							<td class="" height="200px" style="width: 100%; text-align: center;"><br>
								<p style="height:170px; width: 100%; text-align: center;">
								<br>
								<a style="text-decoration: none; width: 100%;" href="#" title="<?php echo $_SESSION['lastname'] . ' ' . $_SESSION['firstname']; ?>">
									<img class="user-profile" src="<?php echo $_SESSION['image_url']; ?>"> <br><br>
										
									<span style="padding: 10px;">
										<?php echo ucfirst($_SESSION['lastname']) . ' ' . ucfirst($_SESSION['firstname']); ?>
									</span>	
								</a><br>
								<a href="#" id="view-profile-link" data-toggle="modal" data-target="#view-profile" style="padding: 20px;">
									<i>View Profile</i>
								</a>
								</p>
							</td>
						</tr>
					</table>

					<div id="side-menu-data" class="side-menu-data" style="width: 100%; text-align: center;">
						<!-- side Menu content -->
					</div>
				</div>
				<?php 
					$userCount = 0;
					$projectCount = 0;

					$userQuery = "SELECT user_id FROM users";
					$projectQuery = "SELECT project_id FROM projects";

					if (!mysqli_query($con, $userQuery)){
			
						echo "Error:" . mysqli_error($con);
						
					} else {
						
						$result = mysqli_query($con, $userQuery);

						while ($row = mysqli_fetch_assoc($result)){
							$userCount++;
						}
					}



					// if (!mysqli_query($con, $projectCount)){
			
					// 	echo "Error:" . mysqli_error($con);
						
					// } else {
						
					// 	$result = mysqli_query($con, $projectCount);

					// 	$row = mysqli_fetch_assoc($result);

					// 	if (count($row) > 0){
					// 		$projectCount = count($row);
					// 	} else {
					// 		$projectCount = 0;
					// 	}
					// }

					$_SESSION['projectCount'] = $projectCount;
					$_SESSION['userCount'] = $userCount;
				?>
				<div id="content-area">
					<div class="container">
						<p class="row-height-xs"></p>
						<h3 class="info-status">Admin Management Console</h3>
						<p class="row-height-xs"></p>
							<div class="row">
							<p class="row-height-sm"></p>
								<div class="col-md-6">
									<div class="row">
										<h4 class="info-status">Number Created Projects</h4>
										<h1 class="info-status"><?php if(isset($_SESSION['projectCount'])){ echo $_SESSION['projectCount'];} ?></h1>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<h4 class="info-status">Number of Registered Users</h4>
										<h1 class="info-status"><?php if(isset($_SESSION['userCount'])){ echo $_SESSION['userCount'];} ?></h1>
									</div>
								</div>
							<p class="row-height-xs"></p>
							</div>
							<!-- <div class="row">

								<div class="col-md-6">
									<div class="row">
										<h4 class="info-status">Logged In Users Count</h4>
										<h1 class="info-status">0</h1>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<h4 class="info-status">Number Created Projects</h4>
										<h1 class="info-status">0</h1>
									</div>
								</div>
							</div> -->
						</div>
								</div>
							</div>
						</div>
		
	</main>

	<footer>
		<?php  mysqli_close($con); ?>
	</footer>


	<!-- Scripting  -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
	<!-- <script type="text/javascript" src="js/project_list.js"></script> -->
	<!-- <script type="text/javascript" src="js/defaultuser.js"></script> -->
	<script type="text/javascript" src="js/defaultusertest.js"></script>
	<script type="text/javascript">

		/*
			Call Document Ready Method
		*/

		//Open Document Ready Method
		$(document).ready(function(){			
			
		});// Closes Document Ready

	
	</script>
</body>
</html>



