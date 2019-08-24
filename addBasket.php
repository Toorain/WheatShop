<?php
session_start();

require 'vendor/autoload.php';
require_once 'includes/Autoloader.php';
require_once 'database/show.php';
Autoloader::register();

$id = $_POST['itemId'];
$itemQte = $_POST['itemcount'];
$itemRef = $_POST['itemRef'];
$itemName = $_POST['itemName'];
$img = $_POST['itemImg'];
$price = $_POST['itemPrice'];

$basket = new basket;
$_SESSION['User']['basket'] = $basket->addProduct($id, $itemRef, $itemQte, $img, $price, $itemName);
// $addItemBasket = array_push(, $addBasket);
header("Location: index.php?p=item&ref=" . $itemRef . "&item=added");
