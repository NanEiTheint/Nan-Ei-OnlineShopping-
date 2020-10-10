<?php 
	include "dbconnection.php";

	$name=$_POST["name"];
	$photo=$_FILES["photo"];

	//echo "$name";
	//print_r($photo);

	$basepath="img/brands/";
	$fullpath=$basepath.$photo["name"];
	echo "$fullpath";
	move_uploaded_file($photo["tmp_name"], $fullpath);

	$sql="INSERT INTO brands
	(name,photo) VALUES (:brand_name,:brand_photo)";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":brand_name",$name);
	$stmt->bindParam(":brand_photo",$fullpath);

	$stmt->execute();
	if ($stmt->rowCount()) 
	{
		header("location:brand_list.php");
	}
	else
	{
		echo "Error";
	}


 ?>