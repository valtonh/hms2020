<?php 
session_start();
// nese ska session i bjen nuk osht i loguar kthe ne login page
if(isset($_SESSION['user_id']))
	$user_id = $_SESSION['user_id'];
else{
	header('location:../index.php');
}


include('../dbcon.php');

	$query 		= mysqli_query($con, "SELECT role FROM users WHERE  iduser='$user_id';");
	$row		= mysqli_fetch_array($query);
	$num_row 	= mysqli_num_rows($query);

	if ($num_row > 0) {			
			$role = $row['role'];
			// kqyr nese ka qasje ne kete modul tjeter kush 
			if($role != 3){
				echo "hini IF";
				session_destroy();
				header('location:../index.php');
			}
		}
		


 ?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="../style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
*{
	margin: 0;
	padding: 0;
	font-family: Century Gothic;
}

body{
	background-image: url(../img/5.gif);
	height: 100vh;
	background-size: cover;
	background-position: center;
}

</style>

</head>
<body>
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="table.php">Regjistro pacient</a>
  <a href="termin.php">Pacientet e kontrolluar</a>
  <a href="stafi.php" >Stafi</a>
<div class= "topnavl">
  <a href="../logout.php">Log out</a>
</div>
</div>
<div class="box2">
<h2>Mire se erdhet </h2>
<p>Per cdo te re ne program dhe per ceshtjet administrative te rendesishme do ti shihni me poshte</p>


    <h2>Manuali i perdorimit</h2>
    <p>Pasi qe ju jeni kycur si moter medicinale, ne pjesen e siperme i keni menyt kryesore.</p><br>
	<p>Per te shtuar, ndryshuar apo fshire ndonje pacient ju lutem klikoni te pacientet.</p>
	<p>Nese deshironi te kontaktoni me administratoret ju lutem klikoni tek Contact</p>
  

    <h2>Kolona e njoftimeve te reja</h2>
    <p>Some text..</p>

<div>

</body>
</html>