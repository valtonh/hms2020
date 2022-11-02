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


	function editPatientModal(idpacienti){
		
		$.ajax({
			url:"doc/fetchPatient.php",
			method:'POST',
			data: {
                  id: idpacienti
                },
			success:function(data){
				if(data!='error'){
					var result = JSON.parse(data);
					$('#id_pacienti').val(result.idpacienti);
					$('#nameEdit').val(result.name);
					$('#surnameEdit').val(result.surname);
					$('#ageEdit').val(result.age);
					$('#numberEdit').val(result.number);
					$('#editModal').modal('show');
				}
			}
		   });
	}
	
	function deletePatientModal(idpacienti, patient){
		$('#id_pacienti').val(idpacienti);
		$('#patientDel').html(patient);
		$('#deleteModal').modal('show');
	}
	
	function editPatient(){
		
		var currentId = $('#id_pacienti').val();
		var name = $('#nameEdit').val();
		var surname = $('#surnameEdit').val();
		var age = $('#ageEdit').val();
		var number = $('#numberEdit').val();
		$.ajax({
			url:"doc/editPatient.php",
			method:'POST',
			data: {
                  id: currentId,
				  name: name,
				  sur: surname,
				  age : age,
				  nr :number
				  
                },
			success:function(data)
			{
				if(data == "success")
					location.reload();
				else
					alert('Data was not saved.');
			}
		   });
	}
	
	function deletePatient(){
		
		var currentId = $('#id_pacienti').val();
		$.ajax({
			url:"doc/deletePatient.php",
			method:'POST',
			data: {
                  id: currentId,
                },
			success:function(data)
			{
				if(data=="success")
					location.reload();
				else
					alert('Data was not DELETED.');
			}
		   });
	}
		function addPatient(){
		
		var name = $('#name').val();
		var surname = $('#surname').val();
		var age = $('#age').val();
		var number = $('#number').val();
		$.ajax({
			url:"doc/addPatient.php",
			method:'POST',
			data: {
				  name: name,
				  sur: surname,
				  age: age,
				  nr  :number
                },
			success:function(res)
			{
				if(res.trim()=="success")
					location.reload();
				else
					alert('Data was not added.');
			}
		   });
		}
		
		function openAddModal(){
			$("#addPatient").modal('show');
		}
		
		function diagnozaPatientModal(idtermini, patient, idpacienti){
		$('#id_termini').val(idtermini);
		$('#id_pacienti').val(idpacienti);
		$('#diagnozaPatient').html(patient);
		$('#diagnozaModal').modal('show');
	}
	
	function addDiagnoza(){
		
		var id_termini = $('#id_termini').val();
		var id_pacienti = $('#id_pacienti').val();
		var idmjeku = <?php echo $user_id;?>;
		
		var diagnoza = $('#diagnoza').val();
		var pershkrim = $('#pershkrim').val();
		$.ajax({
			url:"doc/addDiagnoza.php",
			method:'POST',
			data: {
				  id_termini: id_termini,
				  id_pacienti: id_pacienti,
				  idmjeku: idmjeku,
				  diagnoza: diagnoza,
				  pershkrim: pershkrim
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
   <a class="active" href="terminet.php">Terminet</a>
   <a href="terminet-kryera.php">Terminet e kryera</a>
     <a href="listadiagnozave.php">Lista e diagnozave</a>
<div class= "topnavl">
  <a href="../logout.php">Log out</a>
   <a href="about.php">About</a>
  <a href="contact.php">Contact</a>  
</div>
</div>


<div class="box">
   <h1 align="center">List of all pacients with id, name , surname, age and number. </h1>
   <br />
   <div class="table-responsive">
    <br />
    <div align="right">
    </div>
    <br /><br />
    <table id="patient_data" class="cell-border compact stripe">
     <thead>
      <tr>
       <th width="10%">Id</th>
       <th width="35%">Name</th>
       <th width="35%">Surname</th>
       <th width="35%">Age</th>
	   <th width="35%">Number</th>
       <th width="35%">Data e terminit</th>
	   <th width="35%">Pershkrim</th>
	   
       <th width="10%">Diagnoza</th>
      </tr>
     </thead>
	 <tbody >
		<?php

					if($query = mysqli_query($con, "select idterminet, p.name, p.surname, p.age, p.number, t.data_termin, t.pershkrim, t.idpacienti  from terminet t inner join pacienti p on t.idpacienti=p.idpacienti
where idterminet not in (Select idtermini from diagnoza) and idmjeku = '$user_id';")){
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
								echo "<td ><i onclick='diagnozaPatientModal(".$row['idterminet'].",\"".$row['name']." ".$row['surname']."\", ".$row['idpacienti'].")' class='fas fa-calendar-check'></i></td>";
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
  
  
	<input type="hidden" id="id_pacienti"/>
	
	<input type="hidden" id="id_termini"/>
  
  
  <div id="diagnozaModal" class="modal">
	<p>Emri dhe mbiemri i pacientit: '<span id="diagnozaPatient"></span>'</p>
		
		<label for="diagnoza">Diagnoza:</label>
		<select id="diagnoza">
			<?php

					if($query = mysqli_query($con, "SELECT * FROM spital.docdiagnoza;")){
						if(mysqli_num_rows($query) > 0){
							while($row = mysqli_fetch_array($query)){
								echo "<option value='".$row['iddiagnoze']."'>".$row['iddiagnoze']." - ".$row['pershkrim']."</td>";
							}
						}
					}
		
		?>
		</select>
		<br>
		<label for="pershkrim">Pershkrim:</label>
		<textarea id="pershkrim"></textarea>
		<br>
		<br>
		<button type="button" id="save_termin" onclick="addDiagnoza()">Save</button>
	<a href="#" rel="modal:close">Close</a>
  </div>
  

</body>




</html>