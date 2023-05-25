<?php

	$host = 'localhost';
	$db_name = 'myblog';
	$db_user = 'root';
	$db_pass = '';
	
	$link = mysqli_connect($host, $db_user, $db_pass, $db_name);
	
	if (!$link)
	{
		echo "website under mainterance";
		exit;
	}
	
?>
