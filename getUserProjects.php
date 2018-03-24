<?php

  require('config.php');

	if (isset($_POST['userid'])){
		//var_dump($_POST);
		$user_id = $_POST['userid'];

		$query = "SELECT projects.project_id, projectdetails.projectname, projectdetails.image_url, projectdetails.description FROM projectmembers LEFT JOIN projectdetails ON projectmembers.project_id = projectdetails.project_id LEFT JOIN projects ON projectmembers.project_id = projects.project_id WHERE projectmembers.user_id = '$user_id'";

		if (!mysqli_query($con, $query)){
			
			echo "Error:" . mysqli_error($con);
			
		} else {

			$result = mysqli_query($con, $query);

			$dbData = array();

			while ($row = mysqli_fetch_assoc($result)) {
				$dbData[] = $row;
			}

			$arraylength = sizeof($dbData);

			if ($arraylength < 1){
				$projectListHTML = '<div style="width: 100%; text-align: center; color:#66666e;padding-top:30px; font-size: 150%;"> You do not belong to a project yet...</div>';
			} else {

				$projectListHTML = '<div id="Projects" class="Projects" style="width: 80%; margin-left: auto; margin-right: auto;"><ul id="project-list" class="project-list">';

				foreach ($dbData as $key => $value) {
					
				$projectListHTML .= '<li title="'. $value['project_id'] .'">
								<a title="'. $value['project_id'] .'" href="#">
									<table title="'. $value['project_id'] .'" style="width: 100%;">
										<tr title="'. $value['project_id'] .'">
											<td title="'. $value['project_id'] .'" style="width: 15%; text-align: center;"><img class="project-profile" src="'. $value['image_url'] .'"></td>
											<td title="'. $value['project_id'] .'" style="width: 70%">
												<span title="'. $value['project_id'] .'" class="project-name">
													'. $value['projectname'] .'
												</span>
												<br>
												<span title="'. $value['project_id'] .'" class="project-summary">
													'. $value['description'] .'
												</span>
											</td>
										</tr>
									</table>
								</a>
							</li>';
				}
				
				$projectListHTML .= '</ul></div>';

			}

			echo $projectListHTML;

		}
	}

	mysqli_close($con);
?>