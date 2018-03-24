<?php
	require('config.php');

	if (isset($_POST['userid']) && isset($_POST['projectid'])){
		//var_dump($_POST);

		$project_id = $_POST['projectid'];
		$user_id = $_POST['userid'];

		//	Generate all thread
		$allThread = '<p title="All Thread" class="message-side-options"><table title="All Thread" class="message-side-options"><tr><td class="message-group-header first-td-size"><a title="All Thread" href="#">All Thread</a></td></tr></table></p>';

		//  Generate general channel
		$general = '<p class="message-side-options"><table class="message-side-options"><tr><td title="Broadcast" class="message-group-header first-td-size"><a title="Broadcast" href="#">Broadcast</a></td><td class="message-group-header second-td-size"><a href="#"><i title="Broadcast" class="fas fa-plus-circle"></i></a></td></tr><tr><td title="general"  class="message-group-sub"><i>#<a id="0" title="general" href="#">general</a></i></td></tr></table></p>';

		//

		$query = "SELECT projectmembers.user_id, users.email, users.image_url, users.lastname, users.firstname FROM projectmembers LEFT JOIN users ON projectmembers.user_id = users.user_id WHERE projectmembers.project_id = '$project_id' AND projectmembers.user_id <> '$user_id'";

		$result = mysqli_query($con, $query);

		$dbData = array();

		while ($row = mysqli_fetch_assoc($result)) {
			$dbData[] = $row;
		}
			$arraylength = sizeof($dbData);

		if ($arraylength < 1){
			$private = '<p class="message-side-options"><table class="message-side-options"><tr><td class="message-group-header first-td-size"><a title="Private" href="#">Private</a></td><td class="message-group-header second-td-size"><a href="#"><i title="Private" class="fas fa-plus-circle"></i></a></td></tr></table></p>';
		} else {

			$private = '<p class="message-side-options"><table class="message-side-options"><tr><td class="message-group-header first-td-size"><a title="Private" href="#">Private</a></td><td class="message-group-header second-td-size"><a href="#"><i title="Private" class="fas fa-plus-circle"></i></a></td></tr>';

			foreach ($dbData as $key => $value) {
					
				$private .= '<tr><td title="'.$value['lastname']." ".$value['firstname'].'" class="message-group-sub"><i>@<a id="'. $value['user_id'] .'" title="'.$value['lastname']." ".$value['firstname'].'" href="#">'.$value['lastname']." ".$value['firstname'].'</a></i></td></tr>';
			}
				
				$private .= '</table></p>';

		}

		echo ($allThread.$general.$private);
	}

	mysqli_close($con);
?>
