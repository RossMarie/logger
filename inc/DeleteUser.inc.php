<?php

class DeleteUser extends Dbh {

	public function delete($name) {
		$sql = 'DELETE FROM users WHERE users.name=?';
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$name]);
	}
}