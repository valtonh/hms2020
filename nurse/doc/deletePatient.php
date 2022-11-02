<?php

include('../../dbcon.php');

	if (isset($_POST['id']))
		$pacienti_id = $_POST['id'];

			
			if($query 		= mysqli_query($con, "DELETE from spital.pacienti where  idpacienti='$pacienti_id';"))
				echo "success";
			else
				echo "error";
			
		
?>