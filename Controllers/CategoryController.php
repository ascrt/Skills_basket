<?php 

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends Controller {

    public function index() {
        echo "Categories";
    }


    public function tirs($id) {
        
        $categorieModel = new CategoryModel();
        $articlesTir = $categorieModel->joinSQL($id);

        /*** Affiche toutes les categories ***/
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->readAll();
        
        //rendu
        $this->render('/category/tirs', compact('articlesTir', 'categories'));
    }

    public function finitions() {
        
        $categorieModel = new CategoryModel();
        $articlesAtkCercle = $categorieModel->joinSQL(2);

        /*** Affiche toutes les categories ***/
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->readAll();
        
        //rendu
        $this->render('/category/Finitions', compact('articlesAtkCercle', 'categories'));
    }
}


?>