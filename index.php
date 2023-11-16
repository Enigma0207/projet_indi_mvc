<?php
require "inc/init.inc.php";

//extrais la valeur du controller duis url sinon prends home
$controller = $_GET["controller"] ?? "home";
$method    = $_GET["method"] ?? "liste";
$id         = $_GET["id"] ?? null;

$classController = "Controller\\" . ucfirst($controller) . "Controller";  
try {
    $controller = new $classController;

    $controller->$method($id);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}