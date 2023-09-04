<?php 

namespace App\Controllers;

use App\Core\Form;

class UsersController extends Controller {

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

        //rendu
        $this->render('users/login', ['loginForm' => $form->create()]);
    }

}




?>