<?php
    require('config.php');

    if (isset($_POST['user_id'])){

    	$user_id = $_POST['user_id'];

    	$sql = "SELECT firstname, lastname, email, telephone, image_url FROM users WHERE user_id = '$user_id'";

    	//echo json_encode($_POST);

    	if (!mysqli_query($con, $sql)){
			
			echo "Error:" . mysqli_error($con);
			
		} else {
			
			$result = mysqli_query($con, $sql);

			$row = mysqli_fetch_assoc($result);

			echo json_encode($row);
		}

    }
    mysqli_close($con);
?>