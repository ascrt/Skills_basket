<?php 

namespace App\Models;

class CommentsModel extends Model {

    //Propriétes
    protected $id;
    protected $content;
    protected $date;
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
    public function getUsersId() {
        return $this->users_id;
    }

    //Setter
    public function setId($id): self {
        $this->id = $id;
        return $this;
    }
    public function setContent($content): self {
        $this->id = $content;
        return $this;
    }
    public function setDate($date): self {
        $this->id = $date;
        return $this;
    }
    public function setUsersId($users_id): self {
        $this->id = $users_id;
        return $this;
    }
}
?>