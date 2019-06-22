<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Registeration</title>
	<?php include(__DIR__.'\..\inc\head.php');?>
</head>
<body>
<?php echo form_open("Admin/signup",["class"=>"form-horizontal"]);?>
<?php include(__DIR__.'\..\inc\header.php');?>	

<div class='container'>
	<?php include(__DIR__.'\..\inc\flashMessage.php') ; ?>
	<div class="jumbotron">
		<h2 class="display-3" style="text-align: center;"> ADMIN REGISTERATION</h2>
		<hr>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class='form-group'>
				<label class='col-md-3 control-label'>Username</label>
				
					<?php echo form_input(['name'=>'username','class'=>'col-md-9 form-control','placeholder'=>'Username', 'value' =>set_value('username')]);?>

				
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
				<label class='col-md-3 control-label'>Email</label>
				
					<?php echo form_input(['name'=>'email','class'=>'col-md-9 form-control','placeholder'=>'Email Id']);?>
				
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
				<label class='col-md-3 control-label'>Role</label>
				<select class='col-lg-9 form-control' name='role'>
					<option value="">Select</option>
					<?php foreach ($roles as $role):?>
						<option value=<?php echo $role->roleName ;?>><?php echo $role->roleName ;?></option>
					<?php endforeach; ?>

				</select>

			</div>
		</div>
		<div class='col-md-6'>
			<div class = "text-danger">
			<?php echo form_error('role');?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class='form-group'>
				<label class='col-md-3 control-label'>Password</label>
				
					<?php echo form_input(['name'=>'password','class'=>'col-md-9 form-control','placeholder'=>'Password', 'type'=>'password']);?>
				
			</div>
		</div>
		<div class='col-md-6'>
			<div class = "text-danger">
			<?php echo form_error('password');?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class='form-group'>
				<label class='col-md-3 control-label'>Confirm Password</label>
				
					<?php echo form_input(['name'=>'confirmpass','class'=>'col-md-9 form-control','placeholder'=>'Password','type' => 'password']);?>

			</div>
		</div>
		<div class='col-md-6'>
			<div class = "text-danger">
			<?php echo form_error('confirmpass');?>
			</div>
		</div>
	</div>

	
				<button class="btn btn-primary">Submit</button>
				<?php echo anchor("Welcome/home","Back",['class'=>'btn btn-primary']); ?>
		




</div>
<?php echo form_close();?>


</body>
</html>