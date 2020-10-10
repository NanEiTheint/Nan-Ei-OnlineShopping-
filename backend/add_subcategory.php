<?php 

	include "dbconnection.php";

	$name=$_POST["name"];
	$category=$_POST["category"];

	//echo "$name and $category";

	$sql="INSERT INTO subcategories
	(name,category_id) VALUES (:subcat_name,:subcat_category)";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":subcat_name",$name);
	$stmt->bindParam(":subcat_category",$category);

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