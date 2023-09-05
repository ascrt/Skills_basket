<?php 

namespace App\Controllers;

use App\Models\ArticlesModel;
use App\Models\CategoryModel;
use App\Core\Form;

class AdminController extends Controller {

    public function index() {
        //Verification isAdmin
        if($this->isAdmin()) {

            /*** Affiche tout les articles ***/
            $articlesModel = new ArticlesModel();
            $articles = $articlesModel->readAll();

            /*** Affiche toutes les categories ***/
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->readAll();

            //rendu
            $this->render('admin/index', ["categories" => $categories, "articles" => $articles]);
        }
    }

    public function articles() {
        //Verification isAdmin
        if($this->isAdmin()) {

            /*** Affiche tout les articles ***/
            $articlesModel = new ArticlesModel();
            $articles = $articlesModel->readAll();

            /*** Affiche toutes les categories ***/
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->readAll();

            //rendu
            $this->render('admin/articles', ["categories" => $categories, "articles" => $articles]);
        }

    }

    /*** Ajouter un articles ***/

    public function ajouter() {

        /*** Affiche toutes les categories ***/
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->readAll();

        if($this->isAdmin()) {

            //Formulaire 
            $form = new Form();
            $form->debutForm()
                ->ajoutLabel("title", "Titre:")
                ->ajoutInput("text", "title", ['id' => 'title'])
                ->ajoutLabel("content", "Contenu:")
                ->ajoutTextarea('content','',['id' => 'content'])
                ->ajoutLabel('catgories', "Categorie:")
                ->ajoutSelect('categorie', ["1" => "Tir", "2" => "Finitions", "3" => "Dribble"], ['id' => "categories"])
                ->ajoutBouton("Créer")
                ->finForm();

            $this->render('admin/ajouterArticle', ['ajoutForm' => $form->create(), "categories" => $categories]);

            //Traitement du formulaire

            if (Form::validate($_POST, ["title", "content", "categorie"])) {


                //Verification du titre
                if(strlen($_POST['title']) > 64){
                    $_SESSION['erreur'] = "Titre invalide";
                    header('Location: /admin/ajouter');
                }

                //Variable pour hydrater
                $title = $_POST['title'];
                $content = $_POST['content'];
                $category_id = intval($_POST['categorie']);
                
                /** hydratation **/
                $articlesModel = new ArticlesModel();
                $articlesModel->setTitle($title)
                            ->setContent($content)
                            ->setCategoryId($category_id);

                //Envoie vers la base
                $articlesModel->create();

                //Redirection
                header('Location: /admin/articles');

            }
        }

    }


    /**** Modifier un article ****/
    public function modifier(int $id) {

        if($this->isAdmin()) {

            /*** Affiche toutes les categories ***/
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->readAll();

            $articlesModel = new ArticlesModel();
            $article = $articlesModel->read($id);

            //Formulaire 
            $form = new Form();
            $form->debutForm()
                ->ajoutLabel("title", "Titre:")
                ->ajoutInput("text", "title", ['id' => 'title', 'value' => $article->title])
                ->ajoutLabel("content", "Contenu:")
                ->ajoutTextarea('content',$article->content ,['id' => 'content'])
                ->ajoutLabel('catgories', "Categorie:")
                ->ajoutSelect('categorie', ["1" => "Tir", "2" => "Finitions", "3" => "Dribble"], ['id' => "categories"])
                ->ajoutBouton("Modifier")
                ->finForm();
            
            $this->render('admin/modifierArticle', ['modiForm' => $form->create(), 'article' => $article, 'categories' => $categories]);

        }

    }



    /**** Supprimer un article ****/
    public function supprimer(int $id) {

        if ($this->isAdmin()){

            $article = new ArticlesModel();
            $article->delete($id);

            $_SESSION['message'] = "Article supprimé";
            header("Location: /admin");
        }

    }

    //On verifie si un user connecté à le role admin
    private function isAdmin() {

        if(isset($_SESSION['user']) && $_SESSION['user']['role'] == "Admin") {
            return true;

        } else {
            $_SESSION['erreur'] = "Vous n'avez accès à cette zone";
            header('Location: /');
            exit;
        }
    }


}


?>