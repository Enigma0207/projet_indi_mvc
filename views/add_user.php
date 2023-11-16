<?php

$mode = $mode ?? "insertion";
require "views/errors_form.html.php";
include_once '../Traitement/UserAction.php';
UserAction::insertUserAction();
include_once "../public/header.php";
?>

<div class="container">

   <form action="" method="post">
         
         <div class="form-group">
           <label for="firstname"> firstname:</label>
           <input type="text" name="firstname" id="firstname" class="form-control" id="firstname" value="<?=$user->getFirstname() ?>" <?=$mode == "suppression" ? "disabled" : ""?> >
         </div>
         <div class="form-group">
           <label for="lastname"> lastname:</label>
           <input type="text" class="form-control" id="lastname" value="<?=$user->getLastname() ?>" <?=$mode == "suppression" ? "disabled" : ""?> >
         </div>
         <div class="form-group">
           <label for="phone"> phone:</label>
           <input type="number" class="form-control" id="phone" value="<?=$user->getPone() ?>" <?=$mode == "suppression" ? "disabled" : ""?> >
         </div>
         <div class="form-group">
           <label for="email">email :</label>
           <input type="email" class="form-control" id="email" value="<?=$user->getEmail() ?>" <?=$mode == "suppression" ? "disabled" : ""?> >
         </div>
         <div class="form-group">
           <label for="password">password :</label>
           <input type="text" class="form-control" id="password" value="<?=$user->getPassword() ?>" <?=$mode == "suppression" ? "disabled" : ""?> >
         </div>
         <div class="form-group">
           <label for="niveau">Role</label>
           <input type="text" name="niveau" id="niveau" class="form-control" value="<?= $user->getRole() ?>" <?= $mode == "suppression" ? "disabled" : "" ?>>
         </div>
         
         <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary" name="submit">
                <?= $mode == "suppression" ? "Confirmer" : "Enregistrer" ?>
            </button>
            <a href="<?= addLink("user") ?>" class="btn btn-danger">Annuler</a>
         </div>
   </form>




















