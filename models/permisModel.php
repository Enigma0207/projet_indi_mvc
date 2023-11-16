<?php
require_once "database.php";

class permis1
{

  // ajoueter les acteur
  public static function add_permis( $titre,$prix,$description,$img_name)
  {
    $db = Database::dbConnect();

    $request = $db->prepare("INSERT INTO permis ( titre,prix,description,photo) VALUES (?,?,?,?)");
    try {
      $request->execute(array( $titre,$prix,$description,$img_name));
       header("Location: http://localhost/projet_indi/listePermis.php");
    } catch (PDOException $e) {
      echo $e->getMessage();
    }

  }
  public static function listPermis()
  {
    //   se connecter
    $db = Database::dbConnect();
    $request = $db->prepare("SELECT * FROM permis");
    //   ECXECUTER
    try {
      $request->execute();
      // recuperer les tablresultateau de la request dans un tableau
      $listpermis = $request->fetchALL();
      //   return $listBook qui stock les valeur du tableau cad les livre et sera utiliser pour afficher les livres quand on fera apple a la fonction listBook() dans listBook
      return $listpermis;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }


  }

  // MISE AJOUR PERMIS

  public static function getPermisById($id_permis)
{
    $db = Database::dbConnect();
    $request = $db->prepare("SELECT * FROM permis WHERE id_permis = ?");
    try {
        $request->execute([$id_permis]);
        $permis = $request->fetch();
        return $permis;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

  public static function update_permis($id_permis, $titre, $prix, $description, $img_name)
{
    $db = Database::dbConnect();
    $request = $db->prepare("UPDATE permis SET titre = ?, prix = ?, description = ?, photo = ? WHERE id_permis = ?");
    try {
        $request->execute([$titre, $prix, $description, $img_name, $id_permis]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


}