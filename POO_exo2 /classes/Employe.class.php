<?php
class Employe
{
    public $_nom;
    public $_prenom;
    public $_embauche;
    public $_anciennete;
    public $_salaire;
    public $_service;
    // Fonction pour calculer l'ancienneté de l'employé //  
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
        $_primeA = ($_salaire/100)*5;
        $_primeB = (($_salaire/100)*2) * $_anciennete;
        $_prime_total = $_primeA + $_primeB;
        return $_prime_total;
    }

    function versement ()
    {
        $_today = date("d/m/Y");
        $_today_explode = explode("/", $_today);
        $_jour = $_today_explode [0];
        $_mois = $_today_explode [1];
        if ($_jour == 30 && $_mois = 11){
            echo "Le versement de la prime de $_prime_total a été effectué";
        }
    }

    

}



?>