<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<?php include(__DIR__.'\..\inc\head.php');?>
</head>
<body>
<?php include(__DIR__.'\..\inc\header.php');?>
<div class='container'>
	<?php include(__DIR__.'\..\inc\flashMessage.php') ; ?>
	<div class="jumbotron">
		<h2 class="display-3" style="text-align: center;"> ADMIN DASHBOARD</h2>
		<hr>
		<h4 class="display-5">Welcome <?php echo $this->session->userdata('username');?> !</h4>
		<div class='my-4'>
			<div class='row'>
				<div class="col-lg-6">
					<?php echo anchor("Dashboard/addCollege","Add College",["class"=>'btn btn-primary']);?>
					<?php echo anchor("Dashboard/addCoadmin","Add Co-Admin",["class"=>'btn btn-primary']);?>
					<?php echo anchor("Dashboard/addStudent","Add Student",["class"=>'btn btn-primary']);?>
					
				</div>
			</div>
		</div>
	</div>
	<div class = 'row'>
		<table class = "table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>College Name</th>
					<th>Username</th>
					<th>Email</th>
					<th>Role</th>
					<th>Gender</th>
					<th>Branch</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($data as $detail){?><tr>
				<td><?php echo $detail->collegeId;?></td>
				<td><?php echo $detail->collegename;?></td>
				<td><?php echo $detail->username;?></td>
				<td><?php echo $detail->email;?></td>
				<td><?php echo $detail->role;?></td>
				<td><?php echo $detail->gender;?></td>
				<td><?php echo $detail->branch;?></td>
				<td><?php echo anchor("Dashboard/viewStudents/{$detail->collegeId}","View Students",["class"=>'btn btn-primary']);?></td></tr>
				<?php } ?>	
			</tbody>
		</table>
	</div>

</div>


</body>
</html>
