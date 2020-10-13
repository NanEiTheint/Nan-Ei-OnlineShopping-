<?php 

	include "dbconnection.php";

	$id=$_POST["id"];
	$name=$_POST["name"];
	$logo=$_FILES["logo"];
	$fullpath=$_POST["oldlogo"];

	//echo "$id and $name and $fullpath";

	if($logo["size"]>0)
	{
		$basepath="img/categories/";
		$fullpath=$basepath.$logo["name"];
		move_uploaded_file($logo["tmp_name"], $fullpath);
	}

	$sql="UPDATE categories SET name=:category_name,logo=:category_logo WHERE id=:category_id";

	$stmt=$pdo->prepare("$sql");

	$stmt->bindParam(":category_name",$name);
	$stmt->bindParam(":category_logo",$fullpath);
	$stmt->bindParam(":category_id",$id);

	$stmt->execute();

	header("location:category_list.php");


 ?>