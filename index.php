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

require 'inc/dbh.php';
include 'inc/getinf.inc.php';
include 'inc/show.inc.php';
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
		$show = new ShowUser;
		$show->showInfo()
		?>
	</table>
</body>
</html>