<?php 
	
	session_start();
	include "backend/dbconnection.php";

	$note=$_POST["note"];
	$total=$_POST["totalPrice"];
	$shopArr=$_POST["shopArr"];

	$userid=$_SESSION["loginuser"]["id"];
	//echo "$userid";

	date_default_timezone_set("Asia/Yangon");
	$orderdate=date("Y-m-d");

	$voucher=strtotime(date("h:i:s"));

	//echo "$orderdate and $voucher";

	$status=0;

	$sql="INSERT INTO orders(orderdate,voucherno,total,note,status,user_id) VALUES(:order_date,:order_voucherno,:order_total,:order_note,:order_status,:order_user_id)";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":order_date",$orderdate);
	$stmt->bindParam(":order_voucherno",$voucher);
	$stmt->bindParam(":order_total",$total);
	$stmt->bindParam(":order_note",$note);
	$stmt->bindParam(":order_status",$status);
	$stmt->bindParam(":order_user_id",$userid);

	$stmt->execute();

	$sql="SELECT * FROM orders ORDER BY id DESC LIMIT 1";
	$stmt=$pdo->prepare($sql);
	$stmt->execute();
	$order=$stmt->fetch(PDO::FETCH_ASSOC);

	$orderid=$order['id'];
	 //echo "$orderid";

	foreach ($shopArr as $item) 
	{
		$sql="INSERT INTO item_order(qty,item_id,order_id) VALUES (:itemorder_qty,:itemorder_item_id,:itemorder_order_id)";

		$stmt=$pdo->prepare($sql);

		var_dump($shopArr);

		$stmt->bindParam(":itemorder_qty",$item["qty"]);
		$stmt->bindParam(":itemorder_item_id",$item["id"]);
		$stmt->bindParam(":itemorder_order_id",$orderid);

		$stmt->execute();
	}

	




 ?>