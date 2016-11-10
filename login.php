<?php
	require_once("Dao.php");
	session_start(); // Starting Session
	$dao = new Dao();
	//$_SESSION("error")=''; // Variable To Store Error Message
	if(isset ($_SESSION["logged_in"]) && $_SESSION["logged_in"]){
		header("Location: about.html");
	}
	if (isset($_POST['submit'])) {
	}
	if (empty($_POST['email'])){
		$_SESSION["error"] = "Username field must be filled";
	} 
	else if (empty($_POST['password'])) {
		$_SESSION["error"] = "Password field must be filled";
	}
	else
	{
	//Define $username and $password
		$email=$_POST['email'];
		$password=$_POST['password'];

 //To protect MySQL injection for Security purpose
		//$username = stripslashes($username);
		//$password = stripslashes($password);
		//$username = mysql_real_escape_string($username);
		//$password = mysql_real_escape_string($password);
		$row = $dao->checkUser($email, $password);
		if($row){
			header("Location: about.html");
			$_SESSION["logged_in"] = 1;
		}
		else{
			echo ("Username or password is incorrect");
			$_SESSION["logged_in"] =0;
			header("Location: index.html");
		}
	}
?>