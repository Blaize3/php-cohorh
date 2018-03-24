<?php
	//require('config.php');

	@$userrole_id = 0;
	@$user_id = $_SESSION['user_id'];
	@$project_id = $_SESSION['project_id'];

	$userrole_idSQL = "SELECT role_id FROM projectmembers WHERE user_id = '$user_id' AND project_id = '$project_id'";

	if (!mysqli_query($con, $userrole_idSQL)){
			
			echo "Error:" . mysqli_error($con);
			
		} else {
			
			$roleresult = mysqli_query($con, $userrole_idSQL);

			$rolerow = mysqli_fetch_assoc($roleresult);

			$userrole_id = $rolerow['role_id'];
		}

	if ($userrole_id == 1){
			//Project owner roles privileges
			$user_privilege = array(
				array('Add member to project',
				 	  '<a id="change-pix" href="#" data-toggle="modal" data-target="#addProjectMember"><i class="fas fa-user-plus"></i>&nbsp;Add project member</a>',
				  	  1),

				array('Add member to project',
				 	  '<a id="change-pix" href="#" data-toggle="modal" data-target="#inviteProjectMember"><i class="fas fa-user-plus"></i>&nbsp;Invite member</a>',
				  	  1),

				array('Remove a User from a project',
				 	  '<a id="change-password" href="#" data-toggle="modal" data-target="#removeProjectMember"><i class="fas fa-user-times"></i>&nbsp;Remove a User from a project</a>', 
				 	  1),

				array('Projects Setting', 
					  '<a href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Projects Setting</a>', 
					  1)
			);
		} else if ($userrole_id == 2){
			//Administrator roles privileges
			$user_privilege = array(
				array('Add member to project',
				 	  '<a id="change-pix" href="#" data-toggle="modal" data-target="#addProjectMember"><i class="fas fa-user-plus"></i>&nbsp;Invite member</a>',
				  	  0),

				array('Add member to project',
				 	  '<a id="change-pix" href="#" data-toggle="modal" data-target="#inviteProjectMember"><i class="fas fa-user-plus"></i>&nbsp;Invite member</a>',
				  	  0),

				array('Remove a User from a project',
				 	  '<a id="change-password" href="#" data-toggle="modal" data-target="#removeProjectMember"><i class="fas fa-user-times"></i>&nbsp;Remove a User from a project</a>', 
				 	  0),

				array('Projects Setting', 
					  '<a href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Projects Setting</a>', 
					  0)
			);
		} else if ($userrole_id == 3){
			//Ordinary User roles privileges
			$user_privilege = array(
				array('Add member to project',
				 	  '<a id="change-pix" href="#" data-toggle="modal" data-target="#addProjectMember"><i class="fas fa-user-plus"></i>&nbsp;Invite member</a>',
				  	  0),

				array('Remove a User from a project',
				 	  '<a id="change-password" href="#" data-toggle="modal" data-target="#removeProjectMember"><i class="fas fa-user-times"></i>&nbsp;Remove a User from a project</a>', 
				 	  0),

				array('Projects Setting', 
					  '<a href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Projects Setting</a>', 
					  0)
			);
		}



		$projectSummaryPage = ""; 

		$pspSql = "SELECT * FROM projectsummarytable WHERE project_id = '$project_id'";

		if (!mysqli_query($con, $pspSql)){
				
			echo "Error:" . mysqli_error($con);
			
		} else {
			
			$pspResult = mysqli_query($con, $pspSql);

			while($rows = mysqli_fetch_assoc($pspResult)){
				if ($rows['tag'] == 'p'){
					$projectSummaryPage .= "<p style='width: 100%;'>" . $rows['body'] . "</p>";
				} else {
					$projectSummaryPage .= "<h5 style='width: 100%;'>" . $rows['body'] . "</h5>";
				}
			}
		}

		if ($userrole_id == 1){
			//Project owner roles privileges
			$project_summary_privilege = array(
				array('View project Summary',
				 	  '<div class="container-fluid project-summary-content-area" id="project-summary-body">
				 	  '.$projectSummaryPage.'
				 	  </div>',
				  	  1),
				array('Modify project summary',
				 	  '<div class="container-fluid" id="input-area">
				 	  	<div class="row">
				 	  	<div class="col-md-2">
				 	  	<div class="form-group">
				 	  		<select name="tag" id="tag" class="form-control">
				 	  			<option value="h3">header</option>
				 	  			<option value="p">body</option>
				 	  		</select>
				 	  	</div>
				 	  	</div>
				 	  	<div class="col-md-7">
				 	  	<div class="form-group">
				 	  		<textarea name="content" id="content" class="form-control"></textarea>
				 	  	</div>
				 	  	</div>
				 	  	<div class="col-md-3">
				 	  	<div class="form-group">
				 	  		<button onclick="addProjectSummary()" name="submitAddSummary" id="submitAddSummary" class="btn btn-success">Update Project Summary</button>&nbsp;&nbsp;
				 	  	</div>
				 	  	</div>
				 	  	</div>	
				 	  </div>',
				  	  1)	
			);
		} else if ($userrole_id > 1){
			//Administrator roles privileges
			$project_summary_privilege = array(
				array('View project Summary',
				 	  '<div id="project-summary-body">
				 	  '.$projectSummaryPage.'
				 	  </div>',
				  	  1),
				array('Modify project summary',
				 	  '<div class="container-fluid project-summary-content-area" id="input-area">
				 	  	<div class="row">
				 	  	<div class="col-md-3">
				 	  		<select>
				 	  			<option value="h3">h3</option>
				 	  			<option value="p">p</option>
				 	  		</select>
				 	  	</div>
				 	  	<div class="col-md-6">
				 	  		<textarea>
				 	  		</textarea>
				 	  	</div>
				 	  	<div class="col-md-3">
				 	  		<button>update</button>
				 	  	</div>
				 	  	</div>	
				 	  </div>',
				  	  0)
			);
		}

		mysqli_close($con);
?>