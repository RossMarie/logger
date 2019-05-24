<?php

class ShowUser extends GetUser {

	public function showInfo() {
		$datas = $this->getInfo();
		foreach($datas as $data) {
			$user = $data['name'];
			$email = $data['email'];
			$country = $data['country'];
			?>
				<form action='delete.php' method='post'>
					<tr>
						<?php echo "<td><input type='text' class='hid' name='name' value='".$user."' readonly></td>"; ?>
						<?php echo "<td><input type='text' class='hid' name='email' value='".$email."' readonly></td>"; ?>
						<?php echo "<td><input type='text' class='hid' name='country' value='".$country."' readonly></td>"; ?>
						<td><input type="submit" name="submit" value='Delete'></td>
					</tr>
				</form>

			<?php
		}
	}
	public function showInfoEdit() {
		$datas = $this->getInfoEdit();
		foreach($datas as $data) {
			$id = $data['id'];
			$user = $data['name'];
			$email = $data['email'];
			$country = $data['country'];
			?>
				<form action='editch.php' method='post'>
					<tr>
						<?php echo "<td><input type='text' name='name' value='".$user."' ></td>"; ?>
						<?php echo "<td><input type='text' name='email' value='".$email."' ></td>"; ?>
						<?php echo "<td><input type='text' class='hid' name='country' value='".$country."' readyonly></td>"; ?>
						<td><input type="submit" name="submit" value='Edit'></td>
						<?php echo "<td><input type='text' class='none' name='id' value='".$id."' hidden></td>"; ?>
					</tr>
				</form>
			<?php
		}
	}
	public function showCountries() {
		$datas = $this->getCountries();
		foreach($datas as $data) {
			$country = $data['country'];
			$id = $data['id'];
			?>
				<option value=<?php echo $id; ?>><?php echo $country; ?>
			<?php
		}
	}
}