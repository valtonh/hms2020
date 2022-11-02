<?php

include('../../dbcon.php');

	if (isset($_POST['id'])){
		$user_id = $_POST['id'];
			
			$query 		= mysqli_query($con, "SELECT iduser,username, password, role FROM users WHERE  iduser='$user_id';");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			$result;
			if ($num_row > 0) 
				{			
					$result= array ("iduser"=>$row['iduser'], "username"=>$row['username'], "password"=>$row['password']);
					echo json_encode($result);
				}
			else
				{
					echo 'error';
				}
		}
		else
			echo 'error';
?>