
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
				echo ' <form method = "POST">
						   <input type = "submit" name = "LOGOUT" value = "LOG OUT"> <br> <br>';
				
				if(isset($_POST['LOGOUT']))
				{
					include('logout.php');
				}
				
				//include('allow.php');
				//echo '&nbsp &nbsp &nbsp';
				echo '<input type = "submit" name = "MAIN" value = "BACK TO MAIN PAGE">';
				if(isset($_POST['MAIN']))
				{
					header('location:index.php');
				}
				//include('admin.php');
			}
			
		?>
		
	</div>
