<?php 
	session_start();
	session_unset('uname');
	header("location:index.php");
?>