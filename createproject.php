<?php require('config.php'); ?>


<?php

	if (isset($_POST['projectname']) && isset($_POST['userid'])){
		$projectname = $_POST['projectname'];
		$userid = $_POST['userid'];
		$membercount = 1;
		$image_url = 'images/profile/groupdefault.png';
		$roleid = 1;
		$projectid;
		$entitytype_id = 1;

		$query1 = "INSERT INTO projects (project_creator) VALUES ('$userid')";

		//var_dump($query);
		if (!mysqli_query($con, $query1)){
			session_destroy();
			echo "Error:" . mysqli_error($con);
			
		} else {
			
			$projectid = mysqli_insert_id($con);
			//echo 1;

		}

		$query2 = "INSERT INTO projectdetails (project_id, projectname, membercount, image_url) VALUES ('$projectid', '$projectname', '$membercount', '$image_url')";

		if (!mysqli_query($con, $query2)){
			session_destroy();
			echo "Error:" . mysqli_error($con);
			
		} else {
			
			//echo 2;	
		
		}

		$query3 = "INSERT INTO projectmembers (project_id, user_id, role_id) VALUES ('$projectid', '$userid', '$roleid')";

		if (!mysqli_query($con, $query3)){
			session_destroy();
			echo "Error:" . mysqli_error($con);
			
		} else {
			
			//echo 1;

	
		}


		$query3 = "INSERT INTO entity (entitytype_id, codenumber) VALUES ('$entitytype_id', '$projectid')";

		if (!mysqli_query($con, $query3)){
			session_destroy();
			echo "Error:" . mysqli_error($con);
			
		} else {

			$_SESSION['role_id'] = $roleid;
			echo 1;
			
		}


	}

	mysqli_close($con);

?>
