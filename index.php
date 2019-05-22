<?php

require 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

// Create the logger
$logger = new Logger('my_logger');
// Now add some handlers
$logger->pushHandler(new StreamHandler('log.log', Logger::DEBUG));
$logger->pushHandler(new FirePHPHandler());

require 'dbh.php';
include 'nav.php';
?>



	<table>
		<tr>
			<th>User name</th>
			<th>E-Mail</th>
			<th>Country</th>
			<th></th>
			<th></th>
		</tr>
		<?php
		$sql = 'SELECT users.name,users.email,countries.country FROM users JOIN countries ON users.country_id=countries.id';
		$stmt = $db->prepare($sql);
		if(!$stmt) {
			header('Location: index.php?err=sqlerr');
			exit();
		} else {
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($user, $email, $country);
			while($stmt->fetch()) { 
				?>
				<form action='delete.inc.php' method='post'>
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
		$db->close();
		?>
	</table>
</body>
</html>