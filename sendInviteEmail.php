<?php
	require('config.php');

	if (isset($_POST['inviteEmail'])){
		//print_r($_POST);
		//var_dump($_SESSION);


		$inviteEmail = $_POST['inviteEmail'];
		$invitefullname = $_POST['invitefullname'];
		$senderEmail = $_SESSION['email'];
		$senderFirstname = $_SESSION['firstname'];
		$senderlastname = $_SESSION['lastname'];
		$projectName = $_POST['projectName'];
		$projectId = intval($_POST['projectId']); 



		$subject = "Invitation to join a project";
		

		$message = "Dear " . $invitefullname . ", <br /> You have been invited to participate in " . $projectName . " by " . $senderlastname . " " . $senderFirstname . ". Please, click <strong><a style=color:#f00;   href=signup.php?email=".$inviteEmail."&projectid=".$projectId.">Here</a></strong> to proceed to sign up";



		$sql = "INSERT INTO invitedgroupmember (project_id, email_body, invitesemail, senderemail, subject) VALUES ('$projectId', '$message', '$inviteEmail', '$senderEmail', '$subject')";

		var_dump($sql);
		if (!mysqli_query($con, $sql)){
			echo "Error:" . mysqli_error($con);
		} else {
			//echo true;
		}


		mysqli_close($con);

	}

?>