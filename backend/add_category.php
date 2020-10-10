<?php 
	include "dbconnection.php";

	$name=$_POST["name"];
	$logo=$_FILES["logo"];

	//echo "$name";
	//print_r($photo);

	$basepath="img/categories/";
	$fullpath=$basepath.$logo["name"];
	move_uploaded_file($logo["tmp_name"], $fullpath);

	$sql="INSERT INTO categories
	(name,logo) VALUES (:cat_name,:cat_logo)";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":cat_name",$name);
	$stmt->bindParam(":cat_logo",$fullpath);

	$stmt->execute();

	if($stmt->rowCount())
	{
		header("location:category_list.php");
	}
	else
	{
		echo "Error";
	}
 ?>