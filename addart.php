<?php
	include ('conn.php');

	$title = mysqli_real_escape_string($link, $_POST['ARTITLE']);
	$title = htmlspecialchars($title);
		
	$text = mysqli_real_escape_string($link, $_POST['ARTXT']);
	$text = htmlspecialchars($text);
		
	$cat_id = mysqli_real_escape_string($link, $_POST['CAT']);

	if(isset($_FILES['img']['tmp_name'])){
		$uploaddir = "img/";
		$tmp = $_FILES['img']['tmp_name'];
		$real = $_FILES['img']['name'];
		
		if(move_uploaded_file($tmp, $uploaddir.$real)){
			echo 'File uploaded <br>';
			$imgdb = $real;
		}else{
			echo 'Problems <br>';
			$imgdb = '';
		}
	}
		
	$query = "INSERT INTO article VALUES (NULL, '$title', '$text', now(), '$imgdb', '$cat_id')";
		
	$result = mysqli_query($link, $query);
		
	if($result){
			echo 'Article added <br>';
	}else{
			echo 'Problems <br>';
			echo 'Try again to add article';
	}
	echo '<a href = "index.php"> Back to main page </a>';
?>