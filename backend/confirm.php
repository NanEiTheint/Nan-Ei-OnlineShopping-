<?php 
	
	include 'dbconnection.php';
	$id=$_POST["order_id"];
	//echo "$id";

	$num=1;
	$sql="UPDATE orders SET status=:num WHERE id=:order_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":num",$num);
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