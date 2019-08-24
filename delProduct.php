<?php
session_start();

require 'vendor/autoload.php';
require_once 'includes/Autoloader.php';
require_once 'database/show.php';
Autoloader::register();

$ref = $_POST['itemRef'];



$basket = new basket;
$_SESSION['User']['basket'] = $basket->delProduct($ref);

header("Location: index.php?p=basket&item=delete&ref=" . $ref);


