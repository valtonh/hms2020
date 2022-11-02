<?php

include('../../dbcon.php');

	if (isset($_POST['id_termini']))
		$id_termini = $_POST['id_termini'];
	if (isset($_POST['id_pacienti']))
		$id_pacienti = $_POST['id_pacienti'];
	if (isset($_POST['idmjeku']))
		$idmjeku = $_POST['idmjeku'];
	if (isset($_POST['diagnoza']))
		$diagnoza = $_POST['diagnoza'];
	if (isset($_POST['pershkrim']))
		$pershkrim = $_POST['pershkrim'];
			
	if($query = mysqli_query($con, "INSERT INTO `spital`.`diagnoza`
(
`idmjeku`,
`idpacienti`,
`idtermini`,
`idllojdiagnoza`,
`pershkrim`)
VALUES
(
'$idmjeku',
'$id_pacienti',
'$id_termini',
'$diagnoza',
'$pershkrim');"))
		echo "success";
	else
		echo "error";
				
		
?>