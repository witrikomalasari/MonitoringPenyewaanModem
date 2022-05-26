<?php
	$dbHost = 'localhost';
	$dbUser = 'root';
	$dbPass = '';
	$dbName = 'monitoring';

	$con =new mysqli($dbHost,$dbUser,$dbPass,$dbName);

	if($con->connect_error) {
		die ('gagal:'.$con->connect_error);
	}	
?>  