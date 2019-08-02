<?php 

include 'database/dblogin.php';
// On recupere tout le contenu de la table 
$tabStrain = $conn->query('SELECT * FROM Strain');
$tabCategory = $conn->query('SELECT * FROM Category');
$tabAuth = $conn->query('SELECT * FROM Auth');

// On affiche le resultat
$data = $tabStrain->fetchAll(PDO::FETCH_ASSOC);
$cat = $tabCategory->fetchAll(PDO::FETCH_ASSOC);
$auth = $tabAuth->fetchAll(PDO::FETCH_ASSOC);