<?php
// Definition des constantes et variables //
  define("LOGIN", "albert@afpa.fr");
  define("PASSWORD","123");
  $message = " ";
 
if (empty($_POST["login"]) || empty($_POST["password"])){
  $message = "Renseignez l'identifiant et le mot de passe";
  echo $message;
}
else if($_POST["login"] == LOGIN || $_POST["password"] == PASSWORD){
  // La session peut s'ouvrir//
  session_start();
// Le login de la session est enregistré //
  $_SESSION["login"] = LOGIN;
// L'utilisateur est redirigé vers la page demandé//
  echo "L'utilisateur est redirigé vers la page demandée.";
}
else{
  $message = "Vérifier l'identifiant et le mot de passe";
  echo $message;
}

?>
<?php

var_dump($_POST);
var_dump($_GET);

// Configuration du fuseau horaire //
date_default_timezone_set("Europe/Paris");

// Récupération des informations passées en POST, nécessaires à la modification
$pro_id=$_POST['ID'];
$cat_pro=$_POST['cat'];
$ref_pro=$_POST['ref'];
$libel_pro=$_POST['libel'];
$desc_pro=$_POST['desc'];
$prix_pro=$_POST['prix'];
$stock_pro=$_POST['stock'];
$coul_pro=$_POST['coul'];
$photo_pro=$_POST['photo'];
$datemodif_pro=$_POST['date_modif'];
$bloque_pro=$_POST['bloque'];

var_dump($cat_pro); echo "<br>";
var_dump($ref_pro); echo "<br>";
var_dump($libel_pro); echo "<br>";
var_dump($desc_pro); echo "<br>";
var_dump($prix_pro); echo "<br>";
var_dump($stock_pro); echo "<br>";
var_dump($photo_pro); echo "<br>";
var_dump($datemodif_pro);echo "<br>";
var_dump($bloque_pro); echo "<br>";
// Connexion à la base de données//
require "connexion_bdd.php";
//$db = connexionBase (); Appel de la fonction de connexion//


try { 
// Construction de la requête UPDATE sans injection SQL
        
        $requete = $db->prepare("UPDATE produits SET pro_cat_id = :pro_cat_id, pro_ref = :pro_ref, pro_libelle = :pro_libelle, pro_description = :pro_description, pro_prix = :pro_prix, pro_stock = :pro_stock, pro_couleur = :pro_couleur, pro_photo = :pro_photo, pro_d_modif = :pro_d_modif, pro_bloque = :pro_bloque 
        WHERE pro_id = $pro_id");
        
        $requete->bindValue(':pro_cat_id', $cat_pro, PDO::PARAM_INT);
        $requete->bindValue(':pro_ref', $ref_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_libelle', $libel_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_description', $desc_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_prix', $prix_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_stock', $stock_pro, PDO::PARAM_INT);
        $requete->bindValue(':pro_couleur', $coul_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_photo', $photo_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_d_modif', $pro_d_modif, PDO::PARAM_STR);
        $requete->bindValue(':pro_bloque', $bloque_pro, PDO::PARAM_STR);
        
        $requete->execute();

        $requete->closeCursor();
        
        }

// Gestion des erreurs
catch (Exception $e) {
        var_dump($_POST);
        var_dump($e);
        echo "La connexion à la base de données a échoué ! <br>";
        echo "Merci de bien vérifier vos paramètres de connexion ...<br>";
        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode();
        die("Fin du script");
}

// Redirection vers la page liste.php
/*header("Location:liste.php");
exit;*/
?>