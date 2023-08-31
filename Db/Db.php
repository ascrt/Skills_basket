<?php 

namespace App\Db;
use PDO;
use PDOException;

class Db extends PDO {

    //Propriété

    /** Instace unique de la classe **/
    private static $instance; 

    /** Constante d'environnement **/
    private const DBUSER = "root";
    private const DBHOST = "localhost";
    private const DBNAME = "skills_basket";
    private const DBPASS = "";

    //Constructeur privé
    private function __construct() {

        //DSN de connexion
        $dsn = "mysql:host=". self::DBHOST . ";dbname=" . self::DBNAME;

        //Connexion à la base de données
        try {

            /*** Importation de PDO ***/
            parent::__construct($dsn, self::DBUSER, self::DBPASS);

            /*** Paramètres de PDO ***/
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf-8');
            //Mode de fetch
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            //Transfert d'erreur
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance() {

        //Verifie si l'instance existe si null on instancie db
        if(self::$instance === null) {
            self::$instance = new Db();
        }

        return self::$instance;
    }

}










?>