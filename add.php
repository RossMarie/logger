<?php 
include 'nav.php';
require 'autoload.php';
/*require 'inc/dbh.php';
require 'inc/getinf.inc.php';
require 'inc/show.inc.php';
require 'logger.inc.php';*/
?>

<h1>New Data</h1>
<form action='addch.php' method='post'>
	<div class='row'>
		Your Name: <input type='text' name='name' required>
	</div>
	<div class='row'>
		E-Mail: <input type='email' name='email' required>
	</div>
	<div class='row'>
		Country: <select name='country' id='country'>
			<?php
				$show = new ShowUser;
				$show->showCountries();
			?>
		</select>
	</div>
		<input type='submit' name='submit' id='submit' value='Add'>
</form>