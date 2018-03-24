<?php
	require('config.php');

	$query = "SELECT user_id, firstname, lastname FROM users";

	if (!mysqli_query($con, $query)){
			
			echo "Error:" . mysqli_error($con);
			
		} else {
			
			$result = mysqli_query($con, $query);

			//$row = mysqli_fetch_assoc($result);

			$options = "<option value=''>Select a User</option>";

			while($row = mysqli_fetch_assoc($result)){
				$options .= "<option value='". $row['user_id'] ."'>". $row['lastname'] . " " .$row['firstname']."</option>";
			}

			echo $options;
		}

		mysqli_close($con);
?>