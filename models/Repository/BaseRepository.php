<?php

namespace Models\Repository;

//Cette ligne utilise l'instruction use pour importer la classe Database depuis le namespace Models
use Models\Database;

// cette ligne importe la classe BaseEntity depuis le namespace Model\Entity
use Models\Entity\BaseEntity;

class BaseRepository
{
    //1.CONNEXION A LA BDD
    //une propriété( la propriété peut être accédée à l'intérieur de la classe où elle est définie et à l'intérieur des classes héritières.) protégée $dbConnect qui sera utilisée pour stocker la connexion à la base de données.
   protected $dbConnect;

    //Ce constructeur est appelé lorsqu'une instance de la classe est créée.
   public function __construct()
   {
       //instancer de la classe Database. Cela suppose que la classe Database est responsable de la gestion de la connexion à la base de données.
      $db = new Database;

      //Appelle la méthode dbConnect() de l'objet $db pour établir une connexion à la base de données. La connexion est ensuite stockée dans la propriété $dbConnection de l'objet courant ($this).
      $this->dbConnection = $db->dbConnect();
   }


   //2.
}
