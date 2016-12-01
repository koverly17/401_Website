<?php

	session_start(); // Starting Session
	require_once('Dao.php');
	$dao = new Dao();
	$_SESSION["error"]=''; // Variable To Store Error Message
	if (isset($_POST['submit'])) {
		}
	if (empty($_POST['email']) || empty($_POST['password'])) {
		$_SESSION["error"] = "Username or Password is invalid";
		header("Location: newmember.html");
	}
	else
	{
// Define $username and $password
	$email=$_POST['email'];
	$password=$_POST['password'];
	$row =$dao->checkEmail($email);
	if($row){
		echo("Email already in use");	
		header("Location: newmember.html");
	}
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo("Please enter a valid email");
		header("Location: newmember.html");
	}
// To protect MySQL injection for Security purpose
	else{
		$password = password_hash($password, PASSWORD_BCRYPT);
		$dao->saveInfo($email, $password);
		header("Location: index.html");
	}
}
?>