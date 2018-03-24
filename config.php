<?php
session_start();

	$con = mysqli_connect("localhost", "root", "", "cohort_db");

	// Check Connection
	if (mysqli_connect_errno()){

		echo "Fail to connect to MYSQL: " . mysqli_connect_error();
	
	}

?>