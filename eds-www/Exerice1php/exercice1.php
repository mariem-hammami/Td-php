<?php
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    if(!empty($nom) && !empty($prenom))
    echo "bonjour $nom $prenom";
    else
    echo "Erreur lors de saisie"
    ?>