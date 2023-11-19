<?php
// cette fonction simplifie la création de liens en permettant de spécifier le contrôleur, la méthode et un éventuel identifiant,

function addLink($controller, $method = "liste", $id = null)
{
    // return ROOT . "?controller=$controller&method=$method" . ($id ? "&id=$id" : "");
    //c'est un lien comme valeur de retour projet_indi_mvc/user/list/32 ou user\list
    return ROOT . "$controller/$method" . ($id ? "/$id" : "");
}


function debug($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

function d_die($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die;
}

function redirection($url)
{
    header("Location: $url");
    exit;
}

// ⚠ test
function error($num = 404)
{
    include "error/$num.php";
    exit;
}