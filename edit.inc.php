<?php
if(!isset($_POST['submit'])) {
	header('Locaiton: edit.php');
	exit();
} else {
	require 'dbh.php';
	require 'logger.inc.php';
	$id = (int)$_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$sql = 'UPDATE users SET name=? WHERE id=?';
	$stmt = $db->prepare($sql);
	$stmt->bind_param('si', $name, $id);
	$stmt->execute();
	$sql = 'UPDATE users SET email=? WHERE id=?';
	$stmt = $db->prepare($sql);
	$stmt->bind_param('si', $email, $id);
	$stmt->execute();
	$logger->info('User info edited');
	header('Location: edit.php?suss=1');
	exit();
	$db->close();
}