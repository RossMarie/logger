<?php 
include 'nav.php';
require 'dbh.php';
require 'logger.inc.php';
?>

<h1>New Data</h1>
<form action='add.inc.php' method='post'>
	<div class='row'>
		Your Name: <input type='text' name='name' required>
	</div>
	<div class='row'>
		E-Mail: <input type='email' name='email' required>
	</div>
	<div class='row'>
		Country: <select name='country' id='country'>
			<?php
				$sql = 'SELECT * FROM countries';
				$stmt = $db->prepare($sql);
				if(!$stmt) {
					header('Locaiton: add.php?err=sqlerr');
					exit();
				} else {
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($id, $country);
					while($stmt->fetch()) {
						?>
						<option value=<?php echo $id; ?>><?php echo $country; ?>
						<?php
					}
				}
			?>
		</select>
	</div>
		<input type='submit' name='submit' id='submit' value='Add'>
</form>