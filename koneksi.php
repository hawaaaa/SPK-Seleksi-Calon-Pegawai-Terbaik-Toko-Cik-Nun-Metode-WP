<?php
	@session_start();
	$_SESSION['judul'] = '';
	$_SESSION['welcome'] = '';
	$_SESSION['by'] = '';
	$mysqli = new mysqli('localhost','root','','spk-wp');
	if($mysqli->connect_errno){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
?>
