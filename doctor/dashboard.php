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
			if($role != 2){
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

</head>
<body>
<div class="topnav">
  <a  class="active" href="dashboard.php">Home</a>
   <a href="terminet.php">Terminet</a>
   <a href="terminet-kryera.php">Terminet e kryera</a>
     <a  href="listadiagnozave.php">Lista e diagnozave</a>
<div class= "topnavl">
  <a href="../logout.php">Log out</a>
   <a href="about.php">About</a>
  <a href="contact.php">Contact</a>   
</div>
</div>



<div class="box2">
<h2>Mire se erdhet </h2>
<p>Per cdo te re ne program dhe per ceshtjet administrative te rendesishme do ti shihni me poshte</p>


    <h2>Manuali i perdorimit</h2>
    <p>Pasi qe ju jeni kycur si mjek/e, ne pjesen e siperme i keni menyt kryesore.</p><br>
	<p>Per te kontaktuar me adminin e faqes per ndonje problem qe keni ju lutem shtypeni butonin Contact ne menyn kryesore.</p>
	<p>Per te mesuar me shume rreth ketij programi ju lutem shtypni About</p>
  

    <h2>Kolona e njoftimeve te reja</h2>
    <p>Some text..</p>
</div>


</body>
</html>