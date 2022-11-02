<?php

include('../../dbcon.php');

	if (isset($_POST['id']))
		$id = $_POST['id'];
	if (isset($_POST['pershkrim']))
		$pershkrim = $_POST['pershkrim'];

	if($query = mysqli_query($con, "INSERT INTO `spital`.`docdiagnoza` (`iddiagnoze`, `pershkrim`) VALUES ('$id', '$pershkrim');"))
		echo "success";
	else
		echo "error";
				
		
?>