<?php

include('../../dbcon.php');

	if (isset($_POST['id']))
		$user_id = $_POST['id'];
	if (isset($_POST['user']))
		$username = $_POST['user'];

			
			if($query 		= mysqli_query($con, "DELETE from users where  iduser='$user_id';"))
				echo "success";
			else
				echo "error";
			
		
?>