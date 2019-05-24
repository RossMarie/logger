<?php

class NewUser extends Dbh {

	public function addUser($name, $email, $country) {
		$sql = 'INSERT INTO users (name, email, country_id) VALUES (?, ?, ?)';
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$name, $email, $country]);
	}
}