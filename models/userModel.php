<?php
require_once "database.php";

//1. CLASS USER
class user1
{

  //1.1 METHODE D'INSCRIPTION
  public static function add_user($firstname, $lastname, $email, $password, $phone)
  {
    //apl à la bdd
    $db = Database::dbConnect();
    //request d'insertion à la bdd
    $request = $db->prepare("INSERT INTO user (firstname,lastname, email,password,phone) VALUES (?,?,?,?,?)");
    try {
      // execution de la request
      $request->execute(array($firstname, $lastname, $email, $password, $phone));
      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }

  }
  //1.2 METHODE DE CONNEXION, on a besoin de $email,$password

  public static function connexion($email, $password)
  {
    //  connection à la bdd ::pck c'est une class qui encapsula la bdd
    $db = Database::dbConnect();
    //  prépare la request, séléctionne tout de la bale user où la valeur du mail est?
    $request = $db->prepare("SELECT * FROM user WHERE email =?");

    try {
      $request->execute(array($email));
      // récupere le résultat de la request dans un tableau stock le dans $user
      $user = $request->fetch();

      if (empty($user)) {
        // si l'email envoyé n'est pas reconnu
        //   affiche ce message d'erreur dans  $_SESSION["error"] 
        $_SESSION["error"] = "user inconnu"; //  rédiriger vers login.php
        header("Location: http://localhost/projet_indi/login.php");

        // vérifie si le mdp soumis est celui qui a généré lé hachage
      } else if (password_verify($password, $user["password"])) {
        // si oui,
        /* on stock dans $_SESSION["role_user"],le rôle de celui qui est connecté $user["role"]  
        on stock dans $_SESSION["id_user"],l'id de celui qui est connecté $user["id_user"] */
        $_SESSION["role_user"] = $user["role"];
        $_SESSION["id_user"] = $user["id_user"];

        // Redirection en fonction du rôle de celui qui se connecte

        // si c'est admin qui est connecté, va à la page add_permis.php, affiche message ...admin 
        if ($_SESSION["role_user"] == "admin") {
          header("Location: http://localhost/projet_indi/add_permis.php");
          $_SESSION["success_message"] = "Bienvenue cher Admin!";

        } else if ($_SESSION["role_user"] == "élève") {
          header("Location: http://localhost/projet_indi/listeCreneaux.php ");
          $_SESSION["success_message"] = "Bienvenue cher Elève!";


        } else if ($_SESSION["role_user"] == "moniteur") {
          header("Location: http://localhost/projet_indi/add_creneaux.php");
          $_SESSION["success_message"] = "Bienvenue cher Moniteur!";
        }
      } else {
        // créér une session error si le mdp est incorrect
        $_SESSION["erreur_message"] = "mot de passe incorrect";
        //  rediriger vers login.php
        header("Location: ./login.php");

      }
      return $user;

    } catch (PDOException $e) {
      echo $e->getMessage();
    }

  }

  //1.3 METHODE D'AFFICHAGE liste USER

  public static function listUser()
  {
    //   se connecter
    $db = Database::dbConnect();
    //  request, sélectionnes toutes les colonne de la table user 

    $request = $db->prepare("SELECT * FROM user");

    //    Exécute la requête SQL préparée
    try {
      $request->execute();

      /* récupère dans un tableau associatif le resultat de la request dans  $listuser et sera appelé dans 
      listeUser.php pour affichage des users
      */
      $listuser = $request->fetchALL();
      //   return $listuser qui stock les valeur du tableau cad les utilisateurs 
      return $listuser;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }


  }

}