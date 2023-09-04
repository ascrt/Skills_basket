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

    public function getRole():array {
        $role = $this->role;
        $role[] = "ROLE_USER";
        return array_unique($role);

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
        $this->role = json_decode($role);
        return $this;
    }

    //Mehodes
    //Session utilisateur
    public function setSession() {
        $_SESSION['user'] = [
            'id' => $this->id,
            'mail' => $this->mail,
            'role' => $this->role
        ];
    }

}





?>