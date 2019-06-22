<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add College</title>
	<?php include(__DIR__.'\..\inc\head.php');?>
</head>
<body>
<?php echo form_open("Dashboard/createCollege",["class"=>"form-horizontal"]);?>
<?php include(__DIR__.'\..\inc\header.php');?>	

<div class='container'>
	<?php include(__DIR__.'\..\inc\flashMessage.php') ; ?>
	<div class="jumbotron">
		<h2 class="display-3" style="text-align: center;"> ADD COLLEGE</h2>
		<hr>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class='form-group'>
				<label class='col-md-3 control-label'>College Name</label>
				
					<?php echo form_input(['name'=>'collegename','class'=>'col-md-9 form-control','placeholder'=>'College Name']);?>
					
				
			</div>
		</div>
		<div class='col-md-6'>
			<div class = "text-danger">
			<?php echo form_error('collegename');?>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6">
			<div class='form-group'>
				<label class='col-md-3 control-label'>Branch</label>
				
					<?php echo form_input(['name'=>'branch','class'=>'col-md-9 form-control','placeholder'=>'Branch']);?>
				
			</div>
		</div>
		<div class='col-md-6'>
			<div class = "text-danger">
			<?php echo form_error('branch');?>
			</div>
		</div>
	</div>
	

	
				<button class="btn btn-primary">Add College</button>
				<?php echo anchor("Dashboard/index","Back",['class'=>'btn btn-primary']); ?>
		




</div>
<?php echo form_close();?>


</body>
</html>