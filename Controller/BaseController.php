<?php

namespace Controller;

abstract class BaseController
{
    public function render($fichier, array $parametres = [])
    {

        extract($parametres);
        include "public/header.html.php";
        include "views/$fichier";
        include "footer/footer.html.php";
    }  
}
