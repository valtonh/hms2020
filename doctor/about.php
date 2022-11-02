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
<link href="../fontawesome/css/all.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../datatable/css/jquery.dataTables.css">
 

<?php include "../import.html" ?>


<script type="text/javascript" charset="utf8" src="../datatable/js/jquery.dataTables.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript">

$( document ).ready(function() {
    $('#patient_data').DataTable( {
  
} );
});


</script>
<style>

	
  </style>
</head>
<body>
<div class="topnav">
  <a  href="dashboard.php">Home</a>
   <a href="terminet.php">Terminet</a>
   <a href="terminet-kryera.php">Terminet e kryera</a>
     <a href="listadiagnozave.php">Lista e diagnozave</a>
<div class= "topnavl">
  <a href="../logout.php">Log out</a>
    <a  class="active" href="about.php">About</a>
  <a  href="contact.php">Contact</a>  
</div>
</div>




<div class="box">
   <h1 align="center">About page for using the application </h1> <br/>
		<p> You have loged with succes so next things what you can learn here are how to use the app.
			
		
		</p>
  </div>
  


</body>




</html>