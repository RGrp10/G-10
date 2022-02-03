<?php

	// Connect to database
	$con=mysqli_connect("localhost","root"," ","kccd");

	// Check if id is set or not, if true,
	// toggle else simply go back to the page
	if (isset($_GET['Usercode'])){

		// Store the value from get to
		// a local variable "pupil_id"
		$pupil_id=$_GET['Usercode'];

		// SQL query that sets the status to
		// 0 to indicate deactivation.
		$sql="UPDATE `pupil` SET
			`status`=0 WHERE Usercode='$pupil_id'";

		// Execute the query
		mysqli_query($con,$sql);
	}

	// Go back to registered-page.php
	header('location: registered-page.php');
?>
