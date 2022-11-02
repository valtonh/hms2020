<?php

include('../../dbcon.php');

	if (isset($_POST['name']))
		$name = $_POST['name'];
	if (isset($_POST['sur']))
		$surname = $_POST['sur'];
	if (isset($_POST['age']))
		$age = $_POST['age'];
	if (isset($_POST['nr']))
		$number = $_POST['nr'];
	
	if($query = mysqli_query($con, "INSERT INTO `spital`.`pacienti` (`name`, `surname`, `age`, `number`) VALUES ('$name','$surname', '$age', '$number');")){
		echo 'success';
	}
	else{
		echo "error";
	}
?>

