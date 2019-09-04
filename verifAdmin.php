<?php

require_once 'database/show.php';
require_once 'includes/Autoloader.php';
Autoloader::register();

$isAdmin = false;
if (!empty($_SESSION)) {
  foreach ($auth as $value) {
    if ($_SESSION['User']['login'] == $value['login'] 
      && $_SESSION['User']['pass'] == $value['pass']
      && $value['admin'] == 1) {
      $isAdmin = true;
    }
  }
}



