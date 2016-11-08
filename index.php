<?php
	include('login.php');
	include('Dao.php');
	
	if(isset($_SESSION['login_user'])){
		header("location: about.html");
	}
	include_once("index.html");
 ?>
