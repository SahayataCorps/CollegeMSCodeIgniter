<!DOCTYPE html>
<html>
<head>
	<title>Workers</title>
</head>
<body>
<h1 align="Center">WORKERS</h1>
<?php foreach ($det as $key) {
	echo "<ul>";
	echo "<li>".$key['name']."</li>";
	echo "<li>".$key['age']."</li>";
	echo "<li>".$key['phone']."</li>";
	echo "</ul>";
	
} ?>
</body>
</html>