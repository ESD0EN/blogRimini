<?php

	include('conn.php');
	
	//print_r($_SESSION);
	
	$xd = true;
	
	$kwer = "SELECT * FROM users WHERE ALLOWED_US = '$xd' ";
	
	$wynik = mysqli_query($link, $kwer);
	
	$row = mysqli_num_rows($wynik);
	
	
	if($wynik = $_SESSION['ALLOW'])
	{
		echo ' <form method = "POST">';
		echo ' <input type = "submit" name = "ADDNEWARTICLE" value = "ADD NEW ARTICLE"> ';
				
				if(isset($_POST['ADDNEWARTICLE']))
				{
					header('location:article.php');
				}
	}
	
?>