<?php
	require('config.php');
	
	if (isset($_POST['projectid'])){

		//print_r($_POST);
		//print_r($_SESSION);
		
		$project_id = $_POST['projectid'];

		$query = "SELECT projects.project_id, projectdetails.projectname, projectdetails.image_url, projectdetails.description FROM projects LEFT JOIN projectdetails ON projects.project_id = projectdetails.project_id WHERE projects.project_id = '$project_id'";

		if (!mysqli_query($con, $query)){
			
			echo "Error:" . mysqli_error($con);
			
		} else {

			$result = mysqli_query($con, $query);

			$row = mysqli_fetch_assoc($result);

			//print_r($row);

			$_SESSION['project_id'] = $row['project_id'];
			$_SESSION['projectname'] = $row['projectname'];
			$_SESSION['projectImage'] = $row['image_url'];
			$_SESSION['description'] = $row['description'];

			echo true;

		}


	}

	mysqli_close($con);
?>