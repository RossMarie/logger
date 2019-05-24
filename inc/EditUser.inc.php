<?php

class EditUser extends Dbh {


	public function update($id, $email, $name) {
		$sql = 'UPDATE users SET name=? , email=? WHERE id=?';
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$name, $email, $id]);
	}
}