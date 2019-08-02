<?php 
require 'vendor/autoload.php';
require_once 'database/show.php';
require_once 'includes/Autoloader.php';
Autoloader::register();
//Démarrage de la session
session_start();

//Routing
$page = 'home';
if (isset($_GET['p'])) {
	$page = $_GET['p'];
}

$ref = '';
if (isset($_GET['ref'])) {
	$ref = $_GET['ref'];
}

// Rendu de template
$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader, [
	'cache' => false, // __DIR__ . '/tmp'
]);

// Check if connected, if so, send session = true to all index.php items
if (strpos($_SERVER['REQUEST_URI'], '/index.php') !== false) {
	$islogged = false;
	if(!empty($_SESSION['User'])){
		$islogged = true;
	}
	$twig->addGlobal('session', $islogged);
}

switch ($page) {
	case 'home':
	echo $twig->render('Front/home.twig', ['strains' => $data, 'categories' => $cat]);
	break;
	case 'login':
	echo $twig->render('Front/login.twig', ['getLogin' => $page]);
	break;	
	case 'account':
	echo $twig->render('Front/account.twig');
	break;
	case 'basket':
	echo $twig->render('Front/basket.twig', ['strains' => $data]);
	break;
	case 'Sativa':
	echo $twig->render('Front/sativa.twig', ['strains' => $data]);
	break;
	case 'Indica':
	echo $twig->render('Front/indica.twig', ['strains' => $data]);
	break;
	case 'Hybrid':
	echo $twig->render('Front/hybrid.twig', ['strains' => $data]);
	break;
	case 'strains':
	echo $twig->render('Front/strains.twig', ['strains' => $data]);
	break;
	case 'item':
	echo $twig->render('Front/item.twig', ['strains' => $data, 'ref' => $ref]);
	break;			
	default:
	echo $twig->render('Front/404.twig');
	break;
}

