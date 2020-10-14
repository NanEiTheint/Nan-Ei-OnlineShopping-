<?php 
	
	include "dbconnection.php";

	session_start();

	$name=$_POST["name"];
	//echo "$name";
	$profile=$_FILES["profile"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$cpassword=$_POST["cpassword"];
	$phone=$_POST["phone"];
	$address=$_POST["address"];

	//echo "$name and $email and $password and $phone and $address";
	//var_dump($profile);

	$_SESSION['oldname']=$name;
	$_SESSION['oldprofile']=$profile;
	$_SESSION['oldemail']=$email;
	$_SESSION['oldpassword']=$password;
	$_SESSION['oldcpassword']=$cpassword;
	$_SESSION['oldphone']=$phone;
	$_SESSION['oldaddress']=$address;

	$basepath="img/register/";
	$fullpath=$basepath.$profile["name"];
	move_uploaded_file($profile["tmp_name"], $fullpath);



	if($name==null || $email==null || $phone==null || $address==null || $password==null || $cpassword==null || $profile['size']==0)
	{
		if($profile['size']==0)
		{
			$_SESSION['profile_error_msg']="User Profile is required";
		}
		if ($name==null) {
			$_SESSION['name_error_msg']="User Name is required";
		}
		if ($email==null) {
			$_SESSION['email_error_msg']="User Email is required";
		}
		if ($password==null) {
			$_SESSION['password_error_msg']="User password is required";
		}
		if ($cpassword==null) {
			$_SESSION['confirm_password_error_msg']="User confirm password is required";
		}
		if ($phone==null) {
			$_SESSION['phone_error_msg']="User phone is required";
		}
		if ($address==null)
		{
			$_SESSION['address_error_msg']="User address is required";
		}
		header("location:register_create.php");
	}
	elseif($password!=$cpassword)
	{
		$_SESSION['password_error_msg']="Password & confirm password does not math!";
		header("location:register_create.php");
	}
	else
	{

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
			header("location:login.php");
		}
		else
		{
			echo "Error";
		}

		$sql="SELECT * FROM users ORDER BY id DESC LIMIT 1";

		$stmt=$pdo->prepare($sql);
		$stmt->execute();
		$user=$stmt->fetch(PDO::FETCH_ASSOC);

		$user_id=$user['id'];
		$role_id=2;

		$sql="INSERT INTO model_has_roles (user_id,role_id) VALUES (:model_user_id,:model_role_id)";

		$stmt=$pdo->prepare($sql);
		$stmt->bindParam(":model_user_id",$user_id);
		$stmt->bindParam(":model_role_id",$role_id);
		$stmt->execute();
		//echo "$user_id";
		if($stmt->rowCount())
		{
			header("location:login.php");
		}
		else
		{
			echo "Error";
		}


	}

	




 ?>