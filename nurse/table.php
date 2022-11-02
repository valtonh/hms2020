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
		
		function terminPatientModal(idpacienti, patient){
		$('#id_pacienti').val(idpacienti);
		$('#terminPatient').html(patient);
		$('#terminModal').modal('show');
	}
	
	function addTermin(){
		
		var id = $('#id_pacienti').val();
		var idnurse = <?php echo $user_id;?>;
		var dt_termin = $('#dt_termin').val();
		var pershkrim = $('#pershkrim').val();
		var mjeku = $('#mjeku').val();
		$.ajax({
			url:"doc/addTermin.php",
			method:'POST',
			data: {
				  id: id,
				  idnurse: idnurse,
				  dt_termin: dt_termin,
				  pershkrim: pershkrim,
				  mjeku: mjeku
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

</head>
<body>
<div class="topnav">
  <a  href="dashboard.php">Home</a>
   <a class="active" href="table.php">Regjistro pacient</a>
     <a href="termin.php">Pacientet e kontrolluar</a>
  <a href="stafi.php" >Stafi</a>
<div class= "topnavl">
  <a href="../logout.php">Log out</a>
</div>
</div>


<div class="box">
   <h1 align="center">List of all pacients with id, name , surname, age and number. </h1>
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
       <th width="10%">Id</th>
       <th width="35%">Name</th>
       <th width="35%">Surname</th>
       <th width="35%">Age</th>
	   <th width="35%">Number</th>
	   
       <th width="10%">Edit</th>
       <th width="10%">Delete</th>
       <th width="10%">Cakto Termin</th>
      </tr>
     </thead>
	 <tbody >
		<?php

					if($query = mysqli_query($con, "SELECT * FROM spital.pacienti;")){
						if(mysqli_num_rows($query) > 0){
							while($row = mysqli_fetch_array($query)){
								echo "<tr>";
								echo "<td>".$row['idpacienti']."</td>";
								echo "<td>".$row['name']."</td>";
								echo "<td>".$row['surname']."</td>";
								echo "<td>".$row['age']."</td>";
								echo "<td>".$row['number']."</td>";
								echo "<td ><i onclick='editPatientModal(".$row['idpacienti'].")' class='fas fa-edit'></i></td>";
								echo "<td ><i onclick='deletePatientModal(".$row['idpacienti'].",\"".$row['name']."\")' class='far fa-trash-alt'></i></td>";
								echo "<td ><i onclick='terminPatientModal(".$row['idpacienti'].",\"".$row['name']." ".$row['surname']."\")' class='fas fa-calendar-check'></i></td>";
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
  
  
  <div id="addPatient" class="modal">
		<p>Full the infos</p>
		<label for="name">Name:</label>
		<input type="text" id="name"/>
		<br>
		<label for="surname">Surname:</label>
		<input type="text" id="surname"/>
		<br>
		<label for="age">Age:</label>
		<input type="text" id="age"/>
		<br>
		<label for="number">Number:</label>
		<input type="text" id="number"/>
		<br>
		<br>
	    <button type="button" id="add_btn" onclick="addPatient()">Save</button>
  </div>
  
  <div id="editModal" class="modal">
	<p>Thanks for clicking. That felt good.</p>
	<input type="hidden" id="id_pacienti"/>
	<input type="text" id="nameEdit"/>
	<input type="text" id="surnameEdit"/>
	<input type="text" id="ageEdit"/>
	<input type="text" id="numberEdit"/>
	<button type="button" id="edit_btn" onclick="editPatient()">Save</button>
	<a href="#" rel="modal:close">Close</a>
  </div>
  
  <div id="deleteModal" class="modal">
	<p>Are you sure you want to delete this patient  '<span id="patientDel"></span>'</p>
	<button type="button" id="delete_btn" onclick="deletePatient()">Delete</button>
	<a href="#" rel="modal:close">Close</a>
  </div>
  
  <div id="terminModal" class="modal">
	<p>Emri dhe mbiemri i pacientit: '<span id="terminPatient"></span>'</p>
		
		<label for="dt_termin">Data e terminit:</label>
		<input type="date" id="dt_termin"/>
		<br>
		<label for="pershkrim">Pershkrim:</label>
		<textarea id="pershkrim"></textarea>
		<br>
		<label for="mjeku">Mjeku:</label>
		<select id="mjeku">
			<?php

					if($query = mysqli_query($con, "SELECT * FROM spital.users where role=2;")){
						if(mysqli_num_rows($query) > 0){
							while($row = mysqli_fetch_array($query)){
								echo "<option value='".$row['iduser']."'>".$row['username']."</td>";
							}
						}else {
							// Theres no data in this table
						}
					}else{
						
					}
		
		?>
		</select>
		<br>
		<br>
		<button type="button" id="save_termin" onclick="addTermin()">Save</button>
	<a href="#" rel="modal:close">Close</a>
  </div>
  

</body>




</html>