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
    $('#patient_data').DataTable( {
  
} );
});


		function addTermin(){
		
		var name = $('#name').val();
		var surname = $('#surname').val();
		var age = $('#age').val();
		var number = $('#number').val();
		$.ajax({
			url:"doc/addTermin.php",
			method:'POST',
			data: {
				  name: name,
				  sur: surname,
				  age: age,
				  nr  :number,
                },
			success:function(data)
			{
				if(data.trim()=="success")
					location.reload();
				else
					alert('Data was not added.');
			}
		   });
		}
		
	
</script>
<style>

	
  </style>
</head>
<body>
<div class="topnav">
  <a  href="dashboard.php">Home</a>
   <a href="table.php">Regjistro pacient</a>
     <a class="active" href="#">Pacientet e kontrolluar</a>
  <a href="stafi.php" >Stafi</a>
<div class= "topnavl">
  <a href="../logout.php">Log out</a>
</div>
</div>

<div class="box">
	
	 <table id="patient_data" class="cell-border compact stripe">
     <thead>
      <tr>
       <th width="10%">Id</th>
       <th width="35%">Name</th>
       <th width="35%">Surname</th>
       <th width="35%">Age</th>
	   <th width="35%">Number</th>
       <th width="35%">Data e terminit</th>
	   <th width="35%">Pershkrimi terminit</th>
	   <th width="35%">Diagnoza</th>
	   <th width="35%">Pershkrimi doktorit</th>
	   
       
      </tr>
     </thead>
	 <tbody >
		<?php

					if($query = mysqli_query($con, "select idterminet, p.name, p.surname, p.age, p.number, t.data_termin, t.pershkrim, d.pershkrim as pershkrim_doc,concat(dd.iddiagnoze,' - ', dd.pershkrim) as diagnoza  from terminet t inner join pacienti p on t.idpacienti=p.idpacienti
inner join diagnoza d on t.idterminet=d.idtermini inner join docdiagnoza dd on d.idllojdiagnoza=dd.iddiagnoze where idterminet in (Select idtermini from diagnoza);")){
						if(mysqli_num_rows($query) > 0){
							while($row = mysqli_fetch_array($query)){
								echo "<tr>";
								echo "<td>".$row['idterminet']."</td>";
								echo "<td>".$row['name']."</td>";
								echo "<td>".$row['surname']."</td>";
								echo "<td>".$row['age']."</td>";
								echo "<td>".$row['number']."</td>";
								echo "<td>".$row['data_termin']."</td>";
								echo "<td>".$row['pershkrim']."</td>";
								echo "<td>".$row['diagnoza']."</td>";
								echo "<td>".$row['pershkrim_doc']."</td>";
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

</body>




</html>