<?php require('header.php'); ?>

<main>
	
</main>

<!-- Scripting  -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
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

<?php require('formfooter.php'); ?>