<?php
require 'autoload.php';
require 'vendor/autoload.php';
use Ifsnop\Mysqldump as IMysqldump;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
if(!isset($_POST['submit'])) {
	header('Locaiton: edit.php');
	exit();
} else {
	require 'autoload.php';
	$id = (int)$_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];

	$obj = new EditUser;
	$obj->update($id, $email, $name);
	$logger = new Logger('my_logger');
	// Now add some handlers
	$logger->pushHandler(new StreamHandler('log.log', Logger::DEBUG));
	$logger->pushHandler(new FirePHPHandler());
	$logger->info('User info edited');
	try {
	    $dump = new IMysqldump\Mysqldump('mysql:host='.$server.';dbname='.$db, $user, $pwd);
	 	$dump->start('./dump.sql');
	} catch (\Exception $e) {
	    echo 'mysqldump-php error: ' . $e->getMessage();
	}
	header('Location: edit.php?suss=1');
	exit();
}