<?php 

namespace App\Core;

class Form {

    //Notre formulaire
    private $formCode = '';

    //Generateur de formulaire
    public function create() {
        return $this->formCode;
    }

    //Validation des champs
    //Parametre $form: tableau issue ($_POST, $_GET)
    //Parametre $champs: tableaulistant les champs obligatoire
    public static function validate(array $form, array $champs) {

        //On boucles $champs
        foreach ($champs as $champ) {

            //si le champs est absent ou vide du tableau formulaire
            if(!isset($form[$champ]) || empty($form[$champ])) {

                return false;
            }
        }

        return true;
    }

    //Ajout des attributs 
    //Paramètre $attributs: tableau associatif ['require'=> "true"]
    private function ajoutAttributs(array $attributs): string {

        //On initialise un string
        $str = '';

        //On liste les attributs sans valeur ex: required
        $listAttr = ['checked', 'disabled', 'required', 'autofocus', 'readonly',
                    'multiple', 'novalidate', 'formvalidate'];
        
        //On boucle le tableau $attributs 
        foreach ($attributs as $attribut => $valeur) {

            //On verifie si l'attribut est dans la liste et sa valeur est true
            if(in_array($attribut, $listAttr) && $valeur == true) {
                $str = $str . "$attribut";
            } else {
                //On ajoute attribut = valeur
                $str .= "$attribut='$valeur'";
            }
        }

        return $str;
    }

    /****** Creation du formulaire *******/

    //Balise d'ouverture du formualaire

    public function debutForm(string $method = "POST", string $action ="#", array $attributs = []): self {
        $this->formCode .= "<form action='$action' methode='$method'";

        //Ajout des attributs on utilise une ternaire
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs). '>' : '>';

        return $this;
    }

    //Balise de fin du formulaire

    public function finForm(): self {

        $this->formCode .= "</form>";
        return $this;
    }

    //Ajout du label

    public function ajoutLabel(string $for, string $texte, array $attributs = []): self {

        //Balise d'ouverture
        $this->formCode .= "<label for='$for'";

        //Ajout des attributs
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';

        //Balise de fermeture
        $this->formCode .= "> $texte </label>";

        return $this;
    }

    //Ajout des inputs
    public function ajoutInput(string $type, string $name, array $attributs = []): self {

        //Balise d'ouverture
        $this->formCode .= "<input type='$type' name='$name'";

        //Ajout des attributs
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs). '>' : '>';

        return $this;
    }

    //Ajout du textarea

    public function ajoutTextarea(string $name,string $valeur = '', array $attributs = []): self {
        
        //Balise d'ouverture
        $this->formCode .= "<textarea name='$name'";

        //Ajout des attributs
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';
        
        //Balise de fin
        $this->formCode .= "> $valeur </textarea>";

        return $this;
    }
    
    //Ajout du select

    public function ajoutSelect(string $nom, array $options, array $attributs = []):self {

        $this->formCode .= "<select name='$nom'";

        //On ajoute les attributs
        $this->formCode .= $attributs ? $this->ajouterAttributs($attributs). '>' : '>';

        //On ajoute les options
        foreach($options as $valeur => $texte) {
            $this->formCode .= "<option value=\"$valeur\"> $texte </option>";
        }

        //balise de fin
        $this->formCode .= "</select>";

        return $this;
    }

    //Ajout du bouton 

    public function ajoutBouton(string $texte, array $attributs = []): self {

        //Balise d'ouverture
        $this->formCode .= '<button';

        //Ajout des attributs
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';

        //Balise de fin
        $this->formCode .= '> $texte </button>';

        return $this;
    }

}
?>