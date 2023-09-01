<?php

//Constante du dossier parent

use App\Autoloader;
use App\Core\Main;

define('ROOT', dirname(__DIR__));

//Importation de l'autoloader
require_once ROOT.'/Autoloader.php';
Autoloader::register();

//Appel du router
$app = new Main();

//On démarre l'application
$app->start();

?>