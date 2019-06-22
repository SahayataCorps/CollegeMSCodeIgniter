<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Students</title>
	<?php include(__DIR__.'\..\inc\head.php');?>
</head>
<body>
<?php include(__DIR__.'\..\inc\header.php');?>
<div class='container'>
	<?php include(__DIR__.'\..\inc\flashMessage.php') ; ?>
	<div class="jumbotron">
		<h2 class="display-3" style="text-align: center;"> VIEW STUDENTS</h2>
		<hr>
		<h4 class="display-5">College: <?php echo $collegeName;?> </h4>
		<div class='my-4'>
			<div class='row'>
				<div class="col-lg-6">
					<?php echo anchor("Dashboard/index","Dashboard",["class"=>'btn btn-primary']);?>
				</div>
			</div>
		</div>
	</div>
	<div class = 'row'>
		<table class = "table table-hover">
			<thead>
				<tr>
					<th>Student ID</th>
					<th>Student Name</th>
					<th>Email</th>
					<th>Gender</th>
					<th>Course</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($data as $detail){?><tr>
				<td><?php echo $detail->studentId;?></td>
				<td><?php echo $detail->username;?></td>
				<td><?php echo $detail->email;?></td>
				<td><?php echo $detail->gender;?></td>
				<td><?php echo $detail->course;?></td>
				<td><?php echo anchor("Dashboard/editStudent/{$detail->studentId}","Edit Details",["class"=>'btn btn-primary']);?>
					<?php echo anchor("Dashboard/deleteStudent/{$detail->collegeId}/{$detail->studentId}","Delete Student",["class"=>'btn btn-primary btn-danger']);?>
				</td></tr>
				<?php } ?>	
			</tbody>
		</table>
	</div>

</div>


</body>
</html>
