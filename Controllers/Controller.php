<?php 

namespace App\Controllers;

abstract class Controller {

    //Methode qui affiche le rendu sur une vue
    public function render(string $fichier, array $donnees = [], string $template = "default") {

        //On extrait les données du tableau
        extract($donnees);

        //Buffer et template

        /*** debut du buffer ***/
        ob_start();

        /*** chemin vers la vue ***/
        require_once ROOT .'/Views/' . $fichier . '.php';

        /*** Fin du buffer ***/
        $content = ob_get_clean();

        /*** Importation de la base du template ***/
        require_once ROOT . '/Views/' . $template . '.php';

    }

}






?>