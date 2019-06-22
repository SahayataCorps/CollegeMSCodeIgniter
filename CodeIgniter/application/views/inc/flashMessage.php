<?php 

if($message = $this->session->flashdata('message')){?>
<div class="row">
	<div class = "col-md-6">
		<div class="alert alert-dismissible alert-success">
			<?php echo $message; ?>
		</div>
	</div>
</div>
<?php } ?>
<?php

if($message = $this->session->flashdata('wrongmessage')){?>
<div class="row">
	<div class = "col-md-6">
		<div class="alert alert-dismissible alert-danger ">
			<?php echo $message; ?>
		</div>
	</div>
</div>
<?php } ?>