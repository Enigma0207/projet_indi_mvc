pour listecreneaux.php

<?php foreach ($listcreneaux as $creneau) { ?>
                        <tr class="bg-body-secondary <?= $creneau['disponibilite'] === 'pris' ? 'reserved' : ''; ?>">
                             <td><?= $creneau['id_creneaux']; ?></td>
                             <td><?= $creneau['date']; ?></td>
                             <td><?= $creneau['titre']; ?></td>
                             <td><?= $creneau['firstname']; ?></td>
                             <td><?= $creneau['disponibilite']; ?></td>
                            <td>
                                <?php if ($creneau['disponibilite'] === 'dispo') { ?>
                                    <a class="reserannu" href="reserver.php?id=<?= $creneau['id_creneaux']; ?>">Réserver</a>
                                    <a class="reserannu" href="annuler.php?id=<?= $creneau['id_creneaux']; ?>">Annuler</a>
                                <?php } elseif ($creneau['disponibilite'] === 'pris' && isset($creneau['id_eleve']) && $creneau['id_eleve'] == $_SESSION["id_user"]) { ?>
                                    <a href="annuler.php?id=<?= $creneau['id_creneaux']; ?>">Annuler</a>
                                <?php } else { ?>
                                    <span>Réservé</span>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>

                    <?php foreach ($listcreneaux as $creneau) { ?>
                        <tr class="bg-body-secondary <?= $creneau['disponibilite'] === 'pris' ? 'reserved' : ''; ?>">
                            <td><?= $creneau['id_creneaux']; ?></td>
                            <td><?= $creneau['date']; ?></td>
                            <td><?= $creneau['titre']; ?></td>
                            <td><?= $creneau['firstname']; ?></td>
                            <td><?= $creneau['disponibilite']; ?></td>
                            <td>
                                <?php if ($creneau['disponibilite'] === 'dispo') { ?>
                                    <?php if ($creneau['id_eleve'] != $_SESSION["id_user"]) { ?>
                                        <a class="reserannu" href="reserver.php?id=<?= $creneau['id_creneaux']; ?>">Réserver</a>
                                    <?php } ?>
                                    <a class="reserannu" href="annuler.php?id=<?= $creneau['id_creneaux']; ?>">Annuler</a>
                                <?php } elseif ($creneau['disponibilite'] === 'pris' && $creneau['id_eleve'] == $_SESSION["id_user"]) { ?>
                                    <a href="annuler.php?id=<?= $creneau['id_creneaux']; ?>">Annuler</a>
                                <?php } else { ?>
                                    <span>Réservé</span>
                                <?php } ?>
                            </td>
                        </tr>
<?php } ?>
