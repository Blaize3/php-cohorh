<?php
	
	require('config.php');
	require('privileges.php');


	foreach($project_summary_privilege as $key => $value){

		if ($value[2] ==1){
			if ($value[2] == 1){
				echo $value[1];
			}

		}

	}

	//mysqli_close($con);
?>