<?php 

namespace App\Models;
use App\Db\Db;

class Model extends Db {

    //Nom de la table de la base de données 
    protected string $table;

    //Appel de db
    private $db;

    //Methode pour les requetes SQL
    public function requete(string $sql, array $attributs = null) {
        
        //Instance de db
        $this->db = Db::getInstance();
        
        //Verifie si il y a des attributs
        if($attributs !== null) {

            //Requete préparé
            $query = $this->db->prepare($sql);
            $query->execute($attributs);

            return $query;

        } else {

            //Requete simple
            return $this->db->query($sql);
        }
    }

    //CRUD

    /*** Read ***/
    public function readAll() {
        $query = $this->requete('SELECT * FROM ' . $this->table);
        return $query->fetchAll();
    }


}


?>