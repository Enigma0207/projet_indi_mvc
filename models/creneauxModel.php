<?php
// session_start();
require_once "database.php";

class creneaux1{

    

    
    public static function add_creneaux($date, $idPermis, $idMoniteur)
  {
    $db = Database::dbConnect();

    $request = $db->prepare("INSERT INTO creneaux (date, id_moniteur, permis_id) VALUES (?, ?, ?)");
    try {
        $request->execute(array($date, $idMoniteur, $idPermis));

        header("Location: http://localhost/projet_indi/listeCreneaux.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
  }

     public static function listCreneaux()
       {
           $db = Database::dbConnect();
       
           // Sélectionnez les colonnes nécessaires en effectuant une jointure entre les tables creneaux, permis et user
           /*select dans creneaux: c.id_creneaux, c.date, p.titre(de permis), u.firstname(de user), c.disponibilite et joindre avec permis où dans creneaux permis_id=id_permis dans permis et joindre user où id_moniteur dans creneaux =id_user dans user */
           $request = $db->prepare("SELECT c.id_creneaux, c.date, p.titre, u.firstname, c.disponibilite FROM creneaux c
                                    LEFT JOIN permis p ON c.permis_id = p.id_permis
                                    LEFT JOIN user u ON c.id_moniteur = u.id_user");
           try {
               $request->execute();
               $listcreneaux = $request->fetchAll(PDO::FETCH_ASSOC);
               return $listcreneaux;
           } catch (PDOException $e) {
               echo $e->getMessage();
           }
       }
  
  
// update database
// $id_creneaux qui stock id depuis url quand on soumet, $idEleve qui stock celui qui est connecté
  public static function reserverCreneau($id_creneaux, $idEleve)
 {
    $db = Database::dbConnect();
// mets à jour la table creneaux où id_eleve=? et disponibilité =pris
    $request = $db->prepare("UPDATE creneaux SET id_eleve = ?, disponibilite = 'pris' WHERE id_creneaux = ?");
    try {
        $request->execute(array($idEleve, $id_creneaux));
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
  }
//pour annuler le creneau


   public static function annulerCreneau($id_creneaux, $idEleve)
      {
          $db = Database::dbConnect();
      
          // Vérifiez d'abord si le créneau est réservé par l'élève actuel
          $verifier = $db->prepare("SELECT id_eleve FROM creneaux WHERE id_creneaux = ? AND id_eleve = ?");
          $verifier->execute(array($id_creneaux, $idEleve));
          $row = $verifier->fetch(PDO::FETCH_ASSOC);
      
          if ($row && $row['id_eleve'] == $idEleve) {
              // Le créneau est réservé par l'élève actuel, nous pouvons l'annuler
      
              $annulationQuery = $db->prepare("UPDATE creneaux SET id_eleve = NULL, disponibilite = 'dispo' WHERE id_creneaux = ?");
              $annulationQuery->execute(array($id_creneaux));
            echo "La réservation du créneau a été annulée avec succès.";
              // Vous pouvez également effectuer d'autres actions ici, par exemple, envoyer un message de confirmation.
          } else {
              echo "La réservation du créneau n'a pas pu être annulée. Veuillez vérifier vos informations.";
          }
      }

  // LISTE DES ELEVES QUI ONT RESERVE LEX CRENEAUX
     public static function listElevesMoniteursCreneaux()
  {
    $db = Database::dbConnect();

    // Sélectionnez les colonnes nécessaires en effectuant une jointure entre les tables creneaux, permis, user (élèves), et user (moniteurs)
    $request = $db->prepare("SELECT c.id_creneaux, c.date, p.titre, u_eleve.firstname AS eleve_firstname, u_moniteur.firstname AS moniteur_firstname, c.disponibilite
                            FROM creneaux c
                            LEFT JOIN permis p ON c.permis_id = p.id_permis
                            LEFT JOIN user u_eleve ON c.id_eleve = u_eleve.id_user
                            LEFT JOIN user u_moniteur ON c.id_moniteur = u_moniteur.id_user
                            WHERE c.disponibilite = 'dispo' OR (c.disponibilite = 'pris' AND u_eleve.id_user IS NOT NULL)");

    try {
        $request->execute();
        $listElevesMoniteursCreneaux = $request->fetchAll(PDO::FETCH_ASSOC);
        return $listElevesMoniteursCreneaux;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
 }

}