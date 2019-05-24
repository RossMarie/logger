<?php 
require 'autoload.php';
require 'vendor/autoload.php';
use Ifsnop\Mysqldump as IMysqldump;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
if(!isset($_POST['submit'])) {
	header('Location: add.php');
	exit();
} else {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$country = (int)$_POST['country'];

	$obj = new NewUser;
	$obj->addUser($name, $email, $country);
	$logger = new Logger('my_logger');
	// Now add some handlers
	$logger->pushHandler(new StreamHandler('log.log', Logger::DEBUG));
	$logger->pushHandler(new FirePHPHandler());
	$logger->info('New user added');
	$user = 'root';
	$pwd = '';
	$server = 'localhost';
	$db = 'logger';
	try {
	    $dump = new IMysqldump\Mysqldump('mysql:host='.$server.';dbname='.$db, $user, $pwd);
	 	$dump->start('./dump.sql');
	} catch (\Exception $e) {
	    echo 'mysqldump-php error: ' . $e->getMessage();
	}

	header('Location: add.php?succ=1');
	exit();

}