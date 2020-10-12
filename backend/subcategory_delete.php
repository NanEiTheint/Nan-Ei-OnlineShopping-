<?php 

	include "dbconnection.php";

	$id=$_POST["subcat_id"];

	$sql="DELETE FROM subcategories WHERE id=:subcat_id";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":subcat_id",$id);
	$stmt->execute();
	if($stmt->rowCount())
	{
		header("location:subcategory_list.php");
	}
	else
	{
		echo "Error";
	}
 ?>