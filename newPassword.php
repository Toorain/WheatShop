<?php
session_start();
require_once 'database/dblogin.php';
require_once 'database/show.php';
require_once 'includes/Autoloader.php';

if (!empty($_SESSION)) {
  $conn;
  $auth;
  $mail = $_SESSION['User']['login'];
  $oldPass = $_SESSION['User']['pass'];
  $newPass = $_POST['newPass'];

  $user = new user($auth, $mail, $oldPass);
  $newPass = $user->changePassword($conn, $mail, $oldPass, $newPass);
}


