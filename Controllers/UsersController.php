<?php 

namespace App\Controllers;

use App\Core\Form;
use App\Models\CategoryModel;

class UsersController extends Controller {


    //Login
    public function login() {

        //Formulaire de login
        $form = new Form();
        $form->debutForm()
            ->ajoutLabel("email", "E-mail:")
            ->ajoutInput("email", "email", ['id'=> 'email'])
            ->ajoutLabel("password", "Password:")
            ->ajoutInput("password", "password",['id' => 'password'])
            ->ajoutBouton('Connexion')
            ->finForm();

        //Traitement du formulaire
        
        /*** Affiche toutes les categories ***/
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->readAll();

        //rendu
        $this->render('users/login', ['loginForm' => $form->create(), 'categories' => $categories]);
    }

    //Inscription
    public function register() {

        /*** Affiche toutes les categories ***/
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->readAll();

        /*** Formulaire ***/
        $form = new Form();

        $form->debutForm()
            ->ajoutLabel('pseudo', "Votre Pseudo")
            ->ajoutInput("text", "pseudo", ['id' => 'pseudo'])
            ->ajoutLabel('mail', "Votre email")
            ->ajoutInput('mail', "mail",['id' => 'mail'])
            ->ajoutLabel('password', "Mot de passe")
            ->ajoutInput('password', "password",['id' => 'password'])
            ->ajoutLabel('password2', "Saisir à nouveau le mot de passe")
            ->ajoutInput('password2', "password2",['id' => 'password2'])
            ->ajoutBouton("S'inscrire")
            ->finForm();

            $this->render('users/register', ["registerForm" => $form->create(), 'categories' => $categories]);

    }

        

}




?>