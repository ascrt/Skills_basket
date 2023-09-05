<?php 

namespace App\Models;
use App\Core\Db;

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

    /******** CRUD *********/

    /*** READ ***/

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


    //Jointure SQL 

    public function joinSQL(int $id ) {
        $query = $this->requete("SELECT * FROM articles
                LEFT JOIN category
                ON articles.category_id = category.id 
                WHERE category.id = $id");
        
        return $query->fetchAll();
            
    }

    /*** CREATE ***/

    public function create() {

        //On aura 3 tableau
        $champs = [];
        $inter = [];
        $valeurs = [];

        foreach($this as $champ => $valeur) {
            //On veut insert into articles (..,..,..,) values(?,?, ?)
            if($valeur != null && $champ != "db" && $champ != 'table') {
                array_push($champs, "$champ");
                array_push($valeurs, $valeur);
                array_push($inter, "?");
            }
        }

        //var_dump($champs, $valeurs, $inter);
        $listechamps = implode(' ,', $champs);
        $listinter = implode(' ,', $inter);

        //var_dump($listechamps, $listinter);
        /**echo "INSERT INTO $this->table ($listechamps) 
        VALUES ($listinter)";**/
        /*return $this->requete("INSERT INTO $this->table ($listechamps) 
                                VALUES ($listinter)", $valeurs);**/
    }

    //Methode pour hydrater un objet
    public function hydrate($donnees) {

        
        foreach($donnees as $key => $value) {

            //Recupère le setter correspondant à la clé
            $setter = 'set' . ucfirst($key);

            //verifie si le setter existe
            if(method_exists($this,$setter)) {
                //Si la methode existe
                $this->$setter($value);
            }
        }

        return $this;
    }

    /*** UPDATE ***/

    public function update(int $id) {

        //Initialisation des tableau champs et valeurs
        $champs = [];
        $valeurs = [];

        foreach($this as $champ => $valeur) {
            
            //On veut update articles title = ?, content = ? where id = ?
            if($valeur != null && $champ != 'db' && $champ != 'table') {
                array_push($champs, "$champ = ?");
                array_push($valeurs, $valeur);
            } 
        }

        //On ajoute l'id au tableau de valeurs
        array_push($valeurs, $id);
        //var_dump($champs, $valeurs);

        $listechamps = implode(', ', $champs);
        /**var_dump($listechamps);**/
        
        return $this->requete("UPDATE $this->table SET $listechamps WHERE id = ?", $valeurs);
        //echo "UPDATE $this->table SET $listechamps WHERE id = ?";
    }

    /*** DELETE ***/
    public function delete(int $id) {
        return $this->requete("DELETE FROM $this->table WHERE id = ?", [$id]);
    }


}


?>