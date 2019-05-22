<?php
$server = "localhost";
$user = "root";
$pwd = '';
$database = 'logger';
$db = new mysqli($server, $user, $pwd, $database);
	if(mysqli_connect_errno()) {
		echo "Connection issues!<br />";
		exit;
	}