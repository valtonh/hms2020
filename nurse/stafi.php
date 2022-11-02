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
<link href="../fontawesome/css/all.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../datatable/css/jquery.dataTables.css">
 

<?php include "../import.html" ?>


<script type="text/javascript" charset="utf8" src="../datatable/js/jquery.dataTables.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript">

$( document ).ready(function() {
    $('#user_data').DataTable( {
  
} );
});



	
</script>
<style>
    body {background:url(../img/4.jpg);}
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
   .table-bordered {
		border: 1px solid 
		#ddd;
	}
	.table {
		width: 100%;
		max-width: 100%;
		margin-bottom: 20px;
		border-spacing: 0;
		border-collapse: collapse;
	}
	.table td {
		
		text-align:center;
		
	}
	
  </style>
</head>
<body>
<div class="topnav">
  <a  href="dashboard.php">Home</a>
   <a href="table.php">Regjistro pacient</a>
     <a href="termin.php">Pacientet e kontrolluar</a>
  <a href="#" class="active" >Stafi</a>
<div class= "topnavl">
  <a href="../logout.php">Log out</a>
</div>
</div>


<div class="box">
   <h1 align="center">List of all users with id, username , password and role. </h1>
   <br />
   <div class="table-responsive">
    <br />
    
    <br /><br />
    <table id="user_data" class="cell-border compact stripe">
     <thead>
      <tr>
       <th width="10%">Id</th>
       <th width="35%">Username</th>
       <th width="35%">Role</th>
      </tr>
     </thead>
	 <tbody >
		<?php

					if($query = mysqli_query($con, "SELECT iduser, username, `password`, r.description from users u inner join roles r on u.role=r.idroles where r.idroles <> 1;")){
						if(mysqli_num_rows($query) > 0){
							while($row = mysqli_fetch_array($query)){
								echo "<tr>";
								echo "<td>".$row['iduser']."</td>";
								echo "<td>".$row['username']."</td>";
								echo "<td>".$row['description']."</td>";
								echo "</tr>";
							}
						}else {
							// Theres no data in this table
						}
					}else{
						
					}
		
		?>	
	 </tbody>
    </table>
    
   </div>
  </div>
  
  


</body>




</html>