<?php require('config.php'); ?>

<?php 	
	
	if (isset($_POST)){

		$email = filter_input(INPUT_POST, 'userEmail');
		$password = md5(filter_input(INPUT_POST, 'userPassword')); 

		$query = "SELECT user_id, firstname, lastname, email, image_url FROM users WHERE email = '$email' AND password = '$password'";

		//var_dump($query);
		
		if (!mysqli_query($con, $query)){
			
			echo "Error:" . mysqli_error($con);
			
		} else {
			
			$result = mysqli_query($con, $query);

			$row = mysqli_fetch_assoc($result);

			if (count($row) > 0){

				$user_id = $row['user_id'];

				$query1 = "SELECT role_id FROM projectmembers WHERE user_id = '$user_id'";
				$result1 = mysqli_query($con, $query1);
				$row1 = mysqli_fetch_assoc($result1);
				$role_id;

				if(count($row) > 0){
					$role_id = $row1['role_id'];
				} else {
					$role_id = 3;
				}

				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['firstname'] = $row['firstname'];
				$_SESSION['lastname'] = $row['lastname'];
				$_SESSION['image_url'] = $row['image_url'];
				$_SESSION['role_id'] = $role_id;

				echo true;
			} else {

				echo "Invalid email and password!";
			}
		}

	} else {
		header('location: signin.php');
	}

	mysqli_close($con);
?>