<?php

namespace App\Core;

use App\Controllers\MainController;

class Main {

    public function start() {

        /**** Demarrer uns session ****/
        session_start();

        //On retire le dernier slash de l'URL
        $uri = $_SERVER['REQUEST_URI'];
        
        //On verifie que $uri n'est pas vide et se termine par un /
        if(!empty($uri) && $uri != "/" && $uri[-1] === "/") {

            //On retire le /
            $uri =substr($uri, 0, -1);

            //Redirection permanente
            http_response_code(301);

            //Redirection vers l'URL sans le /
            header('Location:' . $uri);
        }

        //Gestion des paramètres on veut : p=controller/methode/paramètre

        //Tableau vide des paramètres
        $params = [];

        if(isset($_GET['p'])) {
            $params = explode('/', $_GET['p']);
        }

        //On verifie si on a au moins un paramètre
        if($params[0] != '') {

            //On a un paramètre, on récupère le nom du controller , le nom à une majuscule en 1er
            //Ensuite on ajoute le namespace et le controller
            //Puis on enlève 1er élément du tableau
            
            $controller = '\\App\\Controllers\\' . ucfirst(array_shift($params)) . 'Controller';

            //On instancie le controller
            $controller = new $controller();

            //2èmè paramètre

            //Action(Methode) si on a une action on recupère le 2ème paramètre
            //Sinon l'action sera index

            $action = (isset($params[0])) ? array_shift($params) : 'index';

            //On verifie si la méthode existe dans le controller

            if(method_exists($controller, $action)) {

                //Si il reste des paramètres on les passe à la methode
                (isset($params[0])) ? call_user_func_array([$controller, $action], $params) : $controller->$action();

            } else {
                http_response_code(404);
                echo "La page recherché n'existe pas";
            }

        } else {

            //Pas de paramètre on instancie le controller par defaut
            $controller = new MainController();

            //On appelle index
            $controller->index();

        } 


    }

}


?>