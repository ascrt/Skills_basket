<?php 

namespace App\Models;

class ArticlesModel extends Model {

    //Propriétes
    protected $id;
    protected $title;
    protected $content;
    protected $date;
    protected $category_id;

    //Constructeur
    public function __construct()
    {
        //On déclare le nom de la table
        $this->table = "articles";
    }
}

?>