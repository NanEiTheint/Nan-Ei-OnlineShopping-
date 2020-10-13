<?php 
	//echo "Hi";

	session_start();

	unset($_SESSION['loginuser']);
	header("location:login.php");


 ?>