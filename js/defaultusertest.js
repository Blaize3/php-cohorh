var projectList = `<div style="width: 100%; text-align: center; color:#66666e; padding-top:30px; font-size: 150%;"> 
						You do not belong to a project yet...
				   </div>`;

var messageSection = `<div style="width: 100%; text-align: center; color:#66666e; padding-top:30px; font-size: 150%;"> 
						No Messages yet...
				      </div>`;

var networkList = `<div style="width: 100%; text-align: center; color:#66666e; padding-top:30px; font-size: 150%;"> 
						No Contacts yet...

				    </div>`;

var chatMessageHolderUI = `<div id="message-holder-UI-container" class="Projects" style="width: 100%; 
							margin-left: auto; margin-right: auto; word-wrap: break-word;"></div>`;

var chatSession =  `<div class="input-group"><div style="border:solid 2px #888; color: #888;" id="err-border-pass" class="input-group-addon">
					<i class="fas fa-plus icons"></i></div><input style="border:solid 2px #888; border-left: none;" type="text" class="form-control" name="message" id="message" aria-describedby="" placeholder="Message #general">
					</div>`;

var changeProfileImage = `<div id="upload-profile-image">
<form class="image-form" action="uploadimage.php" method="POST" enctype="multipart/form-data" >
<div class="form-group" style="text-align: center;"><h5 style="text-align: center; width: 100%;">
Change Profile Image
</h5></div><div class="form-group" style="text-align: center;">
<img src="" id="image-update" style="width: 200px; height: 200px; border-radius: 100%; border: solid 2px #000;">
</div><div class="form-group" style="text-align: center;">
<input type="file" class="btn-all-btn btn-blue" name="upload" id="upload" class="form-control">
</div><div class="form-group" style="text-align: center;">
<input class="btn-all-btn btn-blue" type="submit" name="submitimage" id="submitimage" value="Update Image">
</div></form></div>`;

var createProject = `<div id="create-project" style="width: 100%;"><div class="row"><div class="col-md-10 offset-md-1">
<div class="row"><h3 class="full-width"><p class="row-height-xs"></p>Create Project</h3>
<form class="homepage-login form" action="createproject.php" method="POST"><div class="row">
<div class="form-group"><small style="width: 100%; text-align: center;" id="input-error-msg" class="form-text text-danger"></small>
</div></div><div class="row"><div class="col-md-8 offset-md-2"><div class="row"><div class="form-group">
<div class="input-group"><div id="err-border-pass" class="input-group-addon">
<i class="fab fa-product-hunt fa-2x"></i></div>
<input type="text" class="form-control" onclick="clearCreateProjectText()" name="project-name" id="project-name" aria-describedby="" placeholder="Enter Project Name">
<small class="full-width" id="project-name-status-msg" class="form-text text-danger"></small></div></div></div></div></div>
<div class="row"><div class="form-group" style="width: 100%; text-align: center;"><div class="form-check"><input onclick="clearCreateProjectCheck()" id="create-project-policy" name="create-project-policy" type="checkbox" value="" id="defaultCheck1" />
<label  for="defaultCheck1"><span id="forgot-password-all-text" class="forgot-password-all-text">I agree to <a href="#"> project creation policy</a>
</span></label></div>	</div><div class="form-group" style="width: 100%; text-align: center;">
<button type="button" class="btn-all-btn btn-blue" id="create-project-btn" onclick="createNewProoject(event)" name="create-project-btn"><i class="icons fas fa-plus"></i>&nbsp;&nbsp;Create Project</button>
</div></div></form><p id="test-data" style="width: 100%;"></p></div></div></div></div>`;


/* cut out code
	<button type="button" id="create-project-btn" name="create-project-btn" class="btn-all-btn btn-blue"><i class="icons fas fa-plus"></i>&nbsp;&nbsp;Create Project</button>
*/

//last update
/*var createProject = `<div id="create-project" style="width: 100%;"><div class="row"><div class="col-md-10 offset-md-1">
<div class="row"><h3 class="full-width"><p class="row-height-xs"></p>Create Project</h3>
<form class="homepage-login form" action="" method="POST"><div class="row">
<div class="form-group"><small style="width: 100%; text-align: center;" id="input-error-msg" class="form-text text-danger"></small>
</div></div><div class="row"><div class="col-md-8 offset-md-2"><div class="row"><div class="form-group">
<div class="input-group"><div id="err-border-pass" class="input-group-addon">
<i class="fab fa-product-hunt fa-2x"></i></div>
<input type="text" class="form-control" name="project-name" id="project-name" aria-describedby="" placeholder="Enter Project Name">
<small class="full-width" id="project-name-status-msg" class="form-text text-danger"></small></div></div></div></div></div>
<div class="row"><div class="form-group" style="width: 100%; text-align: center;"><div class="form-check"><input id="create-project-policy" name="create-project-policy" type="checkbox" value="" id="defaultCheck1" />
<label  for="defaultCheck1"><span id="forgot-password-all-text" class="forgot-password-all-text">I agree to <a href="#"> project creation policy</a>
</span></label></div>	</div><div class="form-group" style="width: 100%; text-align: center;">
<button type="button" type="botton" onclick="createNewProoject()" id="create-project-btn" name="create-project-btn" class="btn-all-btn btn-blue"><i class="icons fas fa-plus"></i>&nbsp;&nbsp;Create Project</button>
</div></div></form><p id="test-data" style="width: 100%;"></p></div></div></div></div>`;*/

var verifyPassword = `<div id="change-password"><div class="row"><div class="col-md-10 offset-md-1">
<div class="row"><h3 class="full-width"><p class="row-height-xs"></p>Change Password</h3>
<form class="homepage-login form" action="" method="POST"><div class="row"><div class="form-group">
<small style="width: 100%; text-align: center;" id="input-error-msg" class="form-text text-danger"></small>
</div></div><div class="row"><div class="col-md-8 offset-md-2"><div class="row"><div class="form-group">
<div class="input-group"><div id="err-border-pass" class="input-group-addon"><i class="icons fas fa-lock fa-2x"></i>
</div><input type="password" class="form-control" onclick="clearErrors()" name="user-passport" id="user-passport" aria-describedby="" placeholder="Enter Password">
<small class="full-width" id="con-pass-status-msg" class="form-text text-danger"></small></div></div></div></div>
</div><div class="row"><div class="form-group" style="width: 100%; text-align: center;">
<button type="button" id="password-btn" onclick="verifyUserPassword()" name="password-btn" class="btn-all-btn btn-blue"><i class="icons fas fa-key"></i>&nbsp;&nbsp;Verify Password</button>
</div></div></form><p id="test-data" style="width: 100%;"></p></div></div></div></div>`;

var newPassword = `<div id="change-password"><div class="row"><div class="col-md-10 offset-md-1"><div class="row">
<h3 class="full-width"><p class="row-height-xs"></p>Change Password</h3>
<form class="homepage-login form" action="" method="POST"><div class="row">
<div class="form-group">
<small style="width: 100%; text-align: center;" id="input-error-msg" class="form-text text-danger"></small>
</div></div><div class="row"><div class="col-md-8 offset-md-2"><div class="row"><div class="form-group">
<div class="input-group"><div id="err-border-pass" class="input-group-addon"><i class="icons fas fa-lock fa-2x"></i>
</div><input type="password" class="form-control" onclick="clearNewPasswordChangeField()" name="new-passport" id="new-passport" aria-describedby="" placeholder="Enter New Password">
<small class="full-width" id="password-status-msg" class="form-text text-danger"></small></div></div></div></div>
</div><div class="row"><div class="col-md-8 offset-md-2"><div class="row"><div class="form-group"><div class="input-group">
<div id="err-border-pass" class="input-group-addon"><i class="icons fas fa-lock fa-2x"></i></div>
<input type="password" class="form-control" onclick="clearConfirmPasswordChangeField()" name="confirm-passport" id="confirm-passport" aria-describedby="" placeholder="Enter Password Confirmation">
<small class="full-width" id="con-pass-status-msg" class="form-text text-danger"></small></div></div></div>
</div></div><div class="row"><div class="form-group" style="width: 100%; text-align: center;">
<button type="button" id="update-password-btn" onclick="updateUserPassword()" name="update-password-btn" class="btn-all-btn btn-blue"><i class="icons fas fa-key"></i>&nbsp;&nbsp;Update Password</button>
</div></div></form><p id="test-data" style="width: 100%;"></p></div></div></div></div>`;