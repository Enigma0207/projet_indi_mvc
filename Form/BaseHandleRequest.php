<?php

namespace Form;// //pour spécifier que la classe BaseHandleRequest appartient ce namespace (dossier)

// conçue pour gérer les requêtes de formulaire de base, fournissant des méthodes pour gérer les erreurs associées au formulaire, vérifier la validité du formulaire, et déterminer si le formulaire a été soumis.

class BaseHandleRequest
{
    //c'est sur $errors où on stock les erreurs associées au formulaire 
    private $errors;

  // une méthode publique setEerrorsForm qui prend un tableau $errors en paramètre et affecte ce tableau à la propriété $errors.
    public function setEerrorsForm($errors)
    {
        $this->errors = $errors;
    }

  //renvoie la valeur actuelle de la propriété $errors.
    public function getEerrorsForm()
    {
        return $this->errors;
    }

    //Définit une méthode publique isValid qui renvoie un booléen indiquant si le formulaire est considéré comme valide ou non. Le formulaire est considéré comme valide si la propriété $errors est vide.
    public function isValid()
    {
        $result = !empty($this->errors) ? false : true;
        return $result;
    }

    // Définit une méthode publique isSubmitted qui renvoie un booléen indiquant si le formulaire a été soumis. Cela est déterminé en vérifiant si la superglobale $_POST est vide ou non.
    public function isSubmitted()
    {
        $result = empty($_POST) ? false : true;
        return $result;
    }
}
