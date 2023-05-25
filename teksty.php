<div id = "tresc">
	<?php 
	
		include('conn.php');
		
		session_start();
		
		if(isset($_POST['SEARCH']))
		{
			$string = mysqli_real_escape_string($link, $_POST['STRING']);
			$string = htmlspecialchars($string);
			
			$query = "SELECT * FROM article WHERE TEXT_ART LIKE '%$string%' ORDER BY DATE_ART DESC";	
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
					echo '<form method = "POST" action = "edit.php">';
					echo '<input type = "hidden" name = "ID_ARTICLE" value = "'.$art['ID_ART'].'">';
					echo '<input type = "submit" name = "EDIT" value = "EDIT">';
					echo '<input type = "submit" name = "DELETE" value = "DELETE">';
					echo '</form>'; 
					echo '<table border = "1" width= "100%" height = "20%" style = "text-align:center;">';
						echo '<tr>';
							echo '<td> TITLE </td> <td> DATE </td>';
						echo '</tr>';
						echo '<tr>';
							echo '<td>'; echo $art['TITLE_ART']; echo '</td>';
							echo '<td>'; echo $art['DATE_ART']; echo '</td>';
						echo '</tr>';
					echo '</table> <br>';
				}
			}
		
		
	?>
	<a href = "adminpanel.php"> Back to Admin Panel </a>
</div>