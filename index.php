<?php 
require 'vendor/autoload.php';
require_once 'database/show.php';
require_once 'includes/Autoloader.php';
Autoloader::register();
//Démarrage de la session
session_start();
echo '<pre>';
var_dump($_SESSION['User']);
echo '</pre>';
// Basket content of the session.
if (!empty($_SESSION)) {
	$basketContent = $_SESSION['User']['basket'];
}
// Checks if something was added to the basket
$addedToCart = false;
if (isset($_GET['item'])) {
	$addedToCart = true;
}

//Check if something is deleted from the basket
if (isset($_GET['item']) && $_GET['item'] === 'delete') {
	$itemDelete = true;
}


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
	echo $twig->render('Front/home.twig', ['strains' => $data, 'categories' => $cat]);
	break;
	case 'login':
	echo $twig->render('Front/login.twig', ['getLogin' => $page]);
	break;	
	case 'account':
	echo $twig->render('Front/account.twig');
	break;
	case 'basket':
	echo $twig->render('Front/basket.twig', ['strains' => $data, 'basketItems' => $basketContent, 'itemDelete' => $itemDelete ]);
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
	echo $twig->render('Front/item.twig', ['strains' => $data, 'ref' => $ref, 'addedToCart' => $addedToCart ]);
	break;			
	default:
	echo $twig->render('Front/404.twig');
	break;
}

