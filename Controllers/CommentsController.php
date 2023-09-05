<?php 

namespace App\Controllers;

use App\Core\Form;
use App\Models\CategoryModel;

class CommentsController extends Controller {

    public function ajouter() {

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
                
            }

        } else {
            $_SESSION['erreur'] = "Vous devez être connecté pour ajouter des commentaires";
            header('Location: /users/login');
            exit;
        }
    }

}





?>