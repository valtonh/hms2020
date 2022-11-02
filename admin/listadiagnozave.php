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
			if($role != 1){
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
function addUser(){
		
		var id = $('#id').val();
		var pershkrim = $('#pershkrim').val();
		$.ajax({
			url:"doc/addDiagnoz.php",
			method:'POST',
			data: {
				  id: id,
				  pershkrim: pershkrim
                },
			success:function(data)
			{
				if(data=="success")
					location.reload();
				else
					alert('Data was not saved.')
			}
		   });
		}
function openAddModal(){
			$("#addModal").modal('show');
		}

</script>
<style>

	
  </style>
</head>
<body>
<div class="topnav">
  <a  href="faqja1.php">Home</a>
<div class= "topnavl">
  <a href="../logout.php">Log out</a>
    <a href="about.php">About</a>
	<a href="contact.php">Contact</a>
	<a href="listadiagnozave.php" class="active" >Lista diagnozave</a>  
	 
  
</div>
</div>


<div class="box">
   <h1 align="center">Lista e te gjithe diagnozave me ID dhe pershkrim. </h1>
   <br />
   <div class="table-responsive">
    <br />
		<div align="right">
		<span onclick='openAddModal()'>
			<i class="fas fa-plus"></i>
		</span>
    </div>
    <br /><br />
    <table id="patient_data" class="cell-border compact stripe">
     <thead>
      <tr>
       <th width="20%">Id</th>
	   <th width="80%">Pershkrim</th>

      </tr>
     </thead>
	 <tbody >
		<?php

					if($query = mysqli_query($con, "SELECT * FROM spital.docdiagnoza;")){
						if(mysqli_num_rows($query) > 0){
							while($row = mysqli_fetch_array($query)){
								echo "<tr>";
								echo "<td>".$row['iddiagnoze']."</td>";
								echo "<td>".$row['pershkrim']."</td>";
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
  
  <div id="addModal" class="modal">
		<p>Fill the infos for diagnoz</p>
		<label for="id">Id:</label>
		<input type="text" id="id"/>
		<br>
		<label for="pershkrim">Pershkrimi:</label>
		<input type="text" id="pershkrim"/>
		<br>
		
	    <button type="button" id="add_btn" onclick="addUser()">Save</button>
  </div>


</body>




</html>