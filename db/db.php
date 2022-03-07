<?php
	//$conn = mysqli_connect("localhost","root","",);
	
	$dbServername = "localhost";
	$dbUserName = "root";
	$dbPassword = "";
	$dbName = "ubus";	

	$conn = mysqli_connect($dbServername, $dbUserName, $dbPassword, $dbName);