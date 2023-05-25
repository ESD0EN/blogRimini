<?php

	if(isset($_FILES['IMG'])){
		$uploaddir = "C:/xampp/blog/images/";
		$tmp = $_FILES['IMG']['tmp_name'];
		$real = $_FILES['IMG']['name'];
		
		if(move_uploaded_file($tmp, $uploaddir.$real)){
			echo 'file uploaded';
			$img = $real;
		}else{
			echo 'problems';
			$img = '';
		}
	}
	
?>