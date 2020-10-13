<?php 

	include "dbconnection.php";

	$id=$_POST["id"];
	$name=$_POST["name"];
	$category=$_POST["category"];

	//echo "$id and $name and $category";

	$sql="UPDATE subcategories SET name=:subcat_name,category_id=:subcat_category WHERE id=:subcat_id";

	$stmt=$pdo->prepare("$sql");
	$stmt->bindParam(":subcat_name",$name);
	$stmt->bindParam(":subcat_category",$category);
	$stmt->bindParam(":subcat_id",$id);
	$stmt->execute();

	header("location:subcategory_list.php");


 ?>