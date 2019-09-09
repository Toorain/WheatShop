<?php
session_start();
require_once 'database/show.php';
require_once 'includes/Autoloader.php';
Autoloader::register();

$auth;
$mail = $_POST['mail'];
$pass = $_POST['pass'];

$user = new user($auth, $mail, $pass);
$userVerif = $user->verifAutorisation($mail, $pass);

/**
 * If user is allowed to be connected, we pass it's credetials in session.
 */
if ($userVerif) {
    $_SESSION['User']['login'] = $user->_login;
    $_SESSION['User']['pass'] = $user->_mdp;
    $_SESSION['User']['name'] = $user->_name;
    $_SESSION['User']['basket'] = $user->_basket;
    header('Location: index.php');
} else {
    header('Location: index.php?p=login&conn=failed');
}


