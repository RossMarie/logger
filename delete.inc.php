<?php
if(!isset($_POST['submit'])) {
	header('Location: index.php');
	exit();
} else {
	require 'dbh.php';
	require 'logger.inc.php';
	$name = $_POST['name'];
	echo $name;
	$sql = 'DELETE FROM users WHERE users.name=?';
	$stmt = $db->prepare($sql);
	$stmt->bind_param('s', $name);
	$stmt->execute();
	$logger->info('User deleted');
	header('Location: index.php?succ=deleted');
	exit();
	$db->close();
}