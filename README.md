# projet_individuel

structure mvc
/*Controller Controller/BaseController.php Controller/HomeController.php Controller/UserController.php 
Form Form/BaseHandleRequest.php Form/UserHandleRequest.php 
inc inc/autoload.php inc/function.php inc/init.inc.php 
models models/entity/BaseEntity.php models/entity/User.php 
Repository /BaseRepository.php UserRepository.php
 models/creneauxModel.php models/database.php models/permisModel.php models/userModel.php 
 public public/assets public/assets/css public/assets/img public/footer.html.php public/header.html.php 
 Service /Session.php 
 views .htaccess index.php README.md */

1. .htaccess // les route dans la racine

1.1RewriteEngine On //activer le module de réécriture d'URL
1.2 RewriteRule ^$               index.php [L]// s'il ya seul le nom du projet, affiche moi l'index.php
1.3 RewriteRule ^(\w+)/?$         index.php?controller=$1 [L,QSA]// aprês le mon du projet\c'est la valeur du controller ex:\user
1.4 RewriteRule ^(\w+)/(\w+)$    index.php?controller=$1&method=$2 [L,QSA] aprês la valeur de \user c'est la valeur méthode ex: \user\add_user
1.5 #RewriteRule ^(\w+)/(\w+)/(\d+)$     index.php?controller=$1&method=$2&id=$3 [L,QSA]// aprês la valeur de \méthode c'est la valeur numérique ex: \user\add_user\32 donc id


......................................fin...htaccess ........................................

2.index.php  //porte d'entrée dans la racine

2.1 dans index.php, apl du fichier:require "inc/init.inc.php"; //
2.2extraire la valeur du controller,methode et id

$controller = $_GET["controller"] ?? "home"; //donne moi la valeur du controller sion affiche homme
$method    = $_GET["method"] ?? "list";// si le conntroller existe, donne moi la valeur de la méthode, sinon affiche la methode list
$id         = $_GET["id"] ?? null;// si l'id existe sinon null

// stock dans $classController la valeur du controller et sa première lettre sera mis en majusculeautomatiquement
$classController = "Controller\\" . ucfirst($controller) . "Controller";

 // "Controller\\" c'est namespace, 
 ucfirst($controller)= ex user ou home cad nom du controller qui sera en majuscule 
 //  . "Controller" on concatène avec user pour faire UserController

try {
    $controller = new $classController; //on instancie notre class ex: class user

    $controller->$method($id);//on fait apl a la method avk id
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

.........................FIN...index.php................................................

3. LE FICHIER init.inc.php dans dossier inc

3.1 require "autoload.php";// on apl le fichier autoload.php
3.2 session_start();
3.3include "function.php";

3.4 define("ROOT","projet_indi_mvc/"); //nom du projet
// les rôles
define("ROLE_MONITEUR", 20);
define("ROLE_ELEVE", 10);
define("ROLE_ADMIN", 30)


.........................FIN..init.inc.php .................................................

4. LE FICHIER autoload.php" dans dossier inc

<?php


function chargeClass($className)
{
   ⚠ RAPPEL : dans les namespaces, on ne peut utiliser que les \

    $filePath = str_replace("\\", "/", $className);
    $root = __DIR__ . "/../" . $filePath . ".php";
    if (file_exists($root)) {
        require $root;
    } else {
        throw new Exception("La class $className n'a pas été trouvée.");
    }
}

/** 
La fonction spl_autoload_register permet de définir la fonction qui sera 
exécutée à chaque fois qu'une class sera requise par le code (par exemple,
quand on utilise le mot-clé 'new' pour instancier un objet)
 */
spl_autoload_register("chargeClass");

.........................FIN...autoload.php..............................................

4. LE FICHIER function.php dans dossier inc
4.1 function debug($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

// EX: debug($list);
function d_die($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die;
}

4.2 function redirection($url)
{
    header("Location: $url");
    exit;
}
//EX:redirection("https://www.example.com/");

.........................FIN...function.php.............................................

5. CONTROLLER

5.1 BaseController.php

-namespace Controller;

//ici on a une class abstract qui définir une méthode render qui peut être utilisée pour générer la vue d'une page en incluant un fichier de modèle spécifié et en fournissant des paramètres à ce modèle. 

-abstract class BaseController // ne peut pas être instencié
{
    public function render($fichier, array $parametres = []) //$fichier cad nom du fichier à inclure et tableau associa a transmettre au model
    {

        extract($parametres);// Extrait les paramètres pour les rendre accessibles comme des variables locale
        include "public/header.html.php";
        include "views/user/$fichier";
        include "public/footer.html.php";

    }
}

5.2 UserController.php

namespace Controller;// nom du dossier
use Controller\BaseController;// apl au controller parent
use Models\Entity\User;//apl à l'entité qui représente les tables
use Form\UserHandleRequest;//apl au form pour traitement
use Models\Repository\UserRepository;//apl au model pour les request

5.2.1
création de la classe UserController fill de BaseController
class UserController extends BaseController 
{
    //1.1 METHODE D'INSCRIPTION

    public function add_user()
    {
        //dans cette classe (UserController),execute la méthode 'render'(en provenance de BaseController) avec paramettre une chaine de caractère :add_user.php
        $this->render("add_user.php");

    }

 

}

.........................FIN...controller.............................................

6.les entity dans model/entity





