<?php
session_start();
include_once "./views/inc/header.php";
require_once './models/creneauxModel.php';
// pour message de connexion
if (isset($_SESSION["success_message"])) {
    echo $_SESSION["success_message"];
    unset($_SESSION["success_message"]); // Supprimez le message après l'avoir affiché une fois
}
//si l'utilisateur est connecté, on le stock dans  $idMoniteur   
if (isset($_SESSION["id_user"])) {
    $idMoniteur = $_SESSION["id_user"];
    // on récupère la liste de creneaux pour le moniteur qui s'est connecté listCreneaux($idMoniteur);
    $listcreneaux = creneaux1::listCreneaux();
} ?>


    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id_creneaux</th>
                    <th>date</th>
                    <th>titre</th>
                    <th>firstname</th>
                    <th>disponibilite</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <div class="titre"><h3>Liste des Creneaux </h3></div>
            <?php foreach ($listcreneaux as $creneau) { ?>
                <tr  <?=  $creneau['disponibilite'] === 'pris' ? 'reserved' : ''; ?>>
                    <td><?= $creneau['id_creneaux']; ?></td>
                    <td><?= $creneau['date']; ?></td>
                    <td><?= $creneau['titre']; ?></td>
                    <td><?= $creneau['firstname']; ?></td>
                    <td ><?= $creneau['disponibilite']; ?></td>
                    <td>
                        <!--si la valeur de la clé disponibilité du tableau $creneau = dispo En d'autres termes, elle vérifie si le créneau est disponible. et que celle de la clé id_eleve n'existe pas.  vérifiant si le créneau n'est pas réservé à un élève.-->
                        <!-- cad si le creneaux est disponible et n'est pas encore reservé-->
                        <?php if ($creneau['disponibilite'] === 'dispo' && !isset($creneau['id_eleve'])) { ?>
                              <!--un lien qui pointe vers reserver.php, dont la valeur de $creneau['id_creneaux'] est directement mis dans url via id  -->
                            <a class="reserannu" href="reserver.php?id=<?= $creneau['id_creneaux']; ?>">Réserver</a>
                             <!-- sinon, affiche moi Réservé, et vas vers annulr.php...-->
                        <?php } else { ?>
                                <span>Réservé</span>
                                <a class="reserannu" href="annuler.php?id=<?= $creneau['id_creneaux']; ?>">Annuler</a>
                            <?php } ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    
 
