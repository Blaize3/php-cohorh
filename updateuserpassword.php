<?php require('config.php'); ?>

<?php
	function validateInput($data){
		$data = trim($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if (isset($_POST['newPassword']) && isset($_POST['userid'])){
		
		$password = md5(validateInput($_POST['newPassword']));
		$user_id = validateInput($_POST['userid']);
		$updatedAt = date("y-m-d H:i:s");

		$query = "UPDATE users SET password = '$password', updatedAt = '$updatedAt' WHERE user_id = '$user_id'";

		if (!mysqli_query($con, $query)){
			
			echo "Error:" . mysqli_error($con);
			
		} else {
			
			echo true;

		}

	}

?>