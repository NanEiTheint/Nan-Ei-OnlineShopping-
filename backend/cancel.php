<?php 

	include 'dbconnection.php';

	$id=$_POST['order_id'];

	$sql="DELETE FROM orders WHERE id=:order_id";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":order_id",$id);
	$stmt->execute();

	if($stmt->rowCount())
	{
		header("location:order_list.php");
	}
	else
	{
		echo "Error";
	}

 ?>