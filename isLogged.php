<?php

$logged = 0;
if (isset($_GET['logs'])) {
	$logs = $_GET['logs'];	
	switch ($logs) {
		case 'missing':
			$logged = 1;
			break;
		case 'registered':
			$logged = 2;
			break;
		case 'wrongPass':
			$logged = 3;
			break;
		default:
			$logged = 0;
			break;
	}
}