<?php
	require('config.php');

	if (isset($_POST['userid']) && isset($_POST['projectid'])){
		//var_dump($_POST);

		$user_id = $_POST['userid'];
		$project_id = $_POST['projectid'];

		$query = "SELECT projectmembers.user_id, users.email, users.image_url, users.lastname, users.firstname FROM projectmembers LEFT JOIN users ON projectmembers.user_id = users.user_id WHERE projectmembers.project_id = '$project_id' AND projectmembers.user_id <> '$user_id'";

		$result = mysqli_query($con, $query);

			$dbData = array();

			while ($row = mysqli_fetch_assoc($result)) {
				$dbData[] = $row;
			}

			$arraylength = sizeof($dbData);

			if ($arraylength < 1){
				$projectMembersListHTML = '<div style="width: 100%; text-align: center; color:#66666e;padding-top:30px; font-size: 150%;"> You do not belong to a project yet...</div>';
			} else {

				$projectMembersListHTML = '<div id="Network" class="Network" style="width: 80%; margin-left: auto; margin-right: auto;"><ul id="network-list" class="network-list">';

				foreach ($dbData as $key => $value) {
					
				$projectMembersListHTML .= '<li title="'. $value['user_id'] .'">
								<a title="'. $value['user_id'] .'" href="#" data-toggle="modal" data-target="#viewProjectMembers">
									<table title="'. $value['user_id'] .'" style="width: 100%;">
										<tr title="'. $value['user_id'] .'">
											<td title="'. $value['user_id'] .'" style="width: 15%; text-align: center;"><img class="project-profile" src="'. $value['image_url'] .'"></td>
											<td title="'. $value['user_id'] .'" style="width: 70%">
												<span title="'. $value['user_id'] .'" class="project-name">
													'. $value['lastname'] .' ' . $value['firstname'] .'
												</span>
												<br>
												<span title="'. $value['user_id'] .'" class="project-summary">
													'. $value['email'] .'
												</span>
											</td>
										</tr>
									</table>
								</a>
							</li>';
				}
				
				$projectMembersListHTML .= '</ul></div>';

			}

			echo $projectMembersListHTML;

	}

	mysqli_close($con);

?>