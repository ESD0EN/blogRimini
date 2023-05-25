<html>
<head>

	<meta charset = "utf-8"/>
	<title> Admin Panel </title>
	<link rel = "stylesheet" href = "style.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
	<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#logo').load('logo.php').fadeIn("slow");
	}, 1000); // refresh every 1 second
	</script>
	
</head>
<body>

	<div id = "pudelko">
	<?php include('logo.php'); ?>
	<?php include('adminlog.php');?>
	<?php include('szukanie.php');?>
	<div id = "admin">
	
	<br> 
	<form method = "POST" action = "">
	<b> Articles </b>
	<input type = "submit" name = "ADD" value = "ADD">
	<?php 
	if(isset($_POST['ADD']))
	{
		header('location:article.php');
	}
	?>
	<input type = "submit" name = "EDIT" value = "EDIT/DELETE"> 
	<?php 
	if(isset($_POST['EDIT']))
	{
		header('location:teksty.php');
	}
	?>
	<br> <br>
	<b> Comments </b>
	<input type = "submit" name = "COMMG" value = "MANAGE"> 
	<?php
	if(isset($_POST['COMMG']))
	{
		header('location:komenty.php');
	}
	?>
	<br> <br>
	<b> Users </b>
	<input type = "submit" name = "USRMG" value = "MANAGE"> 
	<?php
	if(isset($_POST['USRMG']))
	{
		header('location:uzyt.php');
	}
	?>
	<br> <br>
	</form>
	
	</div>
	<div id = "stopka">
	Contact: Email - szymon.figger00@gmail.com | Number - 000000000
	</div>
	</div>
	
</body>
</html>