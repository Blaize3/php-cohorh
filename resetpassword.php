<?php require('header.php'); ?>

<main>
	<div class="container-fluid" style="background: #fff;">
			<p class="row-height-xs"></p>
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<p class="row-height-sm"></p>

					<div class="row">
						<h3 class="full-width">Reset Password</h3>
						<p class="row-height-xs" style="font-size: 70%; color:#000; text-align: center; width: 100%;">
							Please enter your email address in the input field <br /> below and submit to reset password.
						</p>
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
						  <div class="form-group" style="width: 100%; text-align: center;">
									<button type="submit" id="reset-password" class="btn-all-btn btn-blue"><i class="btn-icons fas fa-sign-in-alt"></i>&nbsp;&nbsp;Send</button>
						  </div>
						</form>
					</div>
				</div>
			</div>
		</div>
</main>

<!-- Scripting  -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
	<script type="text/javascript">
		
		$(document).ready(function(){

			$("#sign-up").click(function(e){
				e.preventDefault();
				window.location = "signup.php";
			});


			$("#sign-in").click(function(e){
				e.preventDefault();
				window.location = "signin.php";
			});

		});

	</script>

<?php require('formfooter.php'); ?>