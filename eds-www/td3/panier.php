<?php
session_start();

function initPanier() {
    if(!isset($_SESSION['panier'])){
        $_SESSION['panier'] = array();
    }
}
function ajouterProduit($nomProduit , $quantite) {
    initPanier();
    if (isset($_SESSION['panier']['panier'][$nomProduit]))
    {
        $_SESSION['panier'][$nomProduit]['quantite'] += $quantite;   
     } else {
        $_SESSION ['panier'][$nomProduit] = array('quantite' => $quantite, 'prix' => getPrixProduit($nomProduit));
     }
     echo "Ajout avec succes !!";
}

function getPrixProduit($nomProduit){
    $produits = array('souris' => 10 ,'clavier' => 35, 'ecran' => 250);
    return $produits[$nomProduit];
}


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Produits</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>
    <h1>Gestion des Produits</h1>

    <form method="post">
        <div>
            <label for="nom">Nom du produit :</label>
            <select id="produits" name="nom">
                <option value="0">Choisir un produit</option>
                <option value="souris">Souris</option>
                <option value="clavier">Clavier</option>
                <option value="ecran">Ecran</option>
            </select>
        </div>
       
        <div>
            <label for="quantite">Quantité commandée :</label>
            <input type="number" id="quantite" name="quantite" required>
        </div>
        <div>
            <input type="submit" value="Commander 🛍️" name="commander">
            <input type="submit" value="Affciher 🛒"  name="afficher">
        </div>
        
    </form>
    
    <?php
    if(isset($_POST["commander"])) {
        if(empty($_POST['nom']) || empty($_POST['quantite']))
        echo "veuillez saisir convenablement vos données !!";
    else {
        if($_POST['nom']=="0")
        echo "veuillez saisir un produit!";
    else {
        $nom=$_POST['nom'];
        $qte=$_POST['quantite'];
        ajouterProduit($nom,$qte);
    }
    }
    }
    
    ?>
</body>
</html>
