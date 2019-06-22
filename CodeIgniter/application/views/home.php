<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
<?php include("inc/head.php"); ?>
</head>
<body>
<?php include("inc/header.php");?>
<div class="container">
	<div class="jumbotron">
		<h2 class="display-3" style="text-align: center;"> ADMIN & CO ADMIN LOGIN</h2>
		<hr>
		<div class='my-4'>
			<div class='row'>
				<div class="col-lg-4">
					<?php echo anchor("Admin/register","Admin Register",["class"=>'btn btn-primary']);?>
				</div>
				<div class="col-lg-4">
					<?php echo anchor("Admin/login_page","Admin Login",["class"=>'btn btn-primary']);?>
				</div>
			</div>
		</div>
	</div>
</div>




</body>
</html>