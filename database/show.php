<?php 

include 'database/dblogin.php';
// On recupere tout le contenu de la table 
$tab = $conn->query('SELECT * FROM Strain');
$tab1 = $conn->query('SELECT * FROM Category');

// On affiche le resultat
$data = $tab->fetchAll(PDO::FETCH_ASSOC);
$cat = $tab1->fetchAll(PDO::FETCH_ASSOC);
