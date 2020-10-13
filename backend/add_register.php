<?php 
	
	include "dbconnection.php";

	$name=$_POST["firstname"].$_POST["lastname"];
	$profile=$_FILES["profile"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$phone=$_POST["phone"];
	$address=$_POST["address"];

	//echo "$name and $email and $password and $phone and $address";
	//var_dump($profile);

	$basepath="img/register/";
	$fullpath=$basepath.$profile["name"];
	move_uploaded_file($profile["tmp_name"], $fullpath);

	$sql="INSERT INTO users(name,profile,phone,address,email,password) VALUES(:user_name,:user_profile,:user_phone,:user_address,:user_email,:user_password)";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":user_name",$name);
	$stmt->bindParam(":user_profile",$fullpath);
	$stmt->bindParam(":user_phone",$phone);
	$stmt->bindParam(":user_address",$address);
	$stmt->bindParam(":user_email",$email);
	$stmt->bindParam(":user_password",$password);

	$stmt->execute();
	if($stmt->rowCount())
	{
		header("location:index.php");
	}
	else
	{
		echo "Error";
	}




 ?>