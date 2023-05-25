
	<div id = "szukanie">
		
		<?php
			
			
			//print_r($_SESSION);
			if (isset ($_SESSION['EMAIL']))
			{
				
				echo ' <br> <br> <form action = "index.php" method = "POST" >
						  <input type = "text" name = "STRING"> 
						  <input type = "submit" name = "SEARCH" value = "SEARCH">
						  </form> <br>';
			}
			else
			{
				echo '<br> <br> <form action = "index.php" method = "POST">
						  <input type = "text" name = "STRING"> 
						  <input type = "submit" name = "SEARCH" value = "SEARCH">
						  </form>';				
			}
			
			
		?>
	<form method = "POST" action = "index.php">
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
			echo "<option value = '$cat_id'> $cat_name </option>";
		}
	}
	?>
	</select>
	<input type = "submit" name = "GO" value = "GO">
	</form>
	</div>
