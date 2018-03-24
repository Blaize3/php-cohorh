<?php require('header.php'); ?>

<main>
	<p class="row-height-sm"></p>
	<p class="row-height-xs"></p>
	<h1 style="width: 100%; text-align: center;">Restricted Page!!!</h1>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3" style="text-align: center;">
				<p class="row-height-xs"></p>
				<strong>
					You are trying to access this page ILLEGALLY!
				</strong>
					<br/>
					Contact the Administrator or 
					<a href="signin.php">click here to login...</a>
				
			</div>
		</div>
	</div>
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
			$("#sign-in").hide(1);
			$("#sign-up").hide(1);
		});// ends document ready method
	
	</script>
</body>
</html>