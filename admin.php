<?php

	include('conn.php');
	
	//print_r($_SESSION);
	
	$xd = true;
	
	$kwer = "SELECT * FROM users WHERE ADMIN_US = '$xd' ";
	
	$wynik = mysqli_query($link, $kwer);
	
	$row = mysqli_num_rows($wynik);
	
	
	if($wynik = $_SESSION['ADMIN'])
	{
		echo ' <form method = "POST" action="adminpanel.php">';
		echo ' <input type = "submit" name = "ADMINPANEL" value = "ADMIN PANEL"> ';
		echo '</form>';		
				if(isset($_POST['ADMINPANEL']))
				{
					header('location:adminpanel.php');
				}
	}
	
?>