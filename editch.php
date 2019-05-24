<?php
if(!isset($_POST['submit'])) {
	header('Locaiton: edit.php');
	exit();
} else {
	require 'inc/dbh.php';
	require 'inc/edit.inc.php';
	require 'logger.inc.php';
	$id = (int)$_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];

	$obj = new EditUser;
	$obj->update($id, $email, $name);
	$logger->info('User info edited');
	header('Location: edit.php?suss=1');
	exit();
}