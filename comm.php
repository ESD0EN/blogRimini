<?php

	if(isset($_POST['ADD_COMM']))
	{
		session_start();
		//print_r($_SESSION);
		
		include ('conn.php');
				
		$usid = $_SESSION['IDUSER'];
		$arid = $_POST['ID_ART'];
			
		$text = mysqli_real_escape_string ($link, $_POST['TEXT']);
		$text = htmlspecialchars($text);
		
		echo $query = "INSERT INTO comments VALUES (NULL, '$text', now(),  '$usid', 1, '$arid')";
		
		$result = mysqli_query($link, $query);
		
		if($result)
		{
			echo 'Comment added <br>';
			echo ' <a href = "index.php"> Back to main page </a>';
		}
		else
		{
			echo 'Problems <br>';
			echo '<a href = "index.php"> Try again to add comment </a>';
		}


		header ('location:index.php');
	}
	
?>