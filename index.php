<html>
<head>

	<meta charset = "utf-8"/>
	<title> MyBlog </title>
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
	<?php include('logowanie.php');?>
	<?php include('szukanie.php');?>
	<div id = "tresc">
	<?php 
		
		include('conn.php');
		
		if(isset($_POST['SEARCH']))
		{
			$string = mysqli_real_escape_string($link, $_POST['STRING']);
			$string = htmlspecialchars($string);
			
			$query = "SELECT * FROM article WHERE TEXT_ART LIKE '%$string%' ORDER BY DATE_ART DESC";	
		}
		elseif(isset($_POST['GO']))
		{
			$idcat = mysqli_real_escape_string($link, $_POST['CAT']);
			
			$query = "SELECT * FROM article WHERE CAT_ART = '$idcat' ORDER BY DATE_ART DESC";
		}
		else
		{
			$query = "SELECT * FROM article ORDER BY DATE_ART DESC";
		}
			
			$result = mysqli_query($link, $query);
		
			$row = mysqli_num_rows($result);
		
			if($row>0)
			{
				while($art = mysqli_fetch_array($result))
				{
					$_SESSION['IDART'] = $art['ID_ART'];
					echo ' <br><h3><b>';
					echo $art['TITLE_ART'];
					echo '</b>';
					echo '</h3>';
					echo $art['TEXT_ART'];
					echo '<br> <br>';
					echo '<img src = "img/'.$art['IMG_ART'].'" class = "obrazek">';
					if(isset($_SESSION['EMAIL']))
					{
						echo ' <br><form action = "comm.php" method = "POST">';
						echo '<textarea name = "TEXT"> </textarea> <br>';
						echo '<input type = "submit" name = "ADD_COMM" value = "Add comment">';
						echo '<input type = "hidden" name = "ID_ART" value = " ';
						echo $art['ID_ART'];
						echo '">';
						echo '</form> <br>';
						
						$idcom = mysqli_real_escape_string($link, $art['ID_ART']);
						$kwerenda = "SELECT * FROM comments WHERE ART_COM = '$idcom'";
						$wynik = mysqli_query($link, $kwerenda);
						$rzad = mysqli_num_rows($wynik);
						if($rzad > 0){
							while($com = mysqli_fetch_array($wynik)){
								echo $com['TEXT_COM'];
								echo '<br>';
							}
						}
					}
				}
			}
		
		
	?>
	</div>
	<div id = "stopka">
	Contact: Email - szymon.figger00@gmail.com | Number - 000000000
	</div>
	</div>
	
</body>
</html>