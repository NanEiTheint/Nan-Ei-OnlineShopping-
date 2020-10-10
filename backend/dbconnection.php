<?php 
	$servername="localhost";
	$dbname="onlineshopping";
	$dbuser="root";
	$password="";

	$dsn="mysql:host=$servername;dbname=$dbname";
	$pdo=new PDO($dsn,$dbuser,$password);

	try
	{
		$conn=$pdo;
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//echo "Connection success";
	}
	catch(PDOException $e)
	{
		echo "Connection fail:".$e->getMessage();
	}


 ?>