<?php

namespace Controller;

use Controller\BaseController;

class UserController extends BaseController 
{
    //1.1 METHODE D'INSCRIPTION
    public function add_user($firstname, $lastname, $email, $password, $phone)
    {
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
