<?php
session_start();
require_once 'includes/Autoloader.php';
Autoloader::register();


$mail = $_POST['mail'];
$pass = $_POST['pass'];

$user = new user($mail, $pass);
$userVerif = $user->verifAutorisation();

if ($userVerif) {
    $_SESSION['User']['login'] = $user->_login;
    $_SESSION['User']['pass'] = $user->_mdp;
    $_SESSION['User']['name'] = $user->_name;
    $_SESSION['User']['basket'] = $user->_basket;
    header('Location: index.php');
} else {
    header('Location: index.php?p=login&conn=failed');
}


