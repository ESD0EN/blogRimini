	<div id = "logowanie">
		
		<?php
			
			session_start();
			//print_r($_SESSION);
			if (isset ($_SESSION['EMAIL']))
			{
				echo '<br>';
				echo ' Hi ';
				echo $_SESSION['FIRST'];
				echo '<br><br>';
				echo ' <form method = "POST" action="logout.php">
				<input type = "submit" name = "LOGOUT" value = "LOG OUT"> <br>';
				
				echo '</form>';
				//include('allow.php');
				//echo '&nbsp &nbsp &nbsp';
				echo ' <form method = "POST" action="index.php">';
				echo '<input type = "submit" name = "MAIN" value = "BACK TO MAIN PAGE"> <br>';
				echo '</form>';
				if(isset($_POST['MAIN']))
				{
					header('location:index.php');
				}
				include('admin.php');
				
				//include('admin.php');
			}
			
		?>
		
	</div>