<?php 

	include "dbconnection.php";

	$id=$_POST["id"];

	$name=$_POST["name"];
	$photo=$_FILES["photo"];
	$fullpath=$_POST["oldphoto"];

	//echo "$name and $oldphoto and $id";

	if($photo["size"]>0)
	{
		$basepath="img/brands/";
		$fullpath=$basepath.$photo["name"];
		move_uploaded_file($photo["tmp_name"], $fullpath);
	}
	
	$sql="UPDATE brands SET name=:brand_name,photo=:brand_photo WHERE id=:brand_id";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":brand_name",$name);
	$stmt->bindParam("brand_photo",$fullpath);
	$stmt->bindParam("brand_id",$id);

	$stmt->execute();

	header("location:brand_list.php");

 ?>