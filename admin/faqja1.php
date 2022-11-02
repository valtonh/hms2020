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
    $('#user_data').DataTable( {
  
} );
});

	function fetchUser3(iduser){
		
		$.ajax({
			url:"doc/fetchUser.php",
			method:'POST',
			data: {
                  id: iduser
                },
			success:function(data){
				if(data!='error'){
					var result = JSON.parse(data);
					$('#id_user').val(result.iduser);
					$('#usernameEdit').val(result.username);
					$('#passwordEdit').val(result.password);
					$('#editModal').modal('show');
				}
			}
		   });
	}

	function editUserModal(iduser){
		
		$.ajax({
			url:"doc/fetchUser.php",
			method:'POST',
			data: {
                  id: iduser
                },
			success:function(data){
				if(data!='error'){
					var result = JSON.parse(data);
					$('#id_user').val(result.iduser);
					$('#usernameEdit').val(result.username);
					$('#passwordEdit').val(result.password);
					$('#editModal').modal('show');
				}
			}
		   });
	}
	
	function deleteUserModal(iduser, username){
		$('#id_user').val(iduser);
		$('#usernameDel').html(username);
		$('#deleteModal').modal('show');
	}
	
	function editUser(){
		
		var currentId = $('#id_user').val();
		var username = $('#usernameEdit').val();
		var password = $('#passwordEdit').val();
		$.ajax({
			url:"doc/editUser.php",
			method:'POST',
			data: {
                  id: currentId,
				  user: username,
				  pass: password
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
	
	function deleteUser(){
		
		var currentId = $('#id_user').val();
		$.ajax({
			url:"doc/deleteUser.php",
			method:'POST',
			data: {
                  id: currentId,
                },
			success:function(data)
			{
				if(data=="success")
					location.reload();
				else
					alert('Data was not DELETED.')
			}
		   });
	}
		function addUser(){
		
		var username = $('#username').val();
		var password = $('#password').val();
		var role = $('#role').val();
		$.ajax({
			url:"doc/addUser.php",
			method:'POST',
			data: {
				  user: username,
				  pass: password,
				  role: role
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
  <a class="active" href="#home">Home</a>
<div class= "topnavl">
  <a href="../logout.php">Log out</a>
    <a href="about.php">About</a>
  <a href="contact.php">Contact</a>  
  <a href="listadiagnozave.php" >Lista diagnozave</a>
</div>
</div>


<div class="box">
   <h1 align="center">List of all users with id, username , password and role. </h1>
   <br />
   <div class="table-responsive">
    <br />
    <div align="right">
		<span onclick='openAddModal()'>
			<i class="fas fa-plus"></i>
		</span>
    </div>
    <br /><br />
    <table id="user_data" class="cell-border compact stripe">
     <thead>
      <tr>
       <th width="10%">Id</th>
       <th width="35%">Username</th>
       <th width="35%">Password</th>
       <th width="35%">Role</th>
       <th width="10%">Edit</th>
       <th width="10%">Delete</th>
      </tr>
     </thead>
	 <tbody >
		<?php

					if($query = mysqli_query($con, "SELECT iduser, username, `password`, r.description from users u inner join roles r on u.role=r.idroles;")){
						if(mysqli_num_rows($query) > 0){
							while($row = mysqli_fetch_array($query)){
								echo "<tr>";
								echo "<td>".$row['iduser']."</td>";
								echo "<td>".$row['username']."</td>";
								echo "<td>".$row['password']."</td>";
								echo "<td>".$row['description']."</td>";
								echo "<td ><i onclick='editUserModal(".$row['iduser'].")' class='fas fa-edit'></i></td>";
								echo "<td ><i onclick='deleteUserModal(".$row['iduser'].",\"".$row['username']."\");' class='far fa-trash-alt'></i></td>";
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
		<p>Full the infos</p>
		<label for="username">Username:</label>
		<input type="text" id="username"/>
		<br>
		<label for="password">Password:</label>
		<input type="text" id="password"/>
		<br>
		<label for="role">Choose a role:</label>
		<select id="role">
		  <option value="1">Admin</option>
		  <option value="2">Doctor</option>
		  <option value="3">Nurse</option>
		</select>
		<br>
	    <button type="button" id="add_btn" onclick="addUser()">Save</button>
  </div>
  
  <div id="editModal" class="modal">
	<p>You are editing informations.</p>
	<input type="hidden" id="id_user"/>
	<input type="text" id="usernameEdit"/>
	<input type="text" id="passwordEdit"/>
	<button type="button" id="edit_btn" onclick="editUser()">Save</button>	
  </div>
  
  <div id="deleteModal" class="modal">
	<p>Are you sure you want to delete user <span id="usernameDel"></span></p>
	<button type="button" id="delete_btn" onclick="deleteUser()">Delete</button>
  </div>
  

</body>




</html>