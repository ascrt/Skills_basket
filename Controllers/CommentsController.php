<?php 

namespace App\Controllers;

use App\Core\Form;
use App\Models\ArticlesModel;
use App\Models\CategoryModel;
use App\Models\CommentsModel;

class CommentsController extends Controller {

    public function ajouter(int $id) {

        //Verification si on est connecté
        if(isset($_SESSION['user'])) {

            //Formulaire
            $form = new Form();

            $form->debutForm()
                ->ajoutLabel("Contenu", "Votre commentaire:")
                ->ajoutInput('text', 'content', ['id' => 'content', "placeholder" => "Votre commentaire"])
                ->ajoutBouton('Envoyer')
                ->finForm();

            /*** Affiche toutes les categories ***/
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->readAll();
            
            //Rendu
            $this->render('/comments/ajouter', ["form" => $form->create(), "categories" => $categories]);

            //Traitement du formulaire
            if (Form::validate($_POST, ["content"])) {

                if(strlen($_POST['content']) > 255) {
                    $_SESSION['erreur'] = "Contenu invalide";
                    header('Location: /users/profil');
                    exit;
                }

                $content = $_POST['content'];

                //hydrater
                $comment = new CommentsModel();
                $comment->setContent($content)
                        ->setArticleId($id)
                        ->setUsersId($_SESSION['user']['id']);

               //Envoi vers la base
                $comment->create();

                header('Location: /users/profil');
                exit;
            }

        } else {
            $_SESSION['erreur'] = "Vous devez être connecté pour ajouter des commentaires";
            header('Location: /users/login');
            exit;
        }
    }

    public function afficher(int $id) {

        /** Recuperer l'id de l'article **/
        $articleModel = new ArticlesModel();
        $article = $articleModel->read($id);

        /*** Affiche toutes les categories ***/
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->readAll();

        $commentsModel = new CommentsModel();
        $comments = $commentsModel->joinSQL2($id);

        //Rendu
        $this->render('/comments/afficher', ['comments' => $comments, 'article' => $article, 'categories' => $categories]);
    
    }

}





?>