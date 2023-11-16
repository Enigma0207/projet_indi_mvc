<?php

namespace Models\Repository;

use Model\Entity\User;
use Service\Session;

class UserRepository extends BaseRepository
{
   //INSERER DANS LA BDD
    public function insertUser(User $user)
    {
        $sql = "INSERT INTO user (firstname, lastname, role, email, password) VALUES (:firstname, :lastname, :role, :email, :password)";
        $requete = $this->dbConnection->prepare($sql);
        $requete->bindValue(":firstname", $user->getFirstname());
        $requete->bindValue(":lastname", $user->getLastname());
        $requete->bindValue(":role", $user->getRole());
        $requete->bindValue(":email", $user->getEmail());
        $requete->bindValue(":password", $user->getPassword());
        $requete = $requete->execute();
        if ($requete) {
            if ($requete == 1) {
                Session::addMessage("success",  "Le nouvel utilisateur a bien été enregistré");
                return true;
            }
            Session::addMessage("danger",  "Erreur : l'utilisateur n'a pas été enregisté");
            return false;
        }
        Session::addMessage("danger",  "Erreur SQL");
        return null;
    }




}