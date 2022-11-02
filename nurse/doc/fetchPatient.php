<?php

include('../../dbcon.php');

	if (isset($_POST['id'])){
		$pacient_id = $_POST['id'];
			
			$query 		= mysqli_query($con, "SELECT * FROM spital.pacienti  WHERE  idpacienti='$pacient_id';");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			$result;
			if ($num_row > 0) 
				{			
					$result= array ("idpacienti"=>$row['idpacienti'], "name"=>$row['name'], "surname"=>$row['surname'], "age"=>$row['age'], "number"=>$row['number']);
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