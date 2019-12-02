<?php 
	session_start();
	$host="localhost";
	$db="fiscaloptima";
	$username="root";
	$pass="";
	
	$conn = new mysqli($host,$username,$pass,$db) ;
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
?>