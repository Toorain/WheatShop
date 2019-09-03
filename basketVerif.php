<?php

// Basket content of the session.
if (!empty($_SESSION)) {
	$basketContent = $_SESSION['User']['basket'];
} else {
	$basketContent = [];
}
// Checks if something was added to the basket
$addedToCart = '';
if (isset($_GET['item'])) {
	if ($_GET['item'] == 'added') {
		$addedToCart = 'added';
	} else if ($_GET['item'] == 'notlogged') {
		$addedToCart = 'notlogged';
	} else if ($_GET['item'] == 'updated'){
		$addedToCart = 'updated';
	}
}


//Check if something is deleted from the basket
$itemDelete = false;
if (isset($_GET['item']) && $_GET['item'] === 'delete') {
	$itemDelete = true;
}