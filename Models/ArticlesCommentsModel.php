<?php 

namespace App\Models;

class ArticlesCommentsModel extends Model {

    protected $id;
    protected $comments_id;
    protected $article_id;

    public function __construct()
    {
        $this->table = "articles_comments";
    }

    //Getter
    public function getId() {
        return $this->id;
    }
    public function getCommentsId() {
        return $this->comments_id;
    }
    public function getArticleId() {
        return $this->article_id;
    }

    //Setter

    public function setId($id): self {
        $this->id = $id;
        return $this;
    }
    public function setCommentsId($comments_id): self {
        $this->comments_id = $comments_id;
        return $this;
    }
    public function setArticleId($article_id): self {
        $this->article_id = $article_id;
        return $this;
    }


}




?>