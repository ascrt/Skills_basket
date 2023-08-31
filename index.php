<?php

use App\Autoloader;
use App\Db\Db;
use App\Models\ArticlesModel;
use App\Models\Model;

require_once "Autoloader.php";
Autoloader::register();

$data = [
    "title" => "Titre 3",
    "content" => "Contenu",
    "categoryId" => 2
];

$model = new ArticlesModel();
$article = $model->hydrate($data);
$model->create($article);


?>