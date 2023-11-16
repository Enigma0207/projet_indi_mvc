<?php
session_start();
include_once "./views/inc/header.php";
// var_dump($_SESSION);
?>
<!-- s'il ne se connecte pas, affiche ce message: -->

<div class="container">

  <form action="views/traitement/action.php" method="post">
    <div class="form-group">
      <label for="email">email :</label>
      <input type="email" class="form-control" id="email" name="email">
      <!-- si la session error existe dans userModel.php, affiche-le dans la balise p, apès actualisation fin d'affichage avec unset: -->
      <?php if (isset($_SESSION["error"])) { ?>
        <p><?php echo $_SESSION["error"] ?></p>
      <?php }
      unset($_SESSION["error"]); ?>
    </div>
    <div class="form-group">
      <label for="password">password :</label>
      <input type="text" class="form-control" id="password" name="password">
      <!-- si la session existe, le mdp est incorrect,  -->
      <?php if (isset($_SESSION["erreur_message"])) { ?>
        <p>
          <!-- affiche moi la valeur de la session -->
          <?php echo $_SESSION["erreur_message"] ?>
        </p>
      <?php }
      // eviter que la session reste tjrs
      unset($_SESSION["erreur_message"]); ?>
    </div>
    <button type="submit" id="bouton" class="btn btn-primary mt-5 mb-5" name="login" value="submit">login</button>
  </form>