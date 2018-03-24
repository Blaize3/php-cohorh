<?php include('config.php'); ?>

<?php 
	function validate_input($data){
		$data = trim($data);
		$data = htmlspecialchars($data);
		return $data;
	}	


	if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['inviteemail']) && !empty($_POST['inviteprojectid'])){

		$project_id = $_POST['inviteprojectid'];

		//var_dump($_POST);

		$email = validate_input(filter_input(INPUT_POST, 'userEmail'));
		$password = md5(validate_input(filter_input(INPUT_POST, 'userPassword'))); 
		$lastname = validate_input(filter_input(INPUT_POST, 'userLastname'));
		$firstname = validate_input(filter_input(INPUT_POST, 'userFirstname'));
		$telephone = validate_input(filter_input(INPUT_POST, 'userTelephone'));
		$DoB = validate_input(filter_input(INPUT_POST, 'userDoB'));
		$image_url = "images/profile/default.png";
		$isfirstlogin = 1;
		$userid;
		$user_id;
		$entitytype_id = 2;

		$query = "INSERT INTO users (firstname, lastname,  password, email, telephone,  dateofbirth, image_url, isfirstlogin) VALUES ('$firstname', '$lastname', '$password', '$email', '$telephone', '$DoB', '$image_url', '$isfirstlogin')";

		//var_dump($query);
		if (!mysqli_query($con, $query)){
			echo "Error:" . mysqli_error($con);
			
		} else {
			$userid = mysqli_insert_id($con);
			$user_id = $userid;
			$_SESSION['user_id'] = $userid;
			$_SESSION['email'] = $email;
			$_SESSION['firstname'] = $firstname;
			$_SESSION['lastname'] = $lastname;
			$_SESSION['image_url'] = $image_url;
			$_SESSION['role_id'] = 3;
			//echo true;
		}

		$query3 = "INSERT INTO entity (entitytype_id, codenumber) VALUES ('$entitytype_id', '$userid')";

		if (!mysqli_query($con, $query3)){
			session_destroy();
			echo "Error:" . mysqli_error($con);
			
		} else {
			
			//echo true;
		}


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
	
	} else if ($_SERVER['REQUEST_METHOD'] == "POST" && empty($_POST['inviteemail'])){
		//var_dump($_POST);

		$email = validate_input(filter_input(INPUT_POST, 'userEmail'));
		$password = md5(validate_input(filter_input(INPUT_POST, 'userPassword'))); 
		$lastname = validate_input(filter_input(INPUT_POST, 'userLastname'));
		$firstname = validate_input(filter_input(INPUT_POST, 'userFirstname'));
		$telephone = validate_input(filter_input(INPUT_POST, 'userTelephone'));
		$DoB = validate_input(filter_input(INPUT_POST, 'userDoB'));
		$image_url = "images/profile/default.png";
		$isfirstlogin = 1;
		$userid;
		$entitytype_id = 2;

		$query = "INSERT INTO users (firstname, lastname,  password, email, telephone,  dateofbirth, image_url, isfirstlogin) VALUES ('$firstname', '$lastname', '$password', '$email', '$telephone', '$DoB', '$image_url', '$isfirstlogin')";

		//var_dump($query);
		if (!mysqli_query($con, $query)){
			session_destroy();
			echo "Error:" . mysqli_error($con);
			
		} else {
			$userid = mysqli_insert_id($con);
			$_SESSION['user_id'] = $userid;
			$_SESSION['email'] = $email;
			$_SESSION['firstname'] = $firstname;
			$_SESSION['lastname'] = $lastname;
			$_SESSION['image_url'] = $image_url;
			$_SESSION['role_id'] = 3;
			//echo true;
		}

		$query3 = "INSERT INTO entity (entitytype_id, codenumber) VALUES ('$entitytype_id', '$userid')";

		if (!mysqli_query($con, $query3)){
			session_destroy();
			echo "Error:" . mysqli_error($con);
			
		} else {
			
			echo true;

		}

	} else {
		header('location: signup.php');
	}


	mysqli_close($con);
?>