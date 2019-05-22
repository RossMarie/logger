<?php 
if(!isset($_POST['submit'])) {
	header('Location: add.php');
	exit();
} else {
	require 'dbh.php';
	require 'logger.inc.php';
	$name = $_POST['name'];
	$email = $_POST['email'];
	$country = (int)$_POST['country'];

	$sql = 'INSERT INTO users (name, email, country_id) VALUES (?, ?, ?)';
	$stmt = $db->prepare($sql);
	$stmt->bind_param('ssi', $name, $email, $country);
	$stmt->execute();
	$logger->info('New user added');
	header('Location: add.php?succ=1');
	exit();
	$db->close();

}