<?php

require 'Employe.php';


$employe_1 = new Employe();
$employe_1->nom= "Martin";
$employe_1->salaire= 5000;
$employe_1->embauche = "01/02/2010";
$employe_1->prime();
$employe_1->ancienneté;
$employe_1->annees();
var_dump($employe_1);

?>
