<?php

if (!empty($_SESSION)) {
  $session = $_SESSION['User'];
} else {
  session_destroy();
}

