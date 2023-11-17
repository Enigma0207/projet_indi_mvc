<?php

namespace Form;

use Model\Entity\User;
use Model\Repository\UserRepository;

class UserHandleRequest extends BaseHandleRequest
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
    }

    public function handleForm(User $user)
    {
        if ($this->isSubmitted()) {
            $errors = [];

            // Vérification de la validité du formulaire
            $firstname = $_POST['firstname'] ?? '';
            $lastname = $_POST['lastname'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $role = $_POST['niveau'] ?? ''; // Assurez-vous que 'niveau' est le bon champ

            // Validation du prénom
            if (empty($firstname) || strlen($firstname) < 2 || strlen($firstname) > 30) {
                $errors[] = "Le prénom doit avoir entre 2 et 30 caractères.";
            }

            // Validation du nom de famille
            if (!empty($lastname)) {
                if (strlen($lastname) < 2) {
                    $errors[] = "Le nom de famille doit avoir au moins 2 caractères.";
                }
                if (strlen($lastname) > 30) {
                    $errors[] = "Le nom de famille ne peut avoir plus de 30 caractères.";
                }
            }

            // Validation du téléphone
            if (empty($phone)) {
                $errors[] = "Le téléphone ne peut pas être vide.";
            }
            if (strlen($phone) < 2 || strlen($phone) > 13) {
                $errors[] = "Le téléphone doit avoir entre 2 et 13 caractères.";
            }

            // Validation de l'email
            if (empty($email)) {
                $errors[] = "L'email ne peut pas être vide.";
            }
            if (strlen($email) < 2 || strlen($email) > 13) {
                $errors[] = "L'email doit avoir entre 2 et 13 caractères.";
            }

            // Validation du mot de passe
            if (empty($password)) {
                $errors[] = "Le mot de passe ne peut pas être vide.";
            }

            if (empty($errors)) {
                // Aucune erreur, donc on peut enregistrer l'utilisateur

                // Settez les propriétés de l'utilisateur à partir des données du formulaire
                $user->setFirstname($firstname);
                $user->setLastname($lastname);
                $user->setPhone($phone);
                $user->setEmail($email);
                $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
                $user->setRole($role);

                // Enregistrez l'utilisateur dans la base de données
                $this->userRepository->save($user);

                // Redirigez l'utilisateur vers une autre page ou affichez un message de succès
                // header("Location: index.php"); // Remplacez index.php par la page souhaitée
                // exit();
            } else {
                // Il y a des erreurs, stockez-les pour les afficher dans le formulaire
                $this->setEerrorsForm($errors);
            }
        }
    }

    public function handleUpdate($id)
    {
        // Logique pour la mise à jour d'un utilisateur
    }
}
