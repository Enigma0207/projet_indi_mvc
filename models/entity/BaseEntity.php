<?php
namespace Model\Entity;

class BaseEntity
{
    // Déclare une propriété protégée $id qui sera utilisée pour stocker l'identifiant de l'entité.
    protected $id;

    /**
     * Set the value of id
     *
     * @param integer $id
     * @return void
     */

    //  Définit une méthode publique setId qui prend un entier $id en paramètre et affecte cette valeur à la propriété $id.

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Get the value of id
     *
     * @return integer
     */

     //Définit une méthode publique getId qui renvoie l'identifiant de l'entité.

    public function getId(): int
    {
        return $this->id;
    }
  
    //convertir l'objet en chaîne
    public function __toString()
    {
        //obtenir le nom de la classe de l'objet à partir duquel la méthode est appelée.
        $class = get_called_class();

        //diviser le nom de la classe en utilisant le caractère de barre oblique inversée (\) comme séparateur. 
        $class = explode("\\", $class);

        //Cette ligne récupère le dernier élément du tableau résultant de l'explosion du nom de la classe.
        $table = $class[count($class) - 1];
        // strtolower = met tous les caractères d'un string en minuscule
        return strToLower($table);
    }
}
