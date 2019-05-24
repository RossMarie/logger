<?php
require 'autoload.php';
require 'vendor/autoload.php';
use Ifsnop\Mysqldump as IMysqldump;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
if(!isset($_POST['submit'])) {
	header('Location: index.php');
	exit();
} else {
	require 'autoload.php';
	$name = $_POST['name'];
	$obj = new DeleteUser;
	$obj->delete($name);
	$logger = new Logger('my_logger');
	// Now add some handlers
	$logger->pushHandler(new StreamHandler('log.log', Logger::DEBUG));
	$logger->pushHandler(new FirePHPHandler());
	$logger->info('User deleted');
	try {
	    $dump = new IMysqldump\Mysqldump('mysql:host='.$server.';dbname='.$db, $user, $pwd);
	 	$dump->start('./dump.sql');
	} catch (\Exception $e) {
	    echo 'mysqldump-php error: ' . $e->getMessage();
	}
	header('Location: index.php?succ=deleted');
	exit();
}