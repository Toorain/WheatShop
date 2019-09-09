<?php 
//Démarrage de la session
session_start();
/**
 * Autoloads connected
 */
require 'vendor/autoload.php';
require_once 'includes/Autoloader.php';
/**
 * Connects and fetch all the database elements
 */
require_once 'database/show.php';
/**
 * Check the connexion status 
 */
require_once 'isLogged.php';
/**
 * Checks the content of basket
 */
require_once 'basketVerif.php';
/**
 * Returns elements of the session
 */
require_once 'session.php';
/**
 * Checks if the pass has been updated
 */
require_once 'isPassUpdated.php';
/**
 * Checks if User is an Admin
 */
require_once 'verifAdmin.php';

// echo '<pre>';
// var_dump($_SESSION['User']);
// echo '</pre>';

$ref = '';
if (isset($_GET['ref'])) {
	$ref = $_GET['ref'];
}
// Rendu de template
$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader, [
	'cache' => false, // __DIR__ . '/tmp'
	'debug' => true,
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

// Check if connected, if so, send session = true to all index.php items
if (strpos($_SERVER['REQUEST_URI'], '/index.php') !== false) {
	$islogged = false;
	if(!empty($_SESSION['User'])){
		$islogged = true;
	}
	$twig->addGlobal('session', $islogged);
}

//Routing
$page = 'home';
if (isset($_GET['p'])) {
	$page = $_GET['p'];
}

switch ($page) {
	case 'home':
	echo $twig->render('Front/home.twig', ['strains' => $data, 'categories' => $cat, 'isAdmin' => $isAdmin]);
	break;
	case 'login':
	echo $twig->render('Front/login.twig', ['connStatus' => $connStatus]);
	break;	
	case 'account':
	echo $twig->render('Front/account.twig', ['session' => $session,
																						'passUpdated' => $passUpdated,
																						'strains' => $data,
																						'isAdmin' => $isAdmin]);
	break;
	case 'basket':
	echo $twig->render('Front/basket.twig', ['strains' => $data,
																					 'basketItems' => $basketContent,
																					 'itemDelete' => $itemDelete,
																					 'addedToCart' => $addedToCart,
																					 'isAdmin' => $isAdmin]);
	break;
	case 'Parfumée':
	echo $twig->render('Front/parfumee.twig', ['strains' => $data]);
	break;
	case 'Belle':
	echo $twig->render('Front/belle.twig', ['strains' => $data]);
	break;
	case 'Gentille':
	echo $twig->render('Front/gentille.twig', ['strains' => $data]);
	break;
	case 'strains':
	echo $twig->render('Front/strains.twig', ['strains' => $data,
																						'isAdmin' => $isAdmin]);
	break;
	case 'item':
	echo $twig->render('Front/item.twig', ['strains' => $data,
																				 'ref' => $ref,
																				 'addedToCart' => $addedToCart,
																				 'isAdmin' => $isAdmin]);
	break;
	case 'register':
	echo $twig->render('Front/register.twig', ['logged' => $logged]);
	break;			
	default:
	echo $twig->render('Front/404.twig');
	break;
}

