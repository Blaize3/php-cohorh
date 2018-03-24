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

	<title>Email Simulation</title>
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
		<div class="">
			<div id="all-content">
				<div id="side-menu">
					<!-- user profile images -->
					<table style="width: 245px; margin-bottom: 30px;">
						<tr>
							<td class="" height="200px" style="width: 100%; text-align: center;"><br>
								<p style="height:170px; width: 100%; text-align: center;">
								<br>
								<a style="text-decoration: none; width: 100%;" href="#" title="">
									 <br><br>
								</a><br>
								<a href="#" id="view-profile-link" data-toggle="modal" data-target="#view-profile" style="padding: 20px;">
									
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
					
				?>
				<div id="content-area">
					<div class="container">
						<p class="row-height-xs"></p>
						<h5 class="info-status" style="width: 100%; text-align: center;">Received Email Invitations</h5>
						<p class="row-height-xs"></p>
							<div class="row">
							<p class="row-height-sm"></p>
								<table class="table table-hover">
								  <thead>
								    <tr>
								      <th scope="col">Email ID</th>
								      <th scope="col">Subject</th>
								      <th scope="col">Message</th>
								    </tr>
								  </thead>
								  <tbody>
 
								<?php 
									$sql = "SELECT * FROM invitedgroupmember";

									if (!mysqli_query($con, $sql)){
									
										echo "Error:" . mysqli_error($con);
										
									} else {
										
										$emailresult = mysqli_query($con, $sql);

										while($row = mysqli_fetch_assoc($emailresult)){

								?>
										 <tr>
									      <td><a id="<?php echo $row['invitenumber'];?>" href="#" data-toggle="modal" data-target="#viewemail"><?php echo $row['invitenumber'];?></a></td>

									      <td><a id="<?php echo $row['invitenumber'];?>" href="#" data-toggle="modal" data-target="#viewemail"><?php echo $row['subject'];?></a></td>

									      <td><a id="<?php echo $row['invitenumber'];?>" href="#" data-toggle="modal" data-target="#viewemail"><?php echo substr(str_replace("<br />", "", $row['email_body']), 0, 25)." ...";?></a></td>
									    </tr>

								<?php
										}
									}
								?>	
								 	</tbody>
								</table>
							<p class="row-height-xs"></p>
							</div>
						</div>
								</div>
							</div>
						</div>
		
	</main>

	<footer>
		<?php  mysqli_close($con); ?>
	</footer>

	<div class="modal fade" id="viewemail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <!-- <div class="modal-header">
		      </div> -->
		      <div class="modal-body">
		      	<div class="container-fluid">
		      		<h6 class="modal-title" id="from" style="width:100%; text-align: left; font=font-weight: lighter;">&nbsp;&nbsp;&nbsp;From: Ode Akugbe</h6>
		       	 	<h6 class="modal-title" id="to" style="width:100%; text-align: left; font=font-weight: lighter;">&nbsp;&nbsp;&nbsp;To: Jude Okon</h6>
		        	<h6 class="modal-title" id="subject" style="width:100%; text-align: left; font=font-weight: lighter;">&nbsp;&nbsp;&nbsp;Subject: Invitation to join a Prooject</h6>
		      	</div>
		      	<div class="container">
		      		<div class="form-group">
		      			<p id="body" style="padding: 30px 20px;">
		      				
		      			</p>
		      		</div>
		      	</div>
		      </div>
		      <!-- <div class="modal-footer">
		        <button type="button" onclick="deleteProjectMember()" class="btn-all-btn btn-blue">Delete Member</button>
		      </div> -->
		    </div>
		  </div>
		</div>


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

			$(document).click(function(e){
				console.log(e.target.id)
				var invitationId = e.target.id;

				$.post("retrieveInviteinfo.php", {invitationId: invitationId}, function(isSuccessfulSignup){
						console.log(isSuccessfulSignup);

						var data = JSON.parse(isSuccessfulSignup);

						$("#to").html("&nbsp;&nbsp;&nbsp;From: " + data.senderemail);
						$("#from").html("&nbsp;&nbsp;&nbsp;to: " + data.invitesemail);
						$("#subject").html("&nbsp;&nbsp;&nbsp;subject: " + data.subject);
						$("#body").html(data.email_body);
				});
			});			
			
		});// Closes Document Ready

	
	</script>
</body>
</html>



