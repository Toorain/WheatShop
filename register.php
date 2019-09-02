<?php

require_once 'vendor/autoload.php';
require_once 'includes/Autoloader.php';
require_once 'database/show.php';

$connexion = $conn;
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$login = $_POST['login'];
$city = $_POST['city'];
$pass = $_POST['password'];
$passCheck = $_POST['passwordCheck'];

$database = new database;
if ($pass == $passCheck) {
  $scanDatabase = $database->scanDatabase($auth, $lastName, $login);
  $createEntry = $database->createEntry($conn, $firstName, $lastName, $login, $pass, $city);
} else {
  header('Location: index.php?p=register&logs=wrongPass');
}


