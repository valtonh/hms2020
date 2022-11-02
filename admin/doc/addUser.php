<?php

include('../../dbcon.php');

	if (isset($_POST['user']))
		$username = $_POST['user'];
	if (isset($_POST['pass']))
		$password = $_POST['pass'];
	if (isset($_POST['role']))
		$role = $_POST['role'];
			
	if($query = mysqli_query($con, "Insert into users (username, password, role) values ('$username', '$password', '$role');"))
		echo "success";
	else
		echo "error";
				
		
?>