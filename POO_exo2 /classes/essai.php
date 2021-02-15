<?php
 

 /*function versement()
    {
        $_today = date("d/m/Y");
        $_today_explode = explode("/", $_today);
        return $_today_explode [0, 1];
    }
    echo versement();*/
function versement (){
    $_prime = 2000;
    $_today = date("d/m/Y");
    $_today_explode = explode("/", $_today);
    $_jour = $_today_explode [0];
    $_mois = $_today_explode [1];
    if ($_jour == 11 && $_mois = 02){
        echo "Le Versement de la prime $_prime a été effectué";
    }
}
echo versement();       



?>