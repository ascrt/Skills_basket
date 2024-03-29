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
            ->ajoutLabel("mail", "E-mail:")
            ->ajoutInput("mail", "mail", ['id'=> 'email'])
            ->ajoutLabel("password", "Password:")
            ->ajoutInput("password", "password",['id' => 'password'])
            ->ajoutBouton('Connexion')
            ->finForm();
        
        /*** Affiche toutes les categories ***/
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->readAll();
        
        //rendu
        $this->render('users/login', ['loginForm' => $form->create(), 'categories' => $categories]);

        //Traitement du formulaire

        if(Form::validate($_POST,['mail', "password"])) {

            $userModel = new UsersModel();

            $userArray = $userModel->userByMail(strip_tags($_POST['mail']));

            //si l'utilisateur n'existe pas 
            if(!$userArray) {
                $_SESSION['erreur'] = "L'adresse mail et/ou le mot de passe est incorrect";
                header('Location: /users/login');
                exit;
            }

            //L'utilisateur existe
            $user = $userModel->hydrate($userArray);

            if(password_verify($_POST['password'], $user->getPassword())) {

                //Mot de passe correct
                //On crée la session
                $user->setSession();
                header('Location: /users/profil');
            } else {
                $_SESSION['erreur'] = "L'adresse mail et/ou le mot de passe est incorrect";
                header('Location: /users/login');
                exit;
            }

        }

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
            ->ajoutInput('password', "password2",['id' => 'password2'])
            ->ajoutBouton("S'inscrire")
            ->finForm();

        $this->render('users/register', ["registerForm" => $form->create(), 'categories' => $categories]);

        /*** Traitement du formulaire ***/

        if (Form::validate($_POST, ['pseudo','mail', 'password', 'password2'])) {
                
            //Verification du pseudo
            if(strlen($_POST['pseudo']) > 32 || strlen($_POST['pseudo']) < 1){
                $_SESSION['erreur'] = "Votre pseudo est invalide";
                header('Location: /users/register');
                exit;
            }

            $pseudo = $_POST['pseudo'];

            //Verification du mail
            if(strlen($_POST['mail']) > 64 || filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) === false) {
                $_SESSION['erreur'] = "Votre mail est invalide";
                header('Location: /users/register');
                exit;
            }

            /*** Nettoyage du mail contre les failles XSS et injection SQL */
            $mail = strip_tags($_POST['mail']);
                
            /**** Validation du mot de passe ***/
            if(strlen($_POST['password']) < 8) {
                $_SESSION['erreur'] = "Le mot de passe doit avoir au moins 8 caractères";
                header('Location: /users/register');
                exit;
            }

            if($_POST['password'] !== $_POST['password2']) {
                $_SESSION['erreur'] = "Les mots de passe sont différents";
                header('Location: /users/register');
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

            //Redirection 
            header('Location: /users/success');

        }
    }

    public function success() {

         /*** Affiche toutes les categories ***/
         $categoryModel = new CategoryModel();
         $categories = $categoryModel->readAll();

        $this->render('/users/success', ['categories' => $categories]);
    }

    public function profil() {

        if(!isset($_SESSION['user'])) {
            header('Location: /users/login');
            exit;
        }
        
        /*** Affiche toutes les categories ***/
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->readAll();

        /*** Affiche l'utilisateur ***/
        $usersModel = new UsersModel();
        $user = $usersModel->userByMail(strip_tags($_SESSION['user']['mail']));

        $this->render('users/profil', ['categories' => $categories, 'user' => $user]);

    }

    //Modifier le pseudo 
    public function modifier(int $id) {

        /*** Affiche toutes les categories ***/
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->readAll();

        /*** Affiche les valeurs d'utilisateur ***/
        $userModel = new UsersModel();
        $user = $userModel->read($id);

        /*** Formulaire ***/
        $form = new Form(); 
        $form->debutForm()
        ->ajoutLabel('pseudo', "Nouveau Pseudo")
        ->ajoutInput("text", "pseudo", ['id' => 'pseudo', 'value' => $user->pseudo ])
        ->ajoutLabel('mail', "Votre email")
        ->ajoutInput('mail', "mail",['id' => 'mail', 'value' => $user->mail ])
        ->ajoutLabel('password', "Mot de passe")
        ->ajoutInput('password', "password",['id' => 'password', 'value' => $user->password])
        ->ajoutLabel('password2', "Saisir à nouveau le mot de passe")
        ->ajoutInput('password', "password2",['id' => 'password2'])
        ->ajoutBouton('Modifier')
        ->finForm();
        
        //Rendu
        $this->render('users/modifier', ['categories' => $categories, 'user' => $user, 'form' => $form->create()]);

        
        //Traitement du formulaire
        if (Form::validate($_POST, ['pseudo','mail', 'password', 'password2'])) {
                
            //Verification du pseudo
            if(strlen($_POST['pseudo']) > 32 || strlen($_POST['pseudo']) < 1){
                $_SESSION['erreur'] = "Votre pseudo est invalide";
                header('Location: /users/profil');
                exit;
            }

            $pseudo = $_POST['pseudo'];

            //Verification du mail
            if(strlen($_POST['mail']) > 64 || filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) === false) {
                $_SESSION['erreur'] = "Votre mail est invalide";
                header('Location: /users/profil');
                exit;
            }

            /*** Nettoyage du mail contre les failles XSS et injection SQL */
            $mail = strip_tags($_POST['mail']);
                
            /**** Validation du mot de passe ***/
            if(strlen($_POST['password']) < 8) {
                $_SESSION['erreur'] = "Le mot de passe doit avoir au moins 8 caractères";
                header('Location: /users/profil');
                exit;
            }

            if($_POST['password'] !== $_POST['password2']) {
                $_SESSION['erreur'] = "Les mots de passe sont différents";
                header('Location: /users/profil');
                exit;
            }

            //On hash le mot de passe
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            //On hydrate l'user
            $userModel->setPseudo($pseudo)
                ->setMail($mail)
                ->setPassword($password);

            //On envoie à la base de données
            $userModel->update($id);

            //Redirection 
            header('Location: /users/success');

        }
    }

    public function logout() {
        unset($_SESSION['user']);
        header('Location: /users/login');
        exit;

    }

        

}




?>