<?php 

namespace App\Models;

class UsersModel extends Model {

    //Propriétés
    protected $id;
    protected $pseudo;
    protected $mail;
    protected $password;
    protected $role;

    //Constructeur
    public function __construct()
    {
        $this->table = "users";
        $this->role = "User";
    }

    //Getter
    public function getId() {
        return $this->id;
    }

    public function getPseudo() {
        return $this->pseudo;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }

    //Setter
    public function setId($id):self{
        $this->id = $id;
        return $this;
    }

    public function setPseudo($pseudo):self{
        $this->pseudo = $pseudo;
        return $this;
    }

    public function setMail($mail):self{
        $this->mail = $mail;
        return $this;
    }

    public function setPassword($password):self{
        $this->password = $password;
        return $this;
    }

    public function setRole($role): self {
        $this->role = $role;
        return $this;
    }

    //Mehodes

    //Session utilisateur
    public function setSession() {
        $_SESSION['user'] = [
            'id' => $this->id,
            'pseudo' => $this->pseudo,
            'mail' => $this->mail,
            'role' => $this->role
        ];
    }

    //Recuperer un user avec son email
    public function userByMail(string $mail) {
        return $this->requete("SELECT * FROM $this->table WHERE mail = ?", [$mail])->fetch(); 
    }




}





?>