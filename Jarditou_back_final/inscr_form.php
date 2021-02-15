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
        <h2 class= text-center>Inscription</h2>
        <br><br>
        <p>Tous les champs doivent être renseignés</p>
<!--formulaire -->
<form name="jarditouessai" action="inscr_form_script.php" method="POST" id="formulaire">
    <fieldset>
                <!-- Saisie du nom -->
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <!-- php: Si l'utilisateur rempli le champ, les caractères saisis sont insérés dans value et persistent tat que le formulaire n'est pas correct et envoyé. Idem pour les champs suivants -->
                    <input type="text" class="form-control" name="nom" id="nom" value="<?php echo htmlentities($_POST["nom"])?>"><Br>
                    <!-- php =  affichage d'un message d'erreur si le champ est vide ou incorrect (idem pour les champs suivant) -->
                    <?php if(isset($erreur_nom)){?>
                        <?php echo "<span style='color:red;'>$erreur_nom</span>";?>
                        <?php }?>
                </div>
                <!-- Saisie du prénom -->
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" name ="prenom" id="prenom"  value="<?php echo htmlentities($_POST["prenom"])?>"><br>
                    <!-- Validation php-->
                    <?php if(isset($erreur_prenom)){?>
                        <?php echo "<span style='color:red;'>$erreur_prenom</span>";?>
                        <?php }?>
                </div>
                <!-- Saisie du mail -->
                <div class="form-group">
                    <label for="mail">Email</label>
                    <input type="text" class="form-control" name="mail" id="mail" value="<?php echo htmlentities($_POST["mail"])?>"><br>  
                    <!-- validation php --> 
                    <?php if(isset($erreur_mail)){?>
                      <?php echo "<span style='color:red;'>$erreur_mail</span>";?>
                      <?php }?>  
                </div>
                    <!-- saisie du mot de passe -->
                <div class="form-group">
                    <label for="password">Mot de passe (au 8 caractères, dont une majuscule, un chiffre et un caractère spécial)</label>
                    <input type="password" class="form-control" name="password" id="password" value="<?php echo htmlentities($_POST["password"])?>"><br> 
                     <!-- validation php --> 
                    <?php if(isset($erreur_password)){?>
                      <?php echo "<span style='color:red;'>$erreur_password</span>"?>
                      <?php }?>
                </div>
                <!--Confirmation du mot de passe-->
                <div class="form-group">
                    <label for="password2">Confirmer votre mot de passe</label>
                    <input type="password" class="form-control" name="password2" id="password2" value="<?php echo htmlentities($_POST["password2"])?>"><br> 
                     <!-- validation php --> 
                    <?php if(isset($erreur_password2)){?>
                      <?php echo "<span style='color:red;'>$erreur_password2</span>"?>
                      <?php }?>
                </div>
                <!-- date du jour -->
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="text" class="form-control" name="date" id="date" value="<?php echo date('Y/m/d')?>"><br>
                </div>
                <!-- Acceptation du traitement informatique-->
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name = "accepte" id="accepte">
                        <label class="form-check-label" for="accepte">
                        J'accepte le traitement informatique de ce formulaire
                        </label>
                        <!-- validation php --> 
                    <?php if(isset($erreur_accepte)){?>
                      <?php echo "<span style='color:red;'>$erreur_accepte</span>"?>
                      <?php }?>
                    </div>
                </div>
                
                <input type="submit" class="btn btn-dark" value="Envoyer" id="envoyer">
                <input type="submit" class="btn btn-dark" value="Annuler">
            </fieldset>             
        </form>
<!--fin du formulaire-->
        <br>
        <!--pied de page pour second menu, liste ordonnée 3 liens-->
        
    </div>
<!--javascript boostrap-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

