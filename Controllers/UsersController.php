<?php 

namespace App\Controllers;

use App\Core\Form;
use App\Models\CategoryModel;
use App\Models\UsersModel;

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

            /*** Traitement de formulaire ***/

            if(Form::validate($_POST, ['pseudo','email', 'password', 'password2'])) {

                //Verification du pseudo
                if(strlen($_POST['pseudo']) > 32 || strlen($_POST['pseudo']) < 1){
                    $_SESSION['erreur'] = "Votre pseudo est invalide";
                    header('Location: /users/register');
                    exit;
                }

                $pseudo = $_POST['pseudo'];

                //Verification du mail
                if(strlen($_POST['mail']) > 64 && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) === false) {
                    $_SESSION['erreur'] = "Votre mail est invalide";
                    header('Location: /user/register');
                    exit;
                }

                /*** Nettoyage du mail contre les failles XSS et injection SQL */
                $mail = strip_tags($_POST['mail']);
                
                /**** Validation du mot de passe ***/
                if(strlen($_POST['password']) < 8) {
                    $_SESSION['erreur'] = "Le mot de passe doit avoir au moins 8 caractères";
                    header('Location: users/register');
                    exit;
                }

                if($_POST['password'] !== $_POST['password2']) {
                    $_SESSION['erreur'] = "Les mots de passe sont différents";
                    header('Location: users/register');
                    exit;
                }

                //On hash le mot de passe
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                //On hydrate l'user
                $userModel = new UsersModel();
                $userModel->setPseudo($pseudo)
                    ->setMail($mail)
                    ->setPassword($password);

                //On envoie à la base de données
                $userModel->create();

                

            }
    }

    public function success() {

         /*** Affiche toutes les categories ***/
         $categoryModel = new CategoryModel();
         $categories = $categoryModel->readAll();

        $this->render('/users/success', ['categorie' => $categories]);
    }

        

}




?>