<?php
 session_start();
	// Connect to database
	$con=mysqli_connect("localhost","root"," ","kccd");

	// Check if id is set or not if true toggle,
	// else simply go back to the page
	if (isset($_POST['changeA'])){

		// Store the value from get to a
		// local variable "pupil_id"
		$pupil_id=$_POST['usercode'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `pupil` SET
			`status`=false WHERE Usercode='$pupil_id'";

		// Execute the query
	if(mysqli_query($con,$sql)){
        // Go back to registered-page.php
	header('location: registered-page.php');
	}else{
		echo "Error: " .$sql ."".mysqli_error($con);
	}	
	}

	
?>
