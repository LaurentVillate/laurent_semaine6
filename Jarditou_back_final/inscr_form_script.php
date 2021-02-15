<?php
// connexion à la bdd//
require "connexion_bdd.php";
//Conditions successives concernant chaque champ du formulaire: le champ ne doit pas être vide; une fois rempli, il doit être correct//
// Validation des nom et prénom : si non vide, la regex impose l'utilisation exclusive de lettres et de tirets. La même regex est utilisé pour le champ ville //
    if (empty($_POST["nom"])){
        $erreur_nom = "Veuillez renseigner votre nom";
    }
    if (!empty($_POST["nom"])){
        $nom = $_POST["nom"];
        if (preg_match("~^[a-zA-Z-éèçëê\s]+$~", $nom)){
        }
        else{
        $erreur_nom = "Saisissez seulement des lettres et des tirets";
        }
    }
    if (empty($_POST["prenom"])){
        $erreur_prenom = "Veuillez renseigner votre prénom";
    }
    if (!empty($_POST["prenom"])){
        $prenom = $_POST["prenom"];
        if (preg_match("~^[a-zA-Z-éèçëê\s]+$~", $prenom)){
        }
        else{
        $erreur_prenom = "Saisissez seulement des lettres et des tirets";
        }
    }
     // Validation de l'adresse mail avec filter_var($, FILTER_VALIDATE_EMAIL)//
     if (empty($_POST["mail"])){
        $erreur_mail = "Veuillez renseigner le mail";
    }
    if (!empty($_POST["mail"])){
        $mail = $_POST["mail"];
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
        }
        else{
            $erreur_mail = "Mail non valide";
        }
    }
    // Validation du mot de passe//
    if (empty($_POST["password"])){
        $erreur_password = "Veuillez renseigner le mot de passe";
    }
    if (!empty($_POST["password"])){
        $robuste = '/^\S*(?=\S{8,})(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$/';
        if (preg_match($robuste, $_POST["password"])){    
        }
        else{
            $erreur_password = "Choisissez un mot de passe plus robuste";
        }
    }
    // Validation de la confirmation du mot de passe//
    if (empty($_POST["password2"])){
        $erreur_password2 = "Veuillez confirmer le mot de passe";
    }
    // Validation finale du mot de passe // 
    if (!empty($_POST["password2"])){
        if (($_POST["password2"]== $_POST["password"])){
        $password= password_hash($_POST["password2"], PASSWORD_DEFAULT);
    }
        else{
            $erreur_password2 = "Les saisies du mot de passe doivent être identiques";
        }
    }
    if ($_POST["accepte"] == NULL){
        $erreur_accepte = "Merci d'accepter le traitement du formulaire";
    }

    //Si toutes les variables d'erreur sont vides, le formulaire est envoyé, sinon on reste sur la page du formulaire//
    if (empty($erreur_nom) && empty($erreur_prenom) && empty($erreur_mail) && empty($erreur_password) && empty($erreur_password2) && empty($erreur_accepte)){           
        try { 
// Construction de la requête INSERT sans injection SQL//
            $requete = $db->prepare("INSERT INTO users (user_nom, user_prenom, user_mail, user_login, user_password, user_d_inscr) 
            VALUES (:user_nom, :user_prenom, :user_mail, :user_login, :user_password, :user_d_inscr)");
            
            $requete->bindValue(':user_nom', $_POST["nom"], PDO::PARAM_STR);
            $requete->bindValue(':user_prenom', $_POST["prenom"], PDO::PARAM_STR);
            $requete->bindValue(':user_mail', $_POST["mail"], PDO::PARAM_STR);
            $requete->bindValue(':user_login', $_POST["mail"], PDO::PARAM_STR);
            $requete->bindValue(':user_password', $password, PDO::PARAM_STR);
            $requete->bindValue(':user_d_inscr', $_POST["date"], PDO::PARAM_STR);

            $requete->execute();   
//Libération de la connexion au serveur de BDD//
            $requete->closeCursor();
            }
    
    // Gestion des erreurs
        catch (Exception $e) {
            echo "La connexion à la base de données a échoué ! <br>";
            echo "Merci de bien vérifier vos paramètres de connexion ...<br>";
            echo "Erreur : " . $e->getMessage() . "<br>";
            echo "N° : " . $e->getCode();
            die("Fin du script");
            }
            header("Location:index.php");    
    }
    else{
        include("inscr_form.php");
    }
        
    
?>