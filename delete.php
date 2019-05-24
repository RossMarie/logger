<?php
if(!isset($_POST['submit'])) {
	header('Location: index.php');
	exit();
} else {
	require 'logger.inc.php';
	include 'inc/dbh.php';
	include 'inc/delete.inc.php';
	$name = $_POST['name'];
	$obj = new DeleteUser;
	$obj->delete($name);
	$logger->info('User deleted');
	header('Location: index.php?succ=deleted');
	exit();
}