<?php
session_start();
include_once "./views/inc/header.php";
require_once './models/userModel.php';
// appeler la méthode statique listUser dans la classe user1
$listuser = user1::listUser();

/*si on veux aussi afficher le message de celui qui est connecté dans cette page comme dans 
userModel.php est fait, on peut faire comme ça pour toutes les pages */ 

// si le message existe depuis userModel.php
if (isset($_SESSION["success_message"])) {
    // affiche le
    echo $_SESSION["success_message"];
    // n'ache plus après actualisation de la page
    unset($_SESSION["success_message"]); // Supprimez le message après l'avoir affiché une fois
}
// 
//  var_dump($_SESSION); ?>
<!-- sur un tableau que l'on veut afficher -->
    <div class="container">
        <table  class="table table-bordered">
            <thead>
                <tr>
                    <th>firstname</th>
                    <th>lastname</th>
                    <th>role</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
             <!--le tableau ($listuser est répresenté par $user cad variable temporaire qui prend la valeur de chaque élémént du tableau  -->
             <div class="titre"><h3>Liste des Users</h3></div>
            <?php foreach ($listuser as $user){?>
                          <tr>
                            <td><?= $user['firstname']; ?></td>
                            <td><?= $user['lastname']; ?></td>
                            <td><?= $user['role']; ?></td>
                            <td><?= $user['email']; ?></td>
                         </tr>
        <?php }?>
           <!--foreach ($listuser as $user)
           {
           echo "firstname : " . $user["firstname"] . ", lastname : " . $user["lastname"] . ", Rôle : " . $user["role"] .", $user["role"] . "<br>"
           };--> 
            </tbody>
        </table>
       
        
