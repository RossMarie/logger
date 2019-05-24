<?php

class Dbh {
	private $server;
	private $user;
	private $pwd;
	private $database;

	protected function connect() {
		$this->server = "localhost";
		$this->user = "root";
		$this->pwd = "";
		$this->database = "logger";

		$dsn = "mysql:host=".$this->server.";dbname=".$this->database;
		$pdo = new PDO($dsn, $this->user, $this->pwd);
		return $pdo;
	}

	public function __destruct() {
		$this->pdo = null;
	}

}
/* $server = "localhost";
$user = "root";
$pwd = '';
$database = 'logger';
$db = new mysqli($server, $user, $pwd, $database);
	if(mysqli_connect_errno()) {
		echo "Connection issues!<br />";
		exit;
	}
	*/