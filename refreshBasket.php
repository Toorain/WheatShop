<?php
session_start();

require 'vendor/autoload.php';
require_once 'includes/Autoloader.php';
require_once 'database/show.php';
Autoloader::register();

$ref = $_POST['itemRef'];
$qte = $_POST['itemqte'];

$basket = new basket;
$_SESSION['User']['basket'] = $basket->refreshProduct($ref, $qte);

header("Location: index.php?p=basket&item=updated");