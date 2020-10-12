<?php 
	include "dbconnection.php";

	$id=$_POST["category_id"];

	$sql="DELETE FROM categories WHERE id=:category_id";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":category_id",$id);
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