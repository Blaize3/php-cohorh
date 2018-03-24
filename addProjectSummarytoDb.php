<?php
	require('config.php');

	if (isset($_POST['tag']) && isset($_POST['content'])){
		//var_dump($_POST);

		$tag = $_POST['tag'];
		$content = $_POST['content'];
		$project_id = $_SESSION['project_id'];

		if (empty($content)){

		} else {
			$sql = "INSERT INTO projectsummarytable (tag, project_id, body) VALUES ('$tag', $project_id, '$content')";

			if (!mysqli_query($con, $sql)){
				
				echo "Error:" . mysqli_error($con);
				
			} else {
				echo true;
			}
					
		}
	}

	mysqli_close($con);
?>