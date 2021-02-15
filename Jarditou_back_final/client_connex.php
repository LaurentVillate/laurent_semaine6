<?php 
session_start();
//connexion à la base de données//
require "connexion_bdd.php";

// Récupération des login et mdp dans 2 variables//
$login = $_POST["login"];
$mdp= $_POST["mdp"];
$erreur = NULL;
    
//Vérification que le login est dans la bdd//
    if (!empty($login) && !empty($mdp)){
      $requete = $db->prepare("SELECT * FROM users WHERE user_login = '$login'");
      $requete->execute();
      $user_OK = $requete->rowcount();
        // Il y a bien une rangée dans la table users qui contient le login//
        if ($user_OK > 0){
            // Récupération des infos concernant l'utilisateur dans une variable//
            $user_infos = $requete->fetch();
            //Vérification que le mot de passe est valide//
            if (password_verify($mdp, $user_infos["user_password"])){
            //On stocke des infos dans des variables de session //
            $_SESSION["id"] = $user_infos["user_id"];
            $_SESSION["login"] = $user_infos["user_login"];
            //Insertion de la date de connexion dans la base de donnée//
            try {
                $date_connex = date("Y/m/d");
                $req_insert = $db->prepare("UPDATE users SET user_d_connex = :user_d_connex WHERE user_login = '$login'");
  
                $req_insert->bindValue(':user_d_connex', $date_connex, PDO::PARAM_STR);
  
                $req_insert->execute();   
                //Libération de la connexion au serveur de BDD//
                $req_insert->closeCursor();
            }
            // Gestion des erreurs
             catch (Exception $e) {
                echo "La connexion à la base de données a échoué ! <br>";
                echo "Merci de bien vérifier vos paramètres de connexion ...<br>";
                echo "Erreur : " . $e->getMessage() . "<br>";
                echo "N° : " . $e->getCode();
                die("Fin du script");
            }
            // Vers la page espace client//
            header("Location:client_espace.php");
            exit();
            }
            //Le mot de passe n'est pas valide//
            else{
              $erreur = "Mot de passe invalide";
            } 
        //Le login n'est pas valide//    
        } 
        else{
          $erreur = "Login invalide";
        } 
    }
    //Le login et/ou le mdp n'ont pas été saisis//
?>


<!Doctype html>
<html lang="fr">      
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--intégration Boostrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Jarditou</title>
</head>
<body>
<!--Container boostrap-->
    <div class="container">
        <br><br>
        <h2 class= "text-success text-center">Connexion à votre espace client</h2>
        <br><br>
        <h5> Vous n'êtes pas encore client?</h5>
        <a href="inscr_form.php" class="btn btn-dark">Créer votre compte</a>
        <br><br><br>
    <?php if(isset($erreur)):?>
        <br><br>
    <?php endif; ?>
<!--formulaire -->
<form name="jarditouessai" action=" " method="POST" id="formulaire">
    <fieldset>  
                <!-- saisie du login -->
                <div class="form-group">
                    <label for="login">Login (mail)</label>
                    <input type="email" class="form-control" name="login" id="login" value="<?php echo htmlentities($_POST["login"])?>"><br> 
                </div>
                <!-- saisie du mot de passe -->
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="mdp" id="password" value="<?php echo htmlentities($_POST["mdp"])?>"><br> 
                </div>
                <!-- mot de passe perdu? --> 
  
                    <br>
                <input type="submit" class="btn btn-dark" name = "connexion" value="Se connecter" id="envoyer">
            </fieldset>             
        </form>
<!--fin du formulaire-->
        <!--pied de page pour second menu, liste ordonnée 3 liens-->
        
    </div>
<!--javascript boostrap-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>



