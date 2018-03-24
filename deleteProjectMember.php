<?php
	require('config.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['userid'])){
		//var_dump($_POST);
		$project_id = $_POST['projectid'];
		$user_id = $_POST['userid'];


		$sql = "DELETE FROM projectmembers WHERE project_id = '$project_id' AND user_id = '$user_id'";

		$result = mysqli_query($con, $sql);

		if (!mysqli_query($con, $sql)){
		
			echo "Error:" . mysqli_error($con);
		
		} else {

			echo true;
		}

	}

	mysqli_close($con);

?>