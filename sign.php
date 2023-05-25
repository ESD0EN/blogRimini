<?php

	if(isset($_POST['REGI']))
	{

		include ('conn.php');
		
		$first = mysqli_real_escape_string($link, $_POST['FIRST']);
		$first = htmlspecialchars($first);
		
		$last = mysqli_real_escape_string ($link, $_POST['LAST']);
		$last = htmlspecialchars($last);
		
		$email = mysqli_real_escape_string($link, $_POST['EMAIL']);
		$email = htmlspecialchars($email);
		
		$pass = mysqli_real_escape_string ($link, $_POST['PASS']);
		$pass = htmlspecialchars($pass);
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			echo 'Email not correct <br>';
			echo '<a href = "register.php"> Back to register page </a>';
			exit();
		}
		else
		{
			$que = "SELECT * FROM users WHERE EMAIL_US = '$email' ";
		
			$res = mysqli_query($link, $que);
		
			$row = mysqli_num_rows ($res);
		
			if($row > 0)
			{
				echo 'This email is already used <br>';
				echo '<a href = "register.php"> Back to register page </a>';
			}
			else
			{
				$query = "INSERT INTO users VALUES (NULL, '$first', '$last', '$email', '$pass', 0, 0)";
		
				$result = mysqli_query($link, $query);
		
				if($result)
				{
					echo 'User added <br>';
					echo '<a href = "index.php"> Back to main page </a>';
				}
				else
				{
					echo 'Problems';
					echo '<a href = "register.php"> Back to register page </a>';
				}
			}
		}
		//header ('location:index.php');
		
	}
	
?>