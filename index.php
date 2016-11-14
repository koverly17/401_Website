<?php
	include_once("index.html");
	if(isset($_SESSION['login_user'])){
		header("location: about.html");
	}
 ?>
