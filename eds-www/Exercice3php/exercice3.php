<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire produit</title>
</head>
<body>
    <form action= exercice3.php method="POST" >
        <label>nom</label><input type="text" name="nom"><br>
        <label>quantite</label><input type="text" name="quantite"><br>
        <label>Pu</label><input type="text" name="Pu"><br>
        <button typr="submit" name="Ajouter">Ajouter</button>
        <button typr="submit" name="Afficher">Afficher</button>
    </form>
    </body>
</html>


<?php
session_start();
function Ajouter($t) {
    global $_SESSION;
    if(!isset($_SESSION["produits"]) $_SESSION["produits"]=array());
    if(!empty($_POST["nom"])&& !empty($_POST["quantite"])&& !empty($_POST["Pu"])) {
        $nom=$_POST["nom"] ;
        $quantite=$_POST["quantite"];
        $Pu=$_POST["Pu"] ;
        $produit=array($nom =>array($quantite,$Pu));
        array_push($t, $produit);
        echo "ajout avec succes ";
    }
    else echo " veuillez remplir vos champs  " ; 
    if(isset$_POST["ajouter"]){
        Ajouter($_SESSION["produits"]);
}
}

