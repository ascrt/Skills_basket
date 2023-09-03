<?php 

namespace App\Controllers;

use App\Models\CategoryModel;

class MainController extends Controller {

    public function index() {

        /*** Affiche toutes les categories ***/
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->readAll();

        $this->render('/main/index', ["categories" => $categories]);

    }
}







?>