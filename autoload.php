<?php
spl_autoload_register(function($class) {
	$filename = $class.'.inc.php';

	if(!file_exists($filename)) {
		$filename = 'inc/'.$class.'.inc.php';
	}

	include $filename;
});