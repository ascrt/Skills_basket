<?php 

namespace App\Controllers;

use App\Core\Form;
use App\Models\ArticlesModel;
use App\Models\CategoryModel;
use App\Models\CommentsModel;

class ArticlesController extends Controller {

    //Methode qui affiche une page listant tout les articles
    public function index() {
        $articleModel = new ArticlesModel();

        $articles = $articleModel->readAll();

        /*** Affiche toutes les categories ***/
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->readAll();

        //On envoie le resultat dans une vue
        $this->render('articles/index', compact('articles', 'categories'));
    }


    public function single(int $id) {
        
        $articleModel = new ArticlesModel();
        $article = $articleModel->read($id);

        /*** Affiche toutes les categories ***/
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->readAll();

        /*** Afficher les commentaire ***/
        $commentsModel = new CommentsModel();
        $comments = $commentsModel->joinSQL2($id);

        $this->render('/articles/single', compact('article', 'categories', 'comments'));
    }

}



?>