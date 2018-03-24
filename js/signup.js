		///
		///		Document ready method code
		///
		$(document).ready(function(){


			///
			///	Go to Sign Up Page
			$("#sign-in").click(function(e){
				e.preventDefault();
				window.location = "signin.php";
			});//ends Go to Sign Up page


	/*
	000000000000
	000000000000	Validate User Input on the Client Side and Process sign up functionality
	*/

			$("#sign-up-click").click(function(e){
				e.preventDefault();
				// count the number of errors that occured if any....
				var signupErrorCount = 0;
				var signupOkFlag = true;

				// Validate Lastname Fields
				if ($("#lastname").val() === "") { //Check if lastname field is empty					signupErrorCount++;
					signupOkFlag = false;
					$("#lastname-status-msg").css("color", "#f00");
					$("#lastname").css("border", "solid thin #f00");
					$("#lastname-status-msg").html("Lastname field is required!");
				} else if (!(regExpCharAndNumAndSpace($("#lastname").val()))) { //Check if lastname field contact is valid
					signupErrorCount++;
					signupOkFlag = false;
					$("#lastname-status-msg").css("color", "#f00");
					$("#lastname").css("border", "solid thin #f00");
					$("#lastname-status-msg").html('Lastname field accepts alphabets, numbers and blank characters');
				}

				// Validate Firstname Fields
				if ($("#firstname").val() === "") { //Check if firstname field is empty
					signupErrorCount++;
					signupOkFlag = false;
					$("#firstname-status-msg").css("color", "#f00");
					$("#firstname").css("border", "solid thin #f00");
					$("#firstname-status-msg").html("Fistname field is required!");
				} else if (!(regExpCharAndNumAndSpace($("#firstname").val()))) { //Check if firstname field format is valid
					signupErrorCount++;
					signupOkFlag = false;
					$("#firstname-status-msg").css("color", "#f00");
					$("#firstname").css("border", "solid thin #f00");
					$("#firstname-status-msg").html('Firstname field accepts alphabets, numbers and blank characters');
				}

				// Validate Email Fields
				if ($("#email").val() === "") { //Check if email field is empty
					signupErrorCount++;
					signupOkFlag = false;
					$("#email-status-msg").css("color", "#f00");
					$("#email").css("border", "solid thin #f00");
					$("#email-status-msg").html("Email field is required!");
				} else if (!(regExpEmail($("#email").val()))) { //Check if email field contact format is valid
					signupErrorCount++;
					signupOkFlag = false;
					$("#email-status-msg").css("color", "#f00");
					$("#email").css("border", "solid thin #f00");
					$("#email-status-msg").html('Invalid email format! Use this syntax: "you@domain.com"');
				}

				// Validate telephone Fields
				if ($("#telephone").val() === "") { //Check if telephone field is empty
					signupErrorCount++;
					signupOkFlag = false;
					$("#telephone-status-msg").css("color", "#f00");
					$("#telephone").css("border", "solid thin #f00");
					$("#telephone-status-msg").html("Telephone number field is required!");
				} else if (!(naijaMobileNumbers($("#telephone").val()))) { //Check if telephone field contact format is valid
					signupErrorCount++;
					signupOkFlag = false;
					$("#telephone-status-msg").css("color", "#f00");
					$("#telephone").css("border", "solid thin #f00");
					$("#telephone-status-msg").html('Invalid naija Telephone format! Use this syntax: "0xxxxxxxxxx"');
				}

				//Validate User password field
				if ($("#uPassword").val() === ""){
					signupErrorCount++;
					signupOkFlag = false;
					$("#password-status-msg").css("color", "#f00");
					$("#uPassword").css("border", "solid thin #f00");
					$("#password-status-msg").html("Password field is required!");
				}

				//Validate confirm password field
				if ($("#confirmPassword").val() != $("#uPassword").val()){
					signupErrorCount++;
					signupOkFlag = false;
					$("#con-pass-status-msg").css("color", "#f00");
					$("#confirmPassword").css("border", "solid thin #f00");
					$("#con-pass-status-msg").html("Passwords fields must be equal!");
				}

				// Validate date of birth Fields
				if ($("#dateOfBirth").val() === "" || $("#dateOfBirth").val() === null || $("#dateOfBirth").val() === undefined) { //Check if telephone field is empty
					signupErrorCount++;
					signupOkFlag = false;
					$("#dob-status-msg").css("color", "#f00");
					$("#dateOfBirth").css("border", "solid thin #f00");
					$("#dob-status-msg").html("Date of birth field is required!");
				}

				// Validate file upload Fields
				//if ($('#upload').get(0).files.length === 0) {

				//}

				//Validate policy check field field
				if (!($("#policy-signup-check").is(':checked'))){
					//forgot-password-all-text  policy-signup-check
					signupErrorCount++;
					signupOkFlag = false;
					$("#forgot-password-all-text").css("background", "#f00");
					$("#forgot-password-all-text").css("color", "#fff");
				}


				//Process sign up Instructions
				if ((signupErrorCount === 0) && (signupOkFlag)){
					///
					///	Sign up code here!!!
					///
					var lastname = ($("#lastname").val()).toLowerCase().trim();
					var firstname = ($("#firstname").val()).toLowerCase().trim();
					var emailAddress = ($("#email").val()).toLowerCase().trim();
					var telephone = ($("#telephone").val()).trim();
					var uPassword = $("#uPassword").val();
					var DoB = $("#dateOfBirth").val();

					///
					///	Invites parameter set
					///
						var inviteemail = $("#invite-sign-up-email").val();
						var inviteprojectid = $("#invite-sign-up-projectid").val();

						//alert(inviteemail);
						//alert(inviteprojectid);
							///
							///	invite sign up
							///
							/// using Ajax to process Sign Up
						$.post("processsignup.php", {inviteemail: inviteemail, inviteprojectid: inviteprojectid,userLastname: lastname, userFirstname: firstname,
								userEmail: emailAddress, userPassword: uPassword, userTelephone: telephone, userDoB: DoB}, function(isSuccessfulSignup){
							var isSignedUp = isSuccessfulSignup;

							if (isNaN(isSignedUp)){
								$("#test-data").html(isSignedUp);
							}

							if (!isNaN(isSignedUp) && (isSignedUp == 1)) {
								$("#email").val("");
								$("#uPassword").val("");
								$("#confirmPassword").val("");
								$("#policy-signup-check").prop('checked', false);

								alert("login was successful!");

								loadnewpage("defaultuser.php");
							}
						});

					///
					///
					///
				} else {
					$("#input-error-msg").html(`${signupErrorCount} ${( signupErrorCount === 1 ? "input field" : "input fields")} was completed with ${( signupErrorCount === 1 ? "error" : "errors")}`);
					$("#input-error-msg").css("text-align", "center");
					$("#input-error-msg").css("color", "#f00");
				}/// if error exist in

				//Reset lastname field setting to default
				$("#lastname").click(function(){
					$("#lastname-status-msg").css("color", "#f00");
					$("#lastname").css("border", "solid thin #aaa");
					$("#lastname-status-msg").html("");
					$("#input-error-msg").html("");
				});///ends lastname reset

				//Reset firstname field setting to default
				$("#firstname").click(function(){
					$("#firstname-status-msg").css("color", "#f00");
					$("#firstname").css("border", "solid thin #aaa");
					$("#firstname-status-msg").html("");
					$("#input-error-msg").html("");
				});///ends firstname reset

				//Reset email field setting to default
				$("#email").click(function(){
					$("#email-status-msg").css("color", "#f00");
					$("#email").css("border", "solid thin #aaa");
					$("#email-status-msg").html("");
					$("#input-error-msg").html("");
				});///ends email reset

				//Reset telephone field setting to default
				$("#telephone").click(function(){
					$("#telephone-status-msg").css("color", "#f00");
					$("#telephone").css("border", "solid thin #aaa");
					$("#telephone-status-msg").html("");
					$("#input-error-msg").html("");
				});///ends telephone reset

				//Reset password field setting to default
				$("#uPassword").click(function(){
					$("#password-status-msg").css("color", "#f00");
					$("#uPassword").css("border", "solid thin #aaa");
					$("#password-status-msg").html("");
					$("#input-error-msg").html("");
				});///ends password reset

				//Reset confirm password field setting to default
				$("#confirmPassword").click(function(){
					$("#con-pass-status-msg").css("color", "#f00");
					$("#confirmPassword").css("border", "solid thin #aaa");
					$("#con-pass-status-msg").html("");
					$("#input-error-msg").html("");
				});///ends confirm password reset

				//Reset date of birth password field setting to default
				$("#dateOfBirth").click(function(){
					$("#dob-status-msg").css("color", "#f00");
					$("#dateOfBirth").css("border", "solid thin #aaa");
					$("#con-pass-status-msg").html("");
					$("#dob-status-msg").html("");
				});///ends date of birth reset

				//Reset checkbox field setting to default
				$("#policy-signup-check").click(function(){
					$("#forgot-password-all-text").css("background", "#fff");
					$("#forgot-password-all-text").css("color", "#000");
					$("#input-error-msg").html("");
				});///ends email reset


			});// ends sign up Processing....

		});// ends document ready method