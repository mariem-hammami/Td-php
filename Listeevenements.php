<?php
require_once("evenement.php");
class ListeEvenements {
    private $evenements =array();

    public function ajouterEvenement(Evenement $e) {
        $this->evenements[] =$e;
    }

    public function afficherTous(){
        if(empty($this->evenements)) {
            echo "Aucun evenement à afficher.<br>";
        } else {
            echo '<ul> style="list-style-type: none; padding-left: 20px;">';
            foreach ($this->evenements as $e) {
                $e->afficher();
            }
            echo "</ul>";
        }
    }
}