<?php 

namespace App\Models;

class ArticlesModel extends Model {

    //Constructeur
    public function __construct()
    {
        //On déclare le nom de la table
        $this->table = "articles";
    }
}

?>