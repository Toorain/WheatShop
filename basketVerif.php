<?php

// Basket content of the session.
if (!empty($_SESSION)) {
	$basketContent = $_SESSION['User']['basket'];
} else {
	$basketContent = [];
}
// Checks if something was added to the basket
$addedToCart = false;
if (isset($_GET['item'])) {
	$addedToCart = true;
}

//Check if something is deleted from the basket
$itemDelete = false;
if (isset($_GET['item']) && $_GET['item'] === 'delete') {
	$itemDelete = true;
}