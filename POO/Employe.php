<?php
class Employe{

    public $_nom;
    public $_salaire;
    public $_prime;
    public $_embauche;
    public $_anciennete;

   /* public function prime(){
        $this->salaire = $this->salaire + (($this->salaire / 100)*5);
    }*/

    public function annees ()
    {
        $_today = date("d/m/Y");
        $_today_explode = explode("/", $_today);
        $_an_today = $_today_explode[2];
        $_embauche_explode = explode("/", $this->embauche);
        $_an_embauche = $_embauche_explode[2];
        $this->anciennete = $_an_today - $_an_embauche;
    }

// Fonction pour calculer la prime annuelle //
    public function prime()
    {
    //$_primeA = (($this->salaire*12)/100)*5;//
    //$_primeB = ((($this->salaire * 12)/100)*2) * $this->anciennete;//
    $_primeB = $this->salaire * $this->anciennete;
    $this->prime = $_primeB;
    }
}

?>