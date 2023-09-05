<?php 

namespace App\Controllers;

use App\Models\CategoryModel;

class AdminController extends Controller {

    public function index() {
        //Verification isAdmin
        if($this->isAdmin()) {

            /*** Affiche toutes les categories ***/
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->readAll();

            //rendu
            $this->render('admin/index', ["categories" => $categories]);
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