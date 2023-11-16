<?php


namespace Traitement;

use Controller\UserController;

class UserAction {

  public static function insertUserAction()
  {

    if(isset($_POST['submit'])){
      die("ok");
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $password = htmlspecialchars($_POST['password']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $mdp=password_hash( $password, PASSWORD_DEFAULT);
    
    user1::add_user($firstname, $lastname, $email,$mdp, $phone);
}
  }

}
  //1. RECUPERE LE FORMULAIRE DE D'ENREGISTREMENT ADD_USER.PHP




   //2. RECUPERE  LE FORMULAIRE DE CONNEXION LOGIN.PHP

 if(isset($_POST['login'])){
   
    $password = htmlspecialchars($_POST['password']);
    $email = htmlspecialchars($_POST['email']);

    user1::connexion($email,$password);
  }

   //3. DECONNCTER DANS INDEX.PHP
   /* si l'utilisateur est connecté, tu peux le déconnecter sur ce bouton voir son formulmaire
   dans index,
   */ 
  if (isset($_POST['logout'])){
    session_destroy();
    header("Location: http://localhost/projet_indi/login.php");
  }

   //4.FORMULAIRE ADD_PERMIS.PHP

   if(isset($_POST['enter'])){
    $titre = htmlspecialchars($_POST['titre']);
    $prix = htmlspecialchars($_POST['prix']);
    $description = htmlspecialchars($_POST['description']);
    $img_name=$_FILES['photo']['name'];// on stock dans  $img_name name de l'image(formulaire donc photo) et name (par defaux)

    $img_tmp=$_FILES['photo']['tmp_name'];// stock la destination temporaire de l'image dans le server  cad name de l'image(formulaire donc photo) et name (par defaux)


    // dans htdox: dans le projet dans dossier image : prendre :'\ESPACE_MEMBRES\img'+le nom de 'image
    $destination = $_SERVER['DOCUMENT_ROOT'].'/projet_indi/views/assets/img/'.$img_name;

    move_uploaded_file($img_tmp,$destination);//une fonction qui enregistre l'image dans le dossier img
    permis1::add_permis($titre,$prix,$description,$img_name);
  }

    //  4.FORMULAIRE ADD_CRENEAUX.PHP
  if (isset($_POST['choisir'])) {
    $date = htmlspecialchars($_POST['date']);
    $idPermis = htmlspecialchars($_POST['permis_id']);
    // on récupère le moniteur qui sest connecté qui ahoute son creneaux
    $idUser = htmlspecialchars($_POST["id_user"]);

    creneaux1::add_creneaux($date, $idPermis, $idUser); // Ajout du 4e argument
  }

  //  5.FORMULAIRE ADD 


if (isset($_GET["action"])) {
    if ($_GET["action"] === "reserver" && isset($_GET["id"])) {
        $id_creneaux = $_GET["id"];
        $idEleve = $_SESSION["id_user"];

        // Effectuer ici la réservation du créneau en utilisant creneauxModel
        creneaux1::reserverCreneau($id_creneaux, $idEleve);

        // Redirigez l'utilisateur vers la page de liste des créneaux après la réservation
        header("Location: listecreneaux.php");
        exit;
        
    } elseif ($_GET["action"] === "annuler" && isset($_GET["id"])) {
        $id_creneaux = $_GET["id"];
        $idEleve = $_SESSION["id_user"];

        // Effectuer ici l'annulation du créneau en utilisant creneauxModel
        creneaux1::annulerCreneau($id_creneaux, $idEleve);

        // Redirigez l'utilisateur vers la page de liste des créneaux après l'annulation
        header("Location: listecreneaux.php");
        exit;
    }



}


    // MISE A JOUR DE LISTE PERMIS
   if (isset($_POST['update_permis'])) {
    $id_permis = htmlspecialchars($_POST['id_permis']);
    $titre = htmlspecialchars($_POST['titre']);
    $prix = htmlspecialchars($_POST['prix']);
    $description = htmlspecialchars($_POST['description']);
    $img_name=$_FILES['photo']['name'];// on stock dans   $img_name image et son nom

    $img_tmp=$_FILES['photo']['tmp_name'];// stock la destination temporaire de l'image dans le server  


    // dans htdox: dans le projet dans dossier image : prendre :'\ESPACE_MEMBRES\img'+le nom de 'image
    $destination = $_SERVER['DOCUMENT_ROOT'].'/projet_indi/views/assets/img/'.$img_name;

    move_uploaded_file($img_tmp,$destination);//une fonction qui enregistre l'image dans le dossier img

    // Tu devras également gérer la mise à jour de l'image si nécessaire

    permis1::update_permis($id_permis, $titre, $prix, $description, $img_name);

    // Redirection vers la page listepermis.php après la mise à jour
    header("Location:http://localhost/projet_indi/listePermis.php");
    exit;
}
