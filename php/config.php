<?php

	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'examhub';

	//Create connection
	$con = new mysqli($servername,$username,$password,$database);

	//Check connection
	if($con->connect_error){
		die("Connection Failed: ".$con->connect_error);
	}
    
?>