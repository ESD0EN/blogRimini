
	<div id = "logowanie">
		
		<?php
			
			session_start();
			//print_r($_SESSION);
			if (isset ($_SESSION['EMAIL']))
			{
				echo '<br>';
				echo ' Hi ';
				echo $_SESSION['FIRST'];
				echo '<br>';
				echo '<form method = "POST">';
				echo '<input type = "submit" name = "LOGOUT" value = "LOG OUT"><br>';
				if(isset($_POST['LOGOUT']))
				{
					include('logout.php');
				}
				echo '<br>';
				include('allow.php');
				include('admin.php');
			}
			else
			{
				echo '<br><br>';
				echo '<form action = "login.php" method = "POST">';
				echo ' LOGIN:	&nbsp &nbsp &nbsp &nbsp';
				echo ' <input type = "text" name = "USER"> <br>';
				echo ' PASSWORD: <input type = "password" name = "PASS"> <br>';
				echo ' <input type = "submit" name = "LOG" value = "Log In"> </form>';
				echo ' <form method = "POST">';
				echo ' <input type = "submit" name = "CREATEACCOUNT" value = "Create account">';
				if(isset($_POST['CREATEACCOUNT']))
				{
					header('location:register.php');
				}
				echo ' </form>	';
				
			}
			
			
		?>
		
	</div>
