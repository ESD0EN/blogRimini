<?php

	session_start();
	//print_r($_SESSION);
	include('conn.php');
	
	if(isset($_POST['DELETEUSER']))
		{
			$del = mysqli_real_escape_string($link, $_POST['ID_USER']);
				
			$qwe = "DELETE FROM users WHERE ID_USER = '$del'";
			$qweres = mysqli_query($link, $qwe);
				
			if($qweres)
			{
				echo '<script type="text/javascript">alert("User deleted!");</script>';
			}
			else
			{
				echo '<script type="text/javascript">alert("Delete failed!");</script>';
			}
		}
		if(isset($_POST['ALLOWUSER']))
		{
			$allow = mysqli_real_escape_string($link, $_POST['ID_USER']);
			
			$qwer = "UPDATE users SET ALLOWED_US = 1 WHERE ID_USER = '$allow'";
			$qwerres = mysqli_query($link, $qwer);
			
			if($qwerres)
			{
				echo '<script type="text/javascript">alert("User allow!");</script>';
			}
			else
			{
				echo '<script type="text/javascript">alert("Failed!");</script>';
			}
		}
		if(isset($_POST['DELETEALLOW']))
		{
			$delallow = mysqli_real_escape_string($link, $_POST['ID_USER']);
			
			$qwerty = "UPDATE users SET ALLOWED_US = 0 WHERE ID_USER = '$delallow'";
			$qwertyres = mysqli_query($link, $qwerty);
			
			if($qwertyres)
			{
				echo '<script type="text/javascript">alert("User not allow!");</script>';
			}
			else
			{
				echo '<script type="text/javascript">alert("Failed!");</script>';
			}
		}

    $query = "SELECT * FROM users";
	
	$result = mysqli_query($link, $query);
	
	$row = mysqli_num_rows($result);
	
	if($row >0)
	{
		while($info_us = mysqli_fetch_array($result))
		{
			echo '<form method = "POST">';
			echo '<input type = "hidden" name = "ID_USER" value = "'.$info_us['ID_USER'].'">';
			if($info_us['ADMIN_US']==1)
			{
				echo "You are admin you don't need anything more!";
			}
			elseif($info_us['ALLOWED_US']==1)
			{
				echo '<input type = "submit" name = "DELETEUSER" value = "DELETE">';
				echo '<input type = "submit" name = "DELETEALLOW" value = "DO NOT ALLOW">';
			}
			else
			{
				echo '<input type = "submit" name = "ALLOWUSER" value = "ALLOW">';
				echo '<input type = "submit" name = "DELETEUSER" value = "DELETE">';
			}
			echo '</form>'; 
			echo '<table border = "1" width= "100%" height = "20%" style = "text-align:center;">';
				echo '<tr>';
					echo '<td> FIRST </td> <td> LAST </td> <td> EMAIL </td> <td> PASSWORD </td> <td> ADMIN </td> <td> ALLOWED USER </td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>'; echo $info_us['FIRST']; echo '</td>';
					echo '<td>'; echo $info_us['LAST']; echo '</td>';
					echo '<td>'; echo $info_us['EMAIL_US']; echo '</td>';
					echo '<td>'; echo $info_us['PASS_US']; echo '</td>';
					echo '<td>'; echo $info_us['ADMIN_US']; echo '</td>';
					echo '<td>'; echo $info_us['ALLOWED_US']; echo '</td>';
				echo '</tr>';
			echo '</table> <br>';
		}
		
	}
	
	echo ' <br> <a href = "adminpanel.php"> Back to Admin Panel </a>';

?>