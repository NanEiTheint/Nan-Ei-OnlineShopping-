<?php 
	
	include "dbconnection.php";

	$id=$_POST["item_id"];

	$sql="DELETE FROM items WHERE items.id=:item_id";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":item_id",$id);
	$stmt->execute();
	if($stmt->rowCount())
	{
		header("location:item_list.php");
	}
	else
	{
		echo "Error";
	}

 ?> 
 