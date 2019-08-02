<?php
session_start();
require_once 'includes/Autoloader.php';
Autoloader::register();


$mail = $_POST['mail'];
$pass = $_POST['pass'];

$user = new user($mail, $pass, $name);
$userVerif = $user->verifAutorisation();

if ($userVerif) {
    $_SESSION['User']['login'] = $mail;
    $_SESSION['User']['pass'] = $pass;
    $_SESSION['User']['name'] = $name;
    header('Location: index.php');
} else {
    header('Location: index.php?p=login&conn=failed');
}


