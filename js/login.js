///
///		Document ready method code
///
$(document).ready(function(){
	///
	///	 reset email field on click
	$("#email").click(function(e){
		e.preventDefault();
			$("#input-error-msg").html("");
			$("#input-error-msg").css("color", "#f00");
			$("#email").css("border", "solid thin #aaa");
	});
	///
	///	 reset password field on click
	$("#uPassword").click(function(e){
		e.preventDefault();
			$("#input-error-msg").html("");
			$("#input-error-msg").css("color", "#f00");
			$("#uPassword").css("border", "solid thin #aaa");
	});
	///
	/// Login button clicked
	///
	$("#login-click").click(function(e){
		e.preventDefault();

		var emailAddress = $("#email").val();
		var uPassword = $("#uPassword").val();

		if (emailAddress == "" && uPassword == ""){
			$("#input-error-msg").html("Email and password fields are empty");
			$("#input-error-msg").css("color", "#f00");
			$("#email").css("border", "solid thin #f00");
			$("#uPassword").css("border", "solid thin #f00");
		} else if (emailAddress == "") {
			$("#input-error-msg").html("Email field is empty");
			$("#input-error-msg").css("color", "#f00");
			$("#email").css("border", "solid thin #f00");
		} else if (uPassword == "") {
			$("#input-error-msg").html("Password field is empty");
			$("#input-error-msg").css("color", "#f00");
			$("#uPassword").css("border", "solid thin #f00");
		} else {
		// console.log("General...");
			///using Ajax to process login
			console.log(emailAddress);
			console.log(uPassword);
			$.post("login.php", {userEmail: emailAddress, userPassword: uPassword}, function(isSuccessfulSignup){
				var isSignedUp = isSuccessfulSignup;

				console.log(isSignedUp);

				if (isNaN(isSignedUp)){
					$("#input-error-msg").html(isSignedUp);
				} 

				if (!isNaN(isSignedUp) && (isSignedUp == 1)) {
					$("#input-error-msg").html("");
					$("#email").val("");
					$("#uPassword").val("");

					alert("login was successful!");

					// if (emailAddress === "akugbeode@yahoo.com"){
					// 	loadnewpage("admin.php");
					// } else {
						loadnewpage("defaultuser.php");
					// }
				}
			});
		}// ends if conditional...
	}); /// Login button clicked


});//ends Document ready method code