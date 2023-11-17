<?php
session_start();
include_once "./views/inc/header.php";
require_once './models/creneauxModel.php';

$listElevesMoniteursCreneaux = creneaux1::listElevesMoniteursCreneaux();
?>

<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>date</th>
                <th>titre</th>
                <th>élève</th>
                <th>moniteur</th>
                <th>disponibilite</th>
            </tr>
        </thead>
        <tbody>
            <div class="titre"><h3>Liste des creneaux réservés</h3></div>
            <?php foreach ($listElevesMoniteursCreneaux as $creneau) { ?>
                <tr>
                    <td><?= $creneau['date']; ?></td>
                    <td><?= $creneau['titre']; ?></td>
                    <td><?= $creneau['eleve_firstname']; ?></td>
                    <td><?= $creneau['moniteur_firstname']; ?></td>
                    <td><?= $creneau['disponibilite']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
