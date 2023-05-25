<?php

	include('conn.php');
	session_start();
	//print_r($_SESSION['IDART']);
	
	if(isset($_POST['EDIT'])){
		$idart = mysqli_real_escape_string($link, $_POST['ID_ARTICLE']);
		$idart = htmlspecialchars($idart);
		
		$qwe = " SELECT * FROM article WHERE ID_ART = '$idart' ";
		$wyn = mysqli_query($link, $qwe);
		$row = mysqli_num_rows($wyn);
		if($row>0){
			$info_art = mysqli_fetch_array($wyn);
		
			echo '<form method="POST" action="edit.php" enctype = "multipart/form-data">';
			echo '<input type = "hidden" name = "IDARTICLE" value = "'.$info_art['ID_ART'].'">';
			echo '<input type = "text" name = "ARTTITLE" VALUE = "'.$info_art['TITLE_ART'].'" style = "width:500;"> <br>';
			echo '<textarea name = "ARTTEXT" style = "height:500; width:1050;">'.$info_art['TEXT_ART'].'</textarea> <br>';
			echo 'Category' ;
			echo '<select name = "CAT">';
	
			$kwerenda = "SELECT * FROM categories";
			$wynik = mysqli_query($link, $kwerenda);
			$rzad = mysqli_num_rows($wynik);
			if($rzad>0){
				while($cat = mysqli_fetch_array($wynik)){
				$cat_id = $cat['ID_CAT'];
				$cat_name = $cat['NAME_CAT'];
				echo "<option value = '$cat_id'> $cat_name </option>";
				}
			}
			echo '</select><br>';
			echo '<img src = "img/'.$info_art['IMG_ART'].'" width = "300" height = "150">';
			echo '<input type = "file" name = "img" style = "width:200;"> <br>';
			echo '<input type = "submit" name = "ED" value = "EDIT">';
			echo '</form>';
		}
	}

	
	if(isset($_POST['ED'])){
	
		$editart = mysqli_real_escape_string($link, $_POST['IDARTICLE']);
		$editart = htmlspecialchars($editart);
			
		$titleart = mysqli_real_escape_string($link, $_POST['ARTTITLE']);
		$titleart = htmlspecialchars($titleart);
			
		$textart = mysqli_real_escape_string($link, $_POST['ARTTEXT']);
		$textart = htmlspecialchars($textart);
		
		$catart = mysqli_real_escape_string($link, $_POST['CAT']);
			
		if(isset($_FILES['img']['tmp_name'])){
			$uploaddir = "img/";
			$tmp = $_FILES['img']['tmp_name'];
			$real = $_FILES['img']['name'];
			if(move_uploaded_file($tmp, $uploaddir.$real)){
				echo 'File uploaded <br>';
				$imgdb = $real;
			}else{
				echo 'Problems';
				$imgdb = '';
			}
			$que = "UPDATE article SET TITLE_ART = '$titleart', TEXT_ART = '$textart', CAT_ART = '$catart', IMG_ART = '$imgdb' WHERE ID_ART = '$editart'";
		}else{

			$que = "UPDATE article SET TITLE_ART = '$titleart', TEXT_ART = '$textart', CAT_ART = '$catart' WHERE ID_ART = '$editart'";
			}
		$res = mysqli_query($link, $que);
			
		if($res){
			echo 'Article edit complete';
			}else{
			echo 'Problem';
		}
	}
	
	
	if(isset($_POST['DELETE'])){
		
		$delart = mysqli_real_escape_string($link, $_POST['ID_ARTICLE']);
		$delart = htmlspecialchars($delart);
		
		$query = "DELETE FROM article WHERE ID_ART = '$delart' ";
		
		$result = mysqli_query($link, $query);
		
		if($result){
			echo 'Article delete complete';
		}else{
			echo 'Problem';
		}
	
	}
	
	echo ' <br> <a href = "teksty.php"> Back </a>';
	
?> 