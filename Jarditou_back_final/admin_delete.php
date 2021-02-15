

<!Doctype html>
<html lang="fr">      
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="JS/delete_script.js"></script>
    <title>Jarditou</title>
    <!-- Script php -->
    <?php 
    $pro_id = $_GET["id"];
    $pro_id = (int)$pro_id; 
    require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
     // Récupération de l'id en get par l'url//
    $requete = $db->prepare("DELETE FROM produits WHERE prod_id=:pro_id");
    $requete->bindValue(":pro_id", $pro_id, PDO::PARAM_INT);
    $requete->execute();
    $requete->closeCursor();
    header("Location: admin_liste.php");
    exit; 

    //Renvoi de l'enregistrement sous forme d'un objet
    /*$produit = $result->fetch(PDO::FETCH_OBJ);*/
   ?>
</head>
</html>
   