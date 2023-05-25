<?php

	if(isset($_POST['LOG']))
	{

		include ('conn.php');
		$user = mysqli_real_escape_string($link, $_POST['USER']);
		$user = htmlspecialchars($user);
		
		$pass = mysqli_real_escape_string ($link, $_POST['PASS']);
		$pass = htmlspecialchars($pass);
	
		$query = "SELECT * FROM users WHERE EMAIL_US = '$user' AND PASS_US = '$pass' ";
		
		$result = mysqli_query($link, $query);
		
		$rows = mysqli_num_rows($result);
		
		session_start();
		
		if($rows==1)
		{
			$info_user = mysqli_fetch_array($result);
			
			$_SESSION['EMAIL'] = $user;
			$_SESSION['FIRST'] = $info_user ['FIRST'];
			$_SESSION['IDUSER'] = $info_user['ID_USER'];
			$_SESSION['ALLOW'] = $info_user['ALLOWED_US'];
			$_SESSION['ADMIN'] = $info_user['ADMIN_US'];
		}
		else
		{
			$_SESSION['WRONG'] = 'login problem';
		}
		
		header ('Location: index.php');
	}
	
?>