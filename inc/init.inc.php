<?php

/* ⚠ Il faut inclure le fichier autoload AVANT d'exécuter la fonction session_start() sinon il y aura
        une error si on essaye de stocker un objet dans la variable superglobale $_SESSION */
require "autoload.php";
session_start();
// include __DIR__ . "/functions.inc.php";
include "function.php";
define("ROOT","projet_indi_mvc/");
define("ROLE_MONITEUR", 20);
define("ROLE_ELEVE", 10);
define("ROLE_ADMIN", 30);
