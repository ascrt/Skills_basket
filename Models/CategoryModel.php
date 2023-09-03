<?php 

namespace App\Models;

class CategoryModel extends Model {

    //Propriétes
    protected $id;
    protected $category_title;

    //Constructeur
    public function __construct()
    {
        $this->table = 'category';
    }

    //Getter

    public function getId() {
        return $this->id;
    
    }

    public function getCategoryTitle() {
        return $this->category_title;
    }

    //Setter

    public function setId($id):self{
        $this->id = $id;
        return $this;
    }

    public function setCategoryTitle($category_title):self {
        $this->category_title = $category_title;
        return $this;
    }
}


?>