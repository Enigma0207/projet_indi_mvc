<?php
session_start();
include_once "./views/inc/header.php";

if (isset($_SESSION["success_message"])) {
    echo $_SESSION["success_message"];
    unset($_SESSION["success_message"]); // Supprimez le message après l'avoir affiché une fois
}
?>


<div class="container">
  <form action="views/traitement/action.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="text"> titre</label>
      <input type="text" class="form-control" id="number" name="titre">
    </div>
    <div class="form-group">
      <label for="prix"> prix:£</label>
      <input type="number" class="form-control" id="number" name="prix">
    </div>
    <div class="form-group">
      <label for="déscription"> déscription</label>
      <input type="text" class="form-control" name="description">
    </div>
    <div class="form-group">
      <label for="photo"> photo</label>
      <input type="file" class="form-control" name="photo">
    </div>

    <button type="submit" id="bouton" class="btn btn-primary mt-5 mb-5" name="enter" value="submit">enter</button>
  </form>