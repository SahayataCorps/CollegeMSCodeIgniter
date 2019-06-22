<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Student</title>
	<?php include(__DIR__.'\..\inc\head.php');?>
</head>
<body>
<?php echo form_open("Dashboard/createstudent",["class"=>"form-horizontal"]);?>
<?php include(__DIR__.'\..\inc\header.php');?>	

<div class='container'>
	<?php include(__DIR__.'\..\inc\flashMessage.php') ; ?>
	<div class="jumbotron">
		<h2 class="display-3" style="text-align: center;"> ADD STUDENT </h2>
		<hr>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class='form-group'>
				<label class='col-md-3 control-label'>Student Name</label>
				
					<?php echo form_input(['name'=>'username','class'=>'col-md-9 form-control','placeholder'=>'Student Name', 'value' =>set_value('username')]);?>

				
			</div>
		</div>
		<div class='col-md-6'>
			<div class = "text-danger">
			<?php echo form_error('username');?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class='form-group'>
				<label class='col-md-3 control-label'>College</label>
				<select class='col-lg-9 form-control' name='collegeId'>
					<option value="">Select</option>
					<?php foreach ($colleges as $colg ):?>
						<option value=<?php echo $colg->collegeId; ?>><?php echo $colg->collegename." ".$colg->branch; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class='col-md-6'>
			<div class = "text-danger">
			<?php echo form_error('collegeId');?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class='form-group'>
				<label class='col-md-3 control-label'>Email</label>
				
					<?php echo form_input(['name'=>'email','class'=>'col-md-9 form-control','placeholder'=>'Email Id', 'type'=>'email']);?>
				
			</div>
		</div>
		<div class='col-md-6'>
			<div class = "text-danger">
			<?php echo form_error('email');?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class='form-group'>
				<label class='col-md-3 control-label'>Gender</label>
				<select class='col-lg-9 form-control' name='gender'>
					<option value="">Select</option>
					<?php foreach ($genders as $gen ):?>
						<option value=<?php echo $gen->gender; ?>><?php echo $gen->gender; ?></option>
					<?php endforeach; ?>
				</select>

			</div>
		</div>
		<div class='col-md-6'>
			<div class = "text-danger">
			<?php echo form_error('gender');?>
			</div>
		</div>
	</div>
	
		<div class="row">
		<div class="col-md-6">
			<div class='form-group'>
				<label class='col-md-3 control-label'>Course</label>
				
					<?php echo form_input(['name'=>'course','class'=>'col-md-9 form-control','placeholder'=>'Course Opted', 'value' =>set_value('course')]);?>

				
			</div>
		</div>
		<div class='col-md-6'>
			<div class = "text-danger">
			<?php echo form_error('course');?>
			</div>
		</div>
	</div>

				<button class="btn btn-primary">Submit</button>
				<?php echo anchor("Dashboard/index","Back",['class'=>'btn btn-primary']); ?>
		




</div>
<?php echo form_close();?>


</body>
</html>