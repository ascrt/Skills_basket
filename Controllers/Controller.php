<?php 

namespace App\Controllers;

abstract class Controller {

    //Methode qui affiche le rendu sur une vue
    public function render(string $fichier, array $donnees = [], string $template = "default") {

        //On extrait les données du tableau
        extract($donnees);

        //Buffer et template
        

    }

}






?>