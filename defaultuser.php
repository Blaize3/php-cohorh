<?php
	require('config.php');

	if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
		header('location: signin.php');
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
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/general.css" />
	<link rel="stylesheet" type="text/css" href="css/homepage.css" />
	<link rel="stylesheet" type="text/css" href="css/defaultuser.css" />

	<title>Cohort | Welcome to Cohort</title>
</head>
<body>
	<header>
		<?php 
			echo '<input type="hidden" name="session-email" id="session-email" value="'. (isset($_SESSION['email']) ? $_SESSION['email']: '' ) .'" />';
			echo '<input type="hidden" name="session-lastname" id="session-lastname" value="'. (isset($_SESSION['lastname']) ? $_SESSION['lastname']:'') .'" />';
			echo '<input type="hidden" name="session-firstname" id="session-firstname" value="'. (isset($_SESSION['firstname']) ? $_SESSION['firstname']:'') .'" />';
			echo '<input type="hidden" name="session-image_url" id="session-image_url" value="'. (isset($_SESSION['image_url']) ? $_SESSION['image_url']:'') .'" />';
			echo '<input type="hidden" name="user-id" id="user-id" value="'. (isset($_SESSION['user_id']) ? $_SESSION['user_id']:'') .'" />';
		 ?>
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
								<a style="text-decoration: none; width: 100%;" href="#" title="<?php echo (isset($_SESSION['lastname']) ? $_SESSION['lastname']:'') . ' ' . (isset($_SESSION['firstname']) ? $_SESSION['firstname']:''); ?>">
									<img class="user-profile" src="<?php echo (isset($_SESSION['image_url']) ? $_SESSION['image_url']:''); ?>"> <br><br>
										
									<span style="padding: 10px;">
										<?php echo ucfirst((isset($_SESSION['lastname']) ? $_SESSION['lastname']:'')) . ' ' . ucfirst((isset($_SESSION['firstname']) ? $_SESSION['firstname']:'')); ?>
									</span>	
								</a><br>
								<a href="#" id="view-profile-link" style="padding: 20px;">
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
				<div id="content-area">
					<div class="menu-section" id="inner-content-area">
						<table style="width: 100%;">
							<tr>
								<td class="d-flex" height="80px">
									<table style="width: 100%;">
										<tr style="">
											<td style="width: 100%; height: 38px; display: flex; flex-direction: row;">
												<div style="width: 100%;">
													<ul class="logged-in-user-menu">
														<li><a onclick="projectsMenuItem()" id="project-menu-link" class="active" href="#">Projects</a></li>
														<li><a onclick="messagesMenuItem()" id="message-menu-link" class="inactive" href="#">Messages</a></li>
														<li><a onclick="networkMenuItem()" id="network-menu-link" class="inactive" href="#">Network</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr style="">
											<td style="width: 100%; height: 38px;display: flex; flex-direction: row;">
												<div id="selected-item-title" class="selected-item-title" style="width: 70%;"></div>
												<div class="d-flex" style="width: 25%;">
													<ul id="profile-menu">
														<li id="li"><a id="create-project" href="#">
														<i class="fas fa-plus"></i>&nbsp;Create Project</a></li>
														<li id="li1" class="dropdown"><a href="#" class="dropbtn"><i class="fas fa-cog"></i>
														&nbsp;Settings
														</a>
															<div class="dropdown-content">
      															<a id="change-pix" href="#"><i class="fas fa-images"></i>&nbsp;Change profile image</a>

      															<a id="change-password" href="#"><i class="fas fa-key"></i>&nbsp;Change user password</a>

																<a href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Log Out</a>
    														</div>
														</li>
													</ul>
												</div>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>
					<!-- Main Content Area -->
					<div id="user-content-area" class="user-content-area">


						
					</div>
					<!-- Chat Section -->
					<div id="chat-area" class="form-group" style="width: 90%; margin-left: auto; margin-right: auto; margin-top: 10px;">
						
					</div>
				</div>
			</div>
		</div>
	</main>

	<footer>
	</footer>



	<!-- Scripting  -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
	<!-- <script type="text/javascript" src="js/project_list.js"></script> -->
	<!-- <script type="text/javascript" src="js/defaultuser.js"></script> -->
	<script type="text/javascript" src="js/defaultusertest.js"></script>
	<script type="text/javascript" src="js/defaultuserMain.js"></script>	
	<script type="text/javascript" src="js/javascriptinjectionfunction.js"></script>
	<script type="text/javascript">
	</script>
	<?php  mysqli_close($con); ?>
</body>
</html>