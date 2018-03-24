<?php
	require('config.php');

	if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
		header('location: signin.php');
	}

	include('privileges.php'); 
 
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
	<link rel="stylesheet" type="text/css" href="css/defaultuser.css" />
	<link rel="stylesheet" type="text/css" href="css/selectedgroup.css" />

	<title>Cohort | Welcome to Cohort</title>
	</style>
</head>
<body>
	<header>
	<?php
		echo '<input type="hidden" name="session-email" id="session-email" value="'. (isset($_SESSION['email']) ? $_SESSION['email']: '' ) .'" />';
		echo '<input type="hidden" name="session-lastname" id="session-lastname" value="'. (isset($_SESSION['lastname']) ? $_SESSION['lastname']:'') .'" />';
		echo '<input type="hidden" name="session-firstname" id="session-firstname" value="'. (isset($_SESSION['firstname']) ? $_SESSION['firstname']:'') .'" />';
		echo '<input type="hidden" name="session-image_url" id="session-image_url" value="'. (isset($_SESSION['image_url']) ? $_SESSION['image_url']:'') .'" />';
		echo '<input type="hidden" name="user-id" id="user-id" value="'. (isset($_SESSION['user_id']) ? $_SESSION['user_id']:'') .'" />';
		echo '<input type="hidden" name="project-id" id="project-id" value="'. (isset($_SESSION['project_id']) ? $_SESSION['project_id']:'') .'" />';
		echo '<input type="hidden" name="project-name" id="project-name" value="'. (isset($_SESSION['projectname']) ? $_SESSION['projectname']:'') .'" />';
		echo '<input type="hidden" name="project-image" id="project-image" value="'. (isset($_SESSION['projectImage']) ? $_SESSION['projectImage']:'') .'" />';
		echo '<input type="hidden" name="project-description" id="project-description" value="'. (isset($_SESSION['description']) ? $_SESSION['description']:'') .'" />';
	?>
	</header>

	<main>
		<div class="">
			<div id="all-content">
				<div id="side-menu">
					<!-- user group images -->
					<table style="width: 245px; margin-bottom: 30px;">
						<tr>
							<td class="d-flex" height="80px">
								<a style="text-decoration: none;" href="#" title="<?php if (isset($_SESSION['project_id'])){ echo $_SESSION['project_id']; } ?>">
									<span class="project-name"><?php if (isset($_SESSION['projectname'])){ echo $_SESSION['projectname']; } ?></span><br>&nbsp;@<?php echo $_SESSION['lastname']." ".$_SESSION['firstname']; ?>
								</a>
							</td>
						</tr>
					</table>
					<!-- group messaging session -->
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
														<li><a onclick="projectSummaryItem()" id="project-summary-link" class="active" href="#">Projects</a></li>
														<li><a onclick="projectMessagesItem()" id="project-message-link" class="inactive" href="#">Messages</a></li>
														<li><a onclick="teamMembersItem()" id="team-member-link" class="inactive" href="#">Network</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr style="">
											<td style="width: 100%; height: 38px;display: flex; flex-direction: row;">
												<div id="selected-item-title" class="selected-item-title" style="width: 70%;"></div>
												<div class="d-flex" style="width: 25%;">
													<ul id="profile-menu">
														<li id="li1" class="dropdown"><a href="#" class="dropbtn"><img style="width: 30px; height: 30px; border-radius: 100%" src="<?php echo $_SESSION['image_url'];?>">
															&nbsp;
															<?php
      															echo ucfirst($_SESSION['lastname'][0]).ucfirst($_SESSION['firstname'][0]);
      														?>
														</a>
															<div class="dropdown-content">
      															<a title="back to user account" id="change-password" href="defaultuser.php">
      																<i class="fas fa-arrow-alt-circle-left"></i>
      																&nbsp;<?php
      																	echo $_SESSION['lastname']." ".$_SESSION['firstname'];
      																?>
      															</a>

																<a href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Log Out</a>
    														</div>
														</li>
														<li id="li1" class="dropdown"><a href="#" class="dropbtn"><i class="fas fa-cog"></i>
														&nbsp;Options
														</a>
															<div class="dropdown-content">
      <?php  
								foreach($user_privilege as $key => $value){

									if ($value[2] ==1){
										echo $value[1];
									}

								}

		?>
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
						<!-- 0000000000000000000000 -->

						<div id="message-holder-UI-container" class="Projects" style="width: 100%; margin-left: auto; margin-right: auto; word-wrap: break-word; ">
							<div class="" style="width: 98%;">
								
							</div>
						</div>

						<!-- 00000000000000000000000 -->
					</div>
					<!-- Chat Section -->
					<div id="chat-area" class="form-group" style="width: 90%; margin-left: auto; margin-right: auto; margin-top: 10px;">
						<!-- 0000000000000000 -->
						
						<!-- 00000000000000 -->
					</div>
				</div>
			</div>
		</div>
	</main>

	<footer>
	</footer>

	<!-- 0000000000000oooooooooooooooo000000000000000000000 -->
		<!-- Modal -->
		<div class="modal fade" id="viewProjectMembers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		     <form action="" method="POST">
		      <div class="modal-header">
		        <h5 class="modal-title" id="" style="width:100%; text-align: center; font=font-weight: lighter;"><span id="fullname" name="fullname">Ode Akugbe</span></h5> 
		      </div>
		      <div class="modal-body">
		      	<div class="container">
		      		<div class="form-group" style="text-align: center;">
		      			<img id="userprofileimage" name="userprofileimage" src="images/profile/001.jpg" style="width: 200px; height: 200px; border-radius: 20px; border: solid 3px #000;"><br /><br />
		      			<ul>
		      				<span id="email-details" name="email-details">akugbeode@gmail.com</span><br>
		      				<span id="tel-details" name="tel-details">07052858059</span>
		      			</ul>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		         <button type="button" onclick="" class="btn btn-sm btn-dark">Connection Request</button>
		      </div>
		    </div>
		   </form>
		  </div>
		</div>
	<!-- 0000000000000oooooooooooooooo000000000000000000000 -->

	<!-- Modal -->
		<div class="modal fade" id="inviteProjectMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		     <form action="selectedgroup.php" method="POST">
		      <div class="modal-header">
		        <h5 class="modal-title" id="" style="width:100%; text-align: center; font=font-weight: lighter;">Invite Project Member</h5>
		       <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button> -->
		      </div>
		      <div class="modal-body">
		      	<div class="container">
		      		<div class="form-group">
		      			<label>Invite Email</label>
		      			<div class="input-group">
							<div id="err-border-user" class="input-group-addon">
								<i class="icons fas fa-envelope fa-2x"></i>
							</div>
							<input type="text" class="form-control" name="invite-email" id="invite-email" />
						</div>
		      		</div>

		      		<div class="form-group">
		      			<label>Invite Fullname</label>
		      			<div class="input-group">
							<div id="err-border-user" class="input-group-addon">
								<i class="icons fas fa-user fa-2x"></i>
							</div>
							<input type="text" class="form-control" name="invite-fullname" id="invite-fullname" />
						</div>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" onclick="sendEmailInvitation()" class="btn-all-btn btn-blue">Send Invitation</button> <!--    -->
		      </div>
		    </div>
		   </form>
		  </div>
		</div>

	<!-- 0000000000000oooooooooooooooo000000000000000000000 -->
		<!-- Modal -->
		<div class="modal fade" id="addProjectMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		     <form action="selectedgroup.php" method="POST">
		      <div class="modal-header">
		        <h5 class="modal-title" id="" style="width:100%; text-align: center; font=font-weight: lighter;">Add Member to project</h5>
		       <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button> -->
		      </div>
		      <div class="modal-body">
		      	<div class="container">
		      		<div class="form-group">
		      			<div class="input-group">
							<div id="err-border-user" class="input-group-addon">
								<i class="icons fas fa-user fa-2x"></i>
							</div>
							<select class="form-control" name="add-project-member" id="add-project-member">
		     
		      				</select>
						</div>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" onclick="addUserToProject()" class="btn-all-btn btn-blue">Add Member</button>
		      </div>
		    </div>
		   </form>
		  </div>
		</div>
	<!-- 0000000000000oooooooooooooooo000000000000000000000 -->


	<!-- 0000000000000oooooooooooooooo000000000000000000000 -->
		<!-- Modal -->
		<div class="modal fade" id="removeProjectMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="" style="width:100%; text-align: center; font=font-weight: lighter;">Remove a Member from project</h5>
		        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button> -->
		      </div>
		      <div class="modal-body">
		      	<div class="container">
		      		<div class="form-group">
		      			<div class="input-group">
							<div id="err-border-user" class="input-group-addon">
								<i class="icons fas fa-user fa-2x"></i>
							</div>
							<select class="form-control" name="remove-project-member" id="remove-project-member">
		 
		      				</select>
						</div>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" onclick="deleteProjectMember()" class="btn-all-btn btn-blue">Delete Member</button>
		      </div>
		    </div>
		  </div>
		</div>
	<!-- 0000000000000oooooooooooooooo000000000000000000000 -->
	<!-- Scripting  -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
	<!-- <script type="text/javascript" src="js/project_list.js"></script> -->
	<script type="text/javascript" src="js/defaultusertest.js"></script>	
	<script type="text/javascript" src="js/javascriptinjectionfunction.js"></script>
	<script type="text/javascript" src="js/defaultprojectMain.js"></script>
	<script type="text/javascript">
	</script>
</body>
</html>