<?php 

namespace App\Models;

class CommentsModel extends Model {

    //Propriétes
    protected $id;
    protected $content;
    protected $date;
    protected $article_id;
    protected $users_id;

    //Constructeur
    public function __construct()
    {
        $this->table = 'comments';
    }

    //Getter
    public function getId() {
        return $this->id;
    }

    public function getContent() {
        return $this->content;
    }

    public function getDate() {
        return $this->date;
    }

    public function getArticleId() {
        return $this->article_id;
    }

    public function getUsersId() {
        return $this->users_id;
    }

    //Setter
    public function setId($id): self {
        $this->id = $id;
        return $this;
    }

    public function setContent($content): self {
        $this->content = $content;
        return $this;
    }

    public function setDate($date): self {
        $this->date = $date;
        return $this;
    }

    public function setArticleId($article_id): self {
        $this->article_id = $article_id;
        return $this;
    }

    public function setUsersId($users_id): self {
        $this->users_id = $users_id;
        return $this;
    }

    //Methode
    
    public function joinSQL2(int $id) {
       $query = $this->requete("SELECT comments.content, comments.date, users.pseudo, articles.id FROM comments INNER JOIN users 
                        ON comments.users_id = users.id
                        INNER JOIN articles
                        ON comments.article_id = articles.id
                        WHERE article_id = $id");

        return $query->fetchAll();
    }

}
?>