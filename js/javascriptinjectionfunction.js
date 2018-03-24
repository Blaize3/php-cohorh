
// Definfing a function get element by id
function getId(id){
	return document.getElementById(id);
}


// declaring variables used to reset password
var userPasswordResetBtn = getId('password-btn');
var updateUserPasswordBtn = getId('update-password-btn');

// this function aid in verify logged in user password before attempting to reset password...
function verifyUserPassword(){

	// getting user password from and retrieving user email data;
	var emailAddress = getId('session-email').value;
	var uPassword = getId('user-passport').value; 

	$.post("login.php", {userEmail: emailAddress, userPassword: uPassword}, function(isSuccessfulSignup){
		if (isSuccessfulSignup == 1){
				$("#user-content-area").empty();
				$("#chat-area").empty();
				$("#side-menu-data").empty();
				$("#selected-item-title").empty();
				$("#project-menu-link").attr("class", "inactive");
				$("#message-menu-link").attr("class", "inactive");
				$("#network-menu-link").attr("class", "inactive");
				$("#selected-item-title").html("");
				$("#user-content-area").html(newPassword);
				$("#side-menu-data").html("");
		} else {
			$("#con-pass-status-msg").css("color", "#f00");
			$("#user-passport").css("border", "solid thin #f00");
			$("#con-pass-status-msg").html("Invalid Password");
		}
	});
}

/// Clear errors from verify password fields
function clearErrors(){
	$("#con-pass-status-msg").css("color", "#f00");
	$("#user-passport").css("border", "solid thin #000");
	$("#con-pass-status-msg").html("");
}

// after verifying user password...
// this help to change password ...
function updateUserPassword(){
	// get new password and password confirmation
	var confirmPassword= (getId('confirm-passport').value).trim();
	var newPassword = (getId('new-passport').value).trim();
	var userid = (getId('user-id').value).trim();

	if (newPassword === ""){
		$("#password-status-msg").css("color", "#f00");
		$("#new-passport").css("border", "solid thin #f00");
		$("#password-status-msg").html("Password field is required!");

	} else if (confirmPassword != newPassword ){
		$("#con-pass-status-msg").css("color", "#f00");
		$("#confirm-passport").css("border", "solid thin #f00");
		$("#new-passport").css("border", "solid thin #f00");
		$("#con-pass-status-msg").html("Passwords fields must be equal!");

	} else if (confirmPassword === newPassword){
		$.post("updateuserpassword.php", {newPassword: newPassword, confirmPassword: confirmPassword, userid: userid}, function(isSuccessfulSignup){
			console.log(isSuccessfulSignup);
			if (isSuccessfulSignup == 1){
				alert("Password successfully updated...");	
				$("#new-passport").val("");
				$("#confirm-passport").val("");
			} else {
				alert("Error: Password update failed");
			}
		});
	}
}

function clearNewPasswordChangeField(){
	$("#password-status-msg").css("color", "#f00");
	$("#new-passport").css("border", "solid thin #000");
	$("#password-status-msg").html("");	
}

function clearConfirmPasswordChangeField(){
	$("#con-pass-status-msg").css("color", "#f00");
	$("#confirm-passport").css("border", "solid thin #000");
	$("#con-pass-status-msg").html("");
}

// Upload a User Profile Image

// function uploadUserProfileImage(e){
// 	e = e || window.event;
// 	// e.preventDefault();

// 	// var inputFile = getId("upload");
	
// 	// 	console.log($("#upload")[].file[]);
// 	// 	console.log(isSuccessfulSignup);
// 	// 	console.log(isSuccessfulSignup);
// 	// 	console.log(isSuccessfulSignup);
// 	// 	console.log(isSuccessfulSignup);
// 	// $.post("uploadimage.php", {data: ""}, function(isSuccessfulSignup){
// 	// 	console.log(isSuccessfulSignup);
// 	// 	//$("#image-update").attr('src', isSuccessfulSignup);
// 	// });

// 	$("#upload-image-form").on('submit',(function(e) {
// 		e.preventDefault();
// 		$.post("uploadimage.php", {data: new FormData(this)}, function(isSuccessfulSignup){
// 			console.log(isSuccessfulSignup);
// 			//$("#image-update").attr('src', isSuccessfulSignup);
// 		});	
// 	}));

		
// }


/*
	Create a project code
*/
function createNewProoject(e){
	e=e || window.event;
	e.preventDefault();
	//console.log("i am working

	// count the number of errors that occured if any....
	var signupErrorCount = 0;
	var signupOkFlag = true;

	/// Validate Project name field
	if($("#project-name").val() === ""){
		signupErrorCount++;
		signupOkFlag = false;
		$("#project-name-status-msg").css("color", "#f00");
		$("#project-name").css("border", "solid thin #f00");
		$("#project-name-status-msg").html("Project name field is required!");
	} else if (!regExpCharAndNumAndSpace($("#project-name").val())){
		signupErrorCount++;
		signupOkFlag = false;
		$("#project-name-status-msg").css("color", "#f00");
		$("#project-name").css("border", "solid thin #f00");
		$("#project-name-status-msg").html('Project name field accepts alphabets, numbers and space character.');
	}/// end project name field validation


	//Validate policy check field field
		if (!($("#create-project-policy").is(':checked'))){
			//forgot-password-all-text  policy-signup-check
			signupErrorCount++;
			signupOkFlag = false;
			$("#forgot-password-all-text").css("background", "#f00");
			$("#forgot-password-all-text").css("color", "#fff");
		}

	// Process create group 
	if ((signupErrorCount == 0) && (signupOkFlag)){
		var projectName = $("#project-name").val();
		var user_id = $("#user-id").val();
		$("#project-name").val("");
		$("#user-id").val("");
		$("#create-project-policy").prop('checked', false);
		//console.log(projectName + " " + user_id);

		$.post("createproject.php", {projectname: projectName, userid: user_id}, function(isSuccessfulSignup){
			
			//console.log(isSuccessfulSignup);
			//$("#input-error-msg").html(isSignedUp);

			if (isSuccessfulSignup == 1){
				alert("Project was created successfully");
				console.log(isSuccessfulSignup);
				window.location = "defaultuser.php";
			} else {
				alert("Project creation failed");
				console.log(isSuccessfulSignup);
			}
		});

	}

}

// Clear Project Error messages!!!

function clearCreateProjectText(){
	console.log("I have been clicked");
	$("#project-name-status-msg").css("color", "#f00");
	$("#project-name").css("border", "solid thin #000");
	$("#project-name-status-msg").html("");
}

function clearCreateProjectCheck(){
	$("#forgot-password-all-text").css("background", "#fff");
	$("#forgot-password-all-text").css("color", "#000");
}

//
//	User Project Details 
//
function projectsMenuItem(){

	var user_id = $("#user-id").val();

	$.post("getUserProjects.php", {userid: user_id}, function(isSuccessfulSignup){
		$("#user-content-area").empty();
		$("#chat-area").empty();
		$("#side-menu-data").empty();
		$("#selected-item-title").empty();
		$("#project-menu-link").attr("class", "active");
		$("#message-menu-link").attr("class", "inactive");
		$("#network-menu-link").attr("class", "inactive");
		$("#selected-item-title").html("");
		operationCategories = "Projects";
		$("#user-content-area").html(isSuccessfulSignup);
		$("#side-menu-data").html(`<div style="width: 100%; text-align: center; color:#66666e; padding-top:30px; font-size: 150%;"> No Projects Menu</div>`);

	});
}


//
//	User Messages Details 
//
function messagesMenuItem(){
	
	$("#user-content-area").empty();
	$("#chat-area").empty();
	$("#side-menu-data").empty();
	$("#selected-item-title").empty();
	$("#project-menu-link").attr("class", "inactive");
	$("#message-menu-link").attr("class", "active");
	$("#network-menu-link").attr("class", "inactive");
	$("#selected-item-title").html("");
	 operationCategories = "Messages";
	$("#user-content-area").html(messageSection);
	$("#side-menu-data").html();
}


//
//	User Network Details 
//
function networkMenuItem(){
	$("#user-content-area").empty();
	$("#chat-area").empty();
	$("#side-menu-data").empty();
	$("#selected-item-title").empty();
	$("#project-menu-link").attr("class", "inactive");
	$("#message-menu-link").attr("class", "inactive");
	$("#network-menu-link").attr("class", "active");
	$("#selected-item-title").html("");
	operationCategories = "Network";
	$("#user-content-area").html(networkList);
	$("#side-menu-data").html(`<div style="width: 100%; text-align: center; color:#66666e; padding-top:30px; font-size: 150%;"> No Network Menu</div>`);
}


/// Selected Project code section

/// Display selected Project options
function projectSummaryItem(){
	var user_id = $("#user-id").val();
	var project_id = $("#project-id").val();
	$.post("getProjectSummary.php", { userid: user_id, projectid: project_id }, function(isSuccessfulSignup){
		$("#user-content-area").empty();
		$("#chat-area").empty();
		$("#side-menu-data").empty();
		$("#selected-item-title").empty();
		$("#project-summary-link").attr("class", "active");
		$("#project-message-link").attr("class", "inactive");
		$("#team-member-link").attr("class", "inactive");
		$("#selected-item-title").html("");
		operationCategories = "Projects";
		$("#user-content-area").html(isSuccessfulSignup);
		$("#side-menu-data").html(`<div style="width: 100%; text-align: center; color:#66666e; padding-top:30px; font-size: 150%;"> No Projects Menu</div>`);
	});		
}


/// Display selected Project Messaging options
function projectMessagesItem(){
	var user_id = $("#user-id").val();
	var project_id = $("#project-id").val();
	$.post("getProjectMessagePrivate.php", { userid: user_id, projectid: project_id }, function(isSuccessfulSignup){
		//console.log(isSuccessfulSignup);
		$("#user-content-area").empty();
		$("#chat-area").empty();
		$("#side-menu-data").empty();
		$("#selected-item-title").empty();
		$("#project-summary-link").attr("class", "inactive");
		$("#project-message-link").attr("class", "active");
		$("#team-member-link").attr("class", "inactive");
		$("#selected-item-title").attr("title", 0);
		$("#selected-item-title").html("@ general");
		operationCategories = "Messages";
		$("#user-content-area").html(chatMessageHolderUI);
		$("#chat-area").html(chatSession)
		$("#message").attr("placeholder", "message @ general");
		$("#side-menu-data").html(isSuccessfulSignup);	
	});
}


/// Display selected Project team members options
function teamMembersItem(){
	var user_id = $("#user-id").val();
	var project_id = $("#project-id").val();
	$.post("getProjectMembers.php", { userid: user_id, projectid: project_id }, function(isSuccessfulSignup){
		//console.log(isSuccessfulSignup);
		$("#user-content-area").empty();
		$("#chat-area").empty();
		$("#side-menu-data").empty();
		$("#selected-item-title").empty();
		$("#project-summary-link").attr("class", "inactive");
		$("#project-message-link").attr("class", "inactive");
		$("#team-member-link").attr("class", "active");
		$("#selected-item-title").html("");
		operationCategories = "Network";
		$("#user-content-area").html(isSuccessfulSignup);
		$("#side-menu-data").html(`<div style="width: 100%; text-align: center; color:#66666e; padding-top:30px; font-size: 150%;"> No Network Menu</div>`);
	});
}

function generateUserSelectOptions(){
	$.post("getUserSelect.php", {}, function(isSuccessfulSignup){
		//console.log(isSuccessfulSignup);
		$("#remove-project-member").html(isSuccessfulSignup);
		$("#add-project-member").html(isSuccessfulSignup);
	});
}

function addUserToProject(){
	var project_id = $("#project-id").val();
	var user_id = $("#add-project-member").val();
	$.post("addUserToProject.php", {userid: user_id, projectid: project_id}, function(isSuccessfulSignup){
		if (isSuccessfulSignup == 1){
			alert("User " + user_id + " was successfully added to Project " + project_id);
			window.location = "selectedgroup.php";
		} else {
			alert(isSuccessfulSignup);
		}
	});
}

function deleteProjectMember(){
	var project_id = $("#project-id").val();
	var user_id = $("#remove-project-member").val();
	$.post("deleteProjectMember.php", {userid: user_id, projectid: project_id}, function(isSuccessfulSignup){
		if (isSuccessfulSignup == 1){
			alert("User " + user_id + " was deleted from Project " + project_id);
			window.location = "selectedgroup.php";
		} else {
			alert(isSuccessfulSignup);
		}
	});
}

function addProjectSummary(){
	var tag = $("#tag").val();
	var content = $("#content").val();
	$.post("addProjectSummarytoDb.php", {tag: tag, content: content}, function(isSuccessfulSignup){
		if (isSuccessfulSignup == 1){
			window.location = "selectedgroup.php";
			console.log(isSuccessfulSignup);
		} else {
			console.log(isSuccessfulSignup);
		}
	});
}


function sendEmailInvitation(){
	
	var inviteEmail = $("#invite-email").val();
	var invitefullname = $("#invite-fullname").val();
	var senderEmail = $("#session-email").val();
	var senderFirstname = $("#session-firstname").val();
	var senderlastname = $("#session-lastname").val();
	var senderid = $("#user-id").val();
	var projectName = $("#project-name").val();
	var projectId = $("#project-id").val();


	if (inviteEmail == "" || invitefullname == ""){
		alert("Email or fullname field cannot be empty");
	} else {
		$.post("sendInviteEmail.php", {inviteEmail: inviteEmail, senderEmail: senderEmail, invitefullname: invitefullname,
			senderlastname: senderlastname,	senderid: senderid, projectName: projectName, projectId: projectId}, function(isSuccessfulSignup){
				$("#invite-email").val("");
				$("#invite-fullname").val("");
				alert("Email sent successfull");
			
		});
	}
}


//userPasswordResetBtn.addEventListener("click", verifyUserPassword, false);
//updateUserPasswordBtn.addEventListener("click", updateUserPassword, false);
