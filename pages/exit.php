<?php 

	require "../include/db.php";
	ob_start();
	unset($_SESSION['logged_user']);
	session_destroy();
	header("location: /");

?>