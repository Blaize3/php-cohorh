<?php
	require('config.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['userid'])){
		//var_dump($_POST);
		$project_id = $_POST['projectid'];
		$user_id = $_POST['userid'];

		$sqlroleid = "SELECT role_id FROM roles WHERE rolename = 'ordinary user'";

		$resultroleid = mysqli_query($con, $sqlroleid);

		$rowroleid = mysqli_fetch_assoc($resultroleid);

		$role_id = $rowroleid['role_id'];


		$sqlCheckforduplication = "SELECT * FROM projectmembers WHERE project_id = '$project_id' AND user_id = '$user_id'";

		$resultduplicate = mysqli_query($con, $sqlCheckforduplication);

		$rowduplicate = mysqli_fetch_assoc($resultduplicate);

		if (count($rowduplicate) > 0){
			echo "User already belongs to this project!";
			exit();
		} else {
			$sql = "INSERT INTO projectmembers (project_id, user_id, role_id) VALUES ('$project_id', $user_id, $role_id)";

			if (!mysqli_query($con, $sql)){
			
				echo "Error:" . mysqli_error($con);
			
			} else {

				echo true;
			}
		
		}

	}

	mysqli_close($con);

?>