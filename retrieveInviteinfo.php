<?php
	require('config.php');


	if (isset($_POST['invitationId'])){

		//var_dump($_POST);
		$inviteid = $_POST['invitationId'];

		$sql = "SELECT * FROM invitedgroupmember WHERE invitenumber = '$inviteid'";

		if (!mysqli_query($con, $sql)){
			echo "Error:" . mysqli_error($con);
		} else {
			$result = mysqli_query($con, $sql);

			$row = mysqli_fetch_assoc($result);

			$_SESSION['invitenumber'] = $row['invitenumber'];
			$_SESSION['project_id'] = $row['project_id'];

			echo json_encode($row);
		}
	}
	mysqli_close($con);
?>