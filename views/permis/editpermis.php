<?php
session_start();
include_once "./views/inc/header.php";
require_once './models/permisModel.php';

if (isset($_GET['id'])) {
    $id_permis = $_GET['id'];
    $permis = permis1::getPermisById($id_permis);
    if ($permis)
     {
?>
        <form action="views/traitement/action.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_permis" value="<?= $permis['id_permis']; ?>">
            <div class="form-group">
                <label for="text">titre</label>
                <input type="text" class="form-control" id="number" name="titre" value="<?= $permis['titre']; ?>">
            </div>
            <div class="form-group">
                <label for="prix">prix: £</label>
                <input type="number" class="form-control" id="number" name="prix" value="<?= $permis['prix']; ?>">
            </div>
            <div class="form-group">
                <label for="description">description</label>
                <input type="text" class="form-control" name="description" value="<?= $permis['description']; ?>">
            </div>
            <div class="form-group">
                <label for="photo">photo</label>
                <input type="file" class="form-control" name="photo">
            </div>
            <button type="submit" id="bouton" class="btn btn-primary mt-5 mb-5" name="update_permis">Actualiser</button>
        </form>
<?php
    } else {
        echo "Permis non trouvé.";
    }
} else {
    echo "ID du permis non spécifié.";
}

include_once "./views/inc/footer.php";
?>
