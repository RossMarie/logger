<?php 
if(!isset($_POST['submit'])) {
	header('Location: add.php');
	exit();
} else {
	require 'inc/dbh.php';
	require 'inc/add.inc.php';
	require 'logger.inc.php';
	$name = $_POST['name'];
	$email = $_POST['email'];
	$country = (int)$_POST['country'];

	$obj = new NewUser;
	$obj->addUser($name, $email, $country);
	$logger->info('New user added');
	header('Location: add.php?succ=1');
	exit();

}