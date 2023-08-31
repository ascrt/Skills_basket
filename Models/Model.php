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

    //Lire tous les articles
    public function readAll() {
        $query = $this->requete('SELECT * FROM ' . $this->table);
        return $query->fetchAll();
    }

    //Lire les articles par critères
    public function readBy(array $critere) {

        //Critère dans un tableau, ce tableau sera eclaté en 2 tableau(champs et valeur)
        $champs = [];
        $valeurs = [];

        foreach($critere as $champ => $valeur) {
            array_push($champs, "$champ = ?");
            array_push($valeurs, $valeur);
        }

        var_dump($champs, $valeurs);

        //On veut select * from articles where titre = ? and date = 2023-08-31
        $listechamps = implode(' AND ', $champs);
        var_dump($listechamps);

        //On éxécute la requete
        $query = $this->requete('SELECT * FROM ' . $this->table . ' WHERE ' . $listechamps, $valeurs);

        return $query->fetchAll();

    }


    //Lire les articles selon l'id
    public function read(int $id) {
        $query = $this->requete('SELECT * FROM ' . $this->table . ' WHERE id=' . $id);
        return $query->fetch();
    }

    /*** Create ***/

    public function create(Model $model) {

        //On aura 3 tableau
        $champs = [];
        $inter = [];
        $valeurs = [];

        foreach($model as $champ => $valeur) {

            if($valeur != null && $champ != "db" && $champ != 'table') {
                array_push($champs, "$champ");
                array_push($valeurs, $valeur);
                array_push($inter, "?");
            }

            $listechamps = implode(' ,', $champs);
            $listinter = implode(' ,', $inter);

            var_dump($listechamps, $listinter);
            echo "INSERT INTO $this->table ($listechamps) 
            VALUES ($listinter)";
            /**return $this->requete("INSERT INTO $this->table ($listechamps) 
                                    VALUES ($listinter)", $valeurs);**/
        
        }

        var_dump($champs, $valeurs, $inter);

        //On veut insert into articles (..,..,..,) values(?,?, ?)
    }

}


?>