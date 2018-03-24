<?php require('config.php'); ?>

<?php
	if (isset($_POST['submitimage']) && !($_FILES['upload']['error'] > 0)){

		//assign which folder to upload the files
		$folder = "images/profile/";
		// get the array atributes of the uploaded file
		$filename = $_FILES['upload']['name'];
		$filesize = $_FILES['upload']['size'];
		$filetype = $_FILES['upload']['type'];
		$tempfolder = $_FILES['upload']['tmp_name'];

		// get the file extension of the uploaded file...
		$ext = explode('.',$filename);
		$ext = strtolower(end($ext));
		// specify extensions allowed
		$extensions = array('jpeg', 'jpg', 'png');

		// check uplo
		if (in_array($ext, $extensions) === false) {

			$errors[] = "Image type with $ext is not allowed , please upload image in jpeg, jpg, or png file format";
		}
		// check the file size
		if ($filesize > 2097152) {

			$errors[] = "Image size must be exactly or less than 2MB";
		}	

		$time = (string)time();
		$time = strrev($time);

		// define file name format
		$filename = $time.time().".$ext";

		//echo $filename;
		// define the destination of the upload 
		$destination = $folder.$filename;

		if(empty($errors) == true) {

			// move the file to uploads folder
			move_uploaded_file($tempfolder, $destination);

			$user_id = $_SESSION['user_id'];

			//store new image url in SESSION
			$_SESSION['image_url'] = $destination;

			//echo $destination;

			// insert info into career table
			$query = "UPDATE users SET image_url = '$destination' WHERE user_id = '$user_id'";

			// test for error in connection to dB
				if(!mysqli_query($con, $query)) {

					$dberror = "error: " .mysqli_error($con);
					
					echo $dberror;

				}
			header('location: defaultuser.php');
			echo true;

		} else {

			var_dump($errors);
		
		}
	} else {
		echo "An Error has occured";
	}
?>