<?php

namespace Controller;

use Controller\BaseController;

Class  HomeController extends BaseController
{
 public function list()
 {
     $this->render("home.html.php");
 }
}
