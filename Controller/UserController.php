<?php

namespace Controller;

use Controller\BaseController;
use Models\Entity\User;
use Models\Repository\UserRepository;
use Form\UserHandleRequest;

class UserController extends BaseController 
{
    //1.1 METHODE D'INSCRIPTION
    public function add_user()
    {

        //dans cette classe (UserController),execute la méthode 'render'(en provenance de BaseController) avec paramettre une chaine de caractère :add_user.php
        $this->render("add_user.php");

    }

    //1.2 METHODE DE CONNEXION, on a besoin de $email,$password

    public function connexion($email, $password)
    {
        $this->render("login.php");
    }


    //1.3 METHODE D'AFFICHAGE liste USER

    public function listUser()
    {
        $this->render("listeUser.php");
    }

}

