<?php 

	include "dbconnection.php";

	$id=$_POST["brand_id"];

	$sql="DELETE FROM brands WHERE id=:brand_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":brand_id",$id);
	$stmt->execute();
	if($stmt->rowCount())
	{
		header("location:brand_list.php");
	}
	else
	{
		echo "Error";
	}

 ?>