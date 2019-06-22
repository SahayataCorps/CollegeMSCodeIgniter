<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<?php include(__DIR__.'\..\inc\head.php');?>
</head>
<body>
<?php echo form_open("Admin/login",["class"=>"form-horizontal"]);?>
<?php include(__DIR__.'\..\inc\header.php');?>	

<div class='container'>
	<?php include(__DIR__.'\..\inc\flashMessage.php') ; ?>
	<div class="jumbotron">
		<h2 class="display-3" style="text-align: center;"> ADMIN LOGIN</h2>
		<hr>
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
	

	
				<button class="btn btn-primary">Submit</button>
				<?php echo anchor("Welcome/home","Back",['class'=>'btn btn-primary']); ?>
		




</div>
<?php echo form_close();?>


</body>
</html>