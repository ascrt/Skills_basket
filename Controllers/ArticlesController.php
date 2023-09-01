<?php 

namespace App\Controllers;

use App\Models\ArticlesModel;

class ArticlesController extends Controller {

    //Methode qui affiche une page listant tout les articles
    public function index() {
        $articleModel = new ArticlesModel();

        $articles = $articleModel->readAll();

        //On envoie le resultat dans une vue
        $this->render('articles/index',['articles' => $articles]);
    }

}



?>