<?php 
namespace App;

class Autoloader {

    static function register() {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    static function autoload($class) {
        echo $class . "<br>";

        /** On decoupe le namespace **/
        $class = str_replace(__NAMESPACE__ . '\\', "", $class);
        echo $class . "<br>";

        /** On remplace le \ par un / ***/
        $class = str_replace("\\", "/", $class);
        echo $class . "<br>";

        /*** On charge le fichier ***/
        $fichier = __DIR__ . "/" . $class . ".php";

        //On vérifie si le fichier existe
        if(file_exists($fichier)) {
            require_once $fichier;
            echo $fichier;
        } else {
            echo "Ce fichier n'existe pas";
        }
    }
}


?>