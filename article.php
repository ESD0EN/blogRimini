<html>
<head>

	<meta charset = "utf-8"/>
	<title> Add Article </title>
	<link rel = "stylesheet" href = "art.css">
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
	<?php include('artic.php');?>
	<div id = "tresc">
	<br> <br>
	<form method = "POST" action = "addart.php" enctype = "multipart/form-data"> 
	Category 
	<select name = "CAT">
	<?php
	include ('conn.php');
	$kwerenda = "SELECT * FROM categories";
	$wynik = mysqli_query($link, $kwerenda);
	$rzad = mysqli_num_rows($wynik);
	if($rzad>0){
		while($cat = mysqli_fetch_array($wynik)){
			$cat_id = $cat['ID_CAT'];
			$cat_name = $cat['NAME_CAT'];
			//echo '<input type = "hidden" name = "IDCAT" value = "'.$cat_id.'">';
			echo "<option value = '$cat_id'> $cat_name </option>";
		}
	}
	?>
	</select> <br> <br>
	Article Title <input type = "text" name = "ARTITLE"> <br> <Br>
	Article Text <textarea name = "ARTXT"></textarea> <br> <br>
	<input type = "file" name = "img" style = "width:200;"> <br> <br>
	<input type = "submit" name = "ADD" value = "Add New Article"> <br> <br>
	</form>
	<?php 
	if(isset($_POST['ADD']))
	{
		include('addart.php');
	}
	?>

		
	</div>
	<div id = "stopka">
		Contact: Email - szymon.figger00@gmail.com | Number - 000000000
	</div>
	</div>
	
</body>
</html>