<?php

class GetUser extends Dbh {

	protected function getInfo() {
		$sql = 'SELECT users.name,users.email,countries.country FROM users JOIN countries ON users.country_id=countries.id';
		$stmt = $this->connect()->query($sql);
		#$result = $stmt->fetchAll( PDO::FETCH_ASSOC);
		while($row = $stmt->fetch()) {
			$datas[] = $row;
		}
		return $datas;
	}

	protected function getInfoEdit() {
		$sql = 'SELECT users.id,users.name,users.email,countries.country FROM users JOIN countries ON users.country_id=countries.id';
		$stmt = $this->connect()->query($sql);
		#$result = $stmt->fetchAll( PDO::FETCH_ASSOC);
		while($row = $stmt->fetch()) {
			$datas[] = $row;
		}
		return $datas;
	}

	protected function getCountries() {
		$sql = 'SELECT * FROM countries';
		$stmt = $this->connect()->query($sql);
		while($row = $stmt->fetch()) {
			$datas[] = $row;
		}
		return $datas;
	}
}