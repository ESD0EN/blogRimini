<?php

	session_start();
	//print_r($_SESSION);
	include('conn.php');

				if(isset($_POST['DELETECOM']))
			{
				$del = mysqli_real_escape_string($link, $_POST['ID_COM']);
				
				$qwe = "DELETE FROM comments WHERE ID_COM = '$del'";
				$qweres = mysqli_query($link, $qwe);
				
				if($qweres)
				{
					echo '<script type="text/javascript">alert("Comment deleted!");</script>';
				}
				else
				{
					echo '<script type="text/javascript">alert("Delete failed!");</script>';
				}
			}
			if(isset($_POST['HIDECOM']))
			{
				$hid = mysqli_real_escape_string($link, $_POST['ID_COM']);
				
				$qwerty = "UPDATE comments SET VISIBLE_COM = 0 WHERE ID_COM = '$hid'";
				$qwertyres = mysqli_query($link, $qwerty);
				
				if($qwertyres)
				{
					echo '<script type="text/javascript">alert("Comment hided!");</script>';	
				}
				else
				{
					echo '<script type="text/javascript">alert("Hide failed!");</script>';	
				}
			}
			if(isset($_POST['SHOWCOM']))
			{
				$show = mysqli_real_escape_string($link, $_POST['ID_COM']);
				
				$kwerenda = "UPDATE comments SET VISIBLE_COM = 1 WHERE ID_COM = '$show'";
				$wynik = mysqli_query($link, $kwerenda);
				
				if($wynik)
				{
					echo '<script type="text/javascript">alert("Comment showed!");</script>';	
				}
				else
				{
					echo '<script type="text/javascript">alert("Show failed!");</script>';	
				}
			}
	
    $query = "SELECT * FROM comments";
	
	$result = mysqli_query($link, $query);
	
	$row = mysqli_num_rows($result);
	
	if($row >0)
	{
		while($info_com = mysqli_fetch_array($result))
		{
			//$_SESSION['TEXTCOM'] = $info_com['TEXT_COM'];
			echo '<form method = "POST">';
			echo '<input type = "hidden" name = "ID_COM" value = "'.$info_com['ID_COM'].'">';
			if($info_com['VISIBLE_COM']==1)
			{
				echo '<input type = "submit" name = "HIDECOM" value = "HIDE">';
			}
			else
			{
				echo '<input type = "submit" name = "SHOWCOM" value = "SHOW">';
			}
			echo '<input type = "submit" name = "DELETECOM" value = "DELETE">';
			echo '</form>'; 
			echo '<table border = "1" width= "100%" height = "20%" style = "text-align:center;">';
				echo '<tr>';
					echo '<td> TEXT </td> <td> DATE </td> <td> USER </td> <td> VISIBLE </td> <td> ART </td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>'; echo $info_com['TEXT_COM']; echo '</td>';
					echo '<td>'; echo $info_com['DATE_COM']; echo '</td>';
					echo '<td>'; echo $info_com['USER_COM']; echo '</td>';
					echo '<td>'; echo $info_com['VISIBLE_COM']; echo '</td>';
					echo '<td>'; echo $info_com['ART_COM']; echo '</td>';
				echo '</tr>';
			echo '</table> <br>';
		}

	}
	
	echo ' <br> <a href = "adminpanel.php"> Back to Admin Panel </a>';

?>