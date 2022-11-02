<?php

include('../../dbcon.php');

	if (isset($_POST['id']))
		$user_id = $_POST['id'];
	if (isset($_POST['user']))
		$username = $_POST['user'];
	if (isset($_POST['pass']))
		$password = $_POST['pass'];
			
			if($query 		= mysqli_query($con, "Update users set `username`='$username', `password`='$password' where iduser='$user_id';"))
				echo "success";
			else
				echo "error";
			
			/*if ($num_row > 0) 
				{			
					$result= array ("iduser"=>$row['iduser'], "username"=>$row['username'], "password"=>$row['password']);
					echo json_encode($result);
				}
			else
				{
					echo 'error';
				}*/
		
?>