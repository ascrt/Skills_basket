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

    //Getter
    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }
    public function getContent() {
        return $this->content;
    }
    public function getDate() {
        return $this->date;
    }
    public function getCategoryId() {
        return $this->category_id;
    }

    //Setter
    public function setId($id): self {
        $this->id = $id;
        return $this;
    
    }
    public function setTitle($title): self {
        $this->title= $title;
        return $this;
    
    }
    public function setContent($content): self {
        $this->content = $content;
        return $this;
    
    }
    public function setCategoryId($category_id): self {
        $this->category_id = $category_id;
        return $this;
    
    }
    
}

?>