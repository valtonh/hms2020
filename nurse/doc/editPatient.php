<?php

include('../../dbcon.php');

	if (isset($_POST['id']))
		$pacienti_id = $_POST['id'];
	if (isset($_POST['name']))
		$name = $_POST['name'];
	if (isset($_POST['sur']))
		$surname = $_POST['sur'];
	if (isset($_POST['age']))
		$age = $_POST['age'];
	if (isset($_POST['nr']))
		$number = $_POST['nr'];
			
			if($query 		= mysqli_query($con, "Update `spital`.`pacienti` set `name`='$name', `surname`='$surname', `age`='$age', `number`='$number' where idpacienti='$pacienti_id';"))
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
