<?php
var_dump($_POST);
var_dump($_FILES);
// Configuration du fuseau horaire //
date_default_timezone_set("Europe/Paris");

// Traitement php du fichier photo//
// Gestion des erreur//
if (sizeof($_FILES["fichier"]["error"]) >0)
{ 
    switch(sizeof($_FILES["fichier"]["error"])){
    case 1: 
        echo "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
        break; 
    case 2: 
        echo "The uploaded file was only partially uploaded"; 
        break; 
    case 3: 
        $message = "No file was uploaded"; 
        break; 
    case 4: 
        $message = "Missing a temporary folder"; 
        break; 
    case 5: 
        $message = "Failed to write file to disk"; 
        break; 
    case 6: 
        $message = "File upload stopped by extension"; 
        break; 

    default: 
        $message = "Unknown upload error"; 
        break; 
    }
}
// Si aucune erreur : vérification du type du fchier; si le type est autorisé, le fichier est renommé et déplacer dans le répertoire src/img// 
else{
    // Types images autorisés ici//
$aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

// On extrait le type du fichier via l'extension FILE_INFO //
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimetype = finfo_file($finfo, $_FILES["photo"]["tmp_name"]);
finfo_close($finfo);

if (in_array($mimetype, $aMimeTypes))
{
    // Le type est autorisé : le fichier est renommé et déplacé //
    $ref_pro = $_POST['ref'];
    echo $ref_pro;
    $extension = substr(strrchr($_FILES["photo"]["name"], "."), 1);
    echo $extension;
    move_uploaded_file($_FILES["photo"]["tmp_name"], "src/img/$ref_pro.$extension");
} 
else 
{
   // Le type n'est pas autorisé : message d'erreur

   echo "Type de fichier non aurorisé ou absence de fichier";    
   exit;
}    
}
// Fin du traitement pho du fichier photo //

// Récupération des informations passées en POST, nécessaires à la modification

$cat_pro=$_POST['cat'];
$ref_pro=$_POST['ref'];
$libel_pro=$_POST['libel'];
$desc_pro=$_POST['desc'];
$prix_pro=$_POST['prix'];
$stock_pro=$_POST['stock'];
$coul_pro=$_POST['coul'];
$photo_pro=$_POST['photo'];
$dateajout_pro=$_POST['date'];
$bloque_pro=$_POST['bloque'];

var_dump($cat_pro); echo "<br>";
var_dump($ref_pro); echo "<br>";
var_dump($libel_pro); echo "<br>";
var_dump($desc_pro); echo "<br>";
var_dump($prix_pro); echo "<br>";
var_dump($stock_pro); echo "<br>";
var_dump($photo_pro); echo "<br>";
var_dump($dateajout_pro);echo "<br>";
var_dump($bloque_pro); echo "<br>";
// Connexion à la base de données//
require "connexion_bdd.php";
//$db = connexionBase (); //Appel de la fonction de connexion//


try { 
// Construction de la requête INSERT sans injection SQL
        
echo "début du try <br>";      
        var_dump($_POST); echo "<br>";
        var_dump($_FILES);
        // INSERT INTO produits (pro_cat_id, pro_ref, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur, pro_photo, pro_d_ajout, pro_d_modif, pro_bloque) VALUES (2, 'ba202', 'scie', 'bbla', "20.00", 122, "bleue", "jpg", "2020-10-10", NULL, NULL)//
        $requete = $db->prepare("INSERT INTO produits (pro_cat_id, pro_ref, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur, pro_photo, pro_d_ajout, pro_bloque) 
        VALUES (:pro_cat_id, :pro_ref, :pro_libelle, :pro_description, :pro_prix, :pro_stock, :pro_couleur, :pro_photo, :pro_d_ajout, :pro_bloque)");
       if (!$requete) {
        echo "\nPDO::errorInfo():\n";
        var_dump($db->errorInfo());
     }
       echo "préparation requete <br>";      
        var_dump($_POST); echo "<br>";
        var_dump($requete); echo "<br>";
        
        $requete->bindValue(':pro_cat_id', $cat_pro, PDO::PARAM_INT);
        $requete->bindValue(':pro_ref', $ref_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_libelle', $libel_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_description', $desc_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_prix', $prix_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_stock', $stock_pro, PDO::PARAM_INT);
        $requete->bindValue(':pro_couleur', $coul_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_photo', $photo_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_d_ajout', $dateajout_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_bloque', $bloque_pro, PDO::PARAM_STR);
        
        echo "requete <br>"; 
        var_dump($requete); echo "<br>";
        $requete->execute();

// Libération de la connexion au serveur de BDD
        $requete->closeCursor();
        
        echo "fin du try <br>"; 
        var_dump($_POST); echo "<br>";
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
/* Redirection vers la page liste.php
//header("Location:liste.php");
exit;*/

?>