<?php

use App\Autoloader;
use App\Db\Db;
use App\Models\ArticlesModel;
use App\Models\Model;

require_once "Autoloader.php";
Autoloader::register();

$model = new ArticlesModel();
var_dump($model->readAll());

?>