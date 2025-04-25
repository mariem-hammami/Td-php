<?php
header('Content-Type: text/html; charset=uf-8');
require_once("ListeEvenements.php");
$e1 = new Evenement("Concret de Jazz" , "2025-05-10","Theatre de Bizerte");
$e2 = new Evenement("Atelier de peinture" , "2025-06-01","Centre culture");
$e3 = new Evenement("Conference PHP " , "2025-06-15","Université de Bizerte");

$liste = new ListeEvenements();
$liste->ajouterEvenement($e1);
$liste->ajouterEvenement($e2);
$liste->ajouterEvenement($e3);

echo "--Liste des evenements ---<br>";
$liste->afficherTous();
?>
