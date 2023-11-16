<?php

namespace Form; //pour spécifier que la classe

use Service\Session;
use Model\Entity\User;
use Model\Repository\UserRepository;


class UserHandleRequest extends BaseHandleRequest
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository  = new UserRepository;
    }

    public function handleForm(User $user)
    {
        if (isset($_POST['submit'])) {

            extract($_POST);
            $errors = [];

            // Vérification de la validité du formulaire
            //NOM
            if (!empty($firstname)) {
                if (strlen($firstname) < 2) {
                    $errors[] = "Le firstname doit avoir au moins 2 caractères";
                }
                if (strlen($firstname) > 30) {
                    $errors[] = "Le firstname ne peut avoir plus de 30 caractères";
                }
            }
            if (!empty($lastname)) {
                if (strlen($lastname) < 2) {
                    $errors[] = "Le lastname doit avoir au moins 2 caractères";
                }
                if (strlen($lastname) > 30) {
                    $errors[] = "Le lastname ne peut avoir plus de 30 caractères";
                }
            }
            //PHONE
            if (empty($phone)) {
                $errors[] = "Le phone ne peut pas être vide";
            }
            if (strlen($phone) < 2) {
                $errors[] = "Le phone doit avoir au moins 2 caractères";
            }
            if (strlen($phone) > 13) {
                $errors[] = "Le phone ne peut avoir plus de 13 caractères";
            }
            //email
            if (empty($email)) {
                $errors[] = "Le email ne peut pas être vide";
            }
            if (strlen($email) < 2) {
                $errors[] = "Le email doit avoir au moins 2 caractères";
            }
            if (strlen($email) > 13) {
                $errors[] = "Le email ne peut avoir plus de 13 caractères";
            }

              //password
            if (empty($password)) {
                $errors[] = "Le password de passe ne peut pas être vide";
            }

            if (empty($errors)) {
                $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
                $user->setFirstname($firstname);
                $user->setLastname($lastname);
                $user->setLastname($email);
                return true;
            }

            $this->setEerrorsForm($errors);
        }

            // if (!strpos($pseudo, " ") === false) {
            //     $errors[] = "Les espaces ne sont pas autorisés pour le pseudo";
            // }

            // Est-ce que le pseudo existe déjà dans la bdd ?

            // $requete = $this->userRepository->findByPseudo($pseudo);
            // $requete = $this->userRepository->findByAttributes($user, ["pseudo" => $pseudo]);
            // if ($requete) {
            //     $errors[] = "Le pseudo existe déjà, veuillez en choisir un nouveau";
            // }

            
    }

    public function handleUpdate($id)
    {
    }
}