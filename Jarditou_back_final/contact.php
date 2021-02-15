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
<!--header: logo et slogan-->
        <header>
            <div class="row">
                <div class="col-6">
                    <img img="fluid" src="src\img\jarditou_logo.jpg" alt="logo jarditou" title="logo jarditou" width="100%">
                </div>
                <div class="col-6 text-right">
                    <h2>Tout le jardin</h2>
                </div>
            </div>
        </header>
<!--menu: liste non ordonnée 3 liens-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">jarditou.com</a>
<!--toggler... bascule vers bouton hamburger -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>   
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
<!--Menu de navigation formulaire de recherche à droite-->
            <ul class= "navbar-nav mr-auto">
                <li class="nav-item active"><a  class="nav-link" href="index.php">Accueil</a></li>
                <li class="nav-item"><a  class="nav-link" href="about.php">A propos</a></li>
                <li class="nav-item"><a  class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a  class="nav-link" href="client_connex.php">Se connecter</a></li>
            </ul>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Votre promotion" aria-label="Votre promotion">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
        </div>
        </nav>
            <br><br>
        <p>* Ces zones sont obligatoires</p>
<!--formulaire -->
<form name="jarditouessai" action="contact_script.php" method="POST" id="formulaire">
    <fieldset>
            <legend><h3>Vos coordonnées</h3></legend>
                <div class="form-group">
                    <label for="nom">Votre nom*</label>
                    <!-- php: Si l'utilisateur rempli le champ, les caractères saisis sont insérés dans value et persistent tat que le formulaire n'est pas correct et envoyé. Idem pour les champs suivants -->
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Veuillez saisir votre nom" value="<?php echo htmlentities($_POST["nom"])?>"><Br>
                    <!-- php =  affichage d'un message d'erreur si le champ est vide ou incorrect (idem pour les champs suivant) -->
                    <?php if(isset($erreur_nom)){?>
                        <?php echo "<span style='color:red;'>$erreur_nom</span>";?>
                        <?php }?>
                </div>
                <div class="form-group">
                    <label for="prenom">Votre prénom*</label>
                    <input type="text" class="form-control" name ="prenom" id="prenom" placeholder="Veuillez saisir votre prénom" value="<?php echo htmlentities($_POST["prenom"])?>"> <br>
                    <!-- Validation php-->
                    <?php if(isset($erreur_prenom)){?>
                        <?php echo "<span style='color:red;'>$erreur_prenom</span>";?>
                        <?php }?>
                </div>
                <div class="form-group">
                <legend class="col-form-label">Genre*</legend>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genre" id="optionsexe" <?php if (isset($_POST["genre"])) { if ($_POST["genre"] == "femme") { echo "checked"; } } ?> value="femme">
                    <label class="form-check-label" for="inlineRadio1">Féminin</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genre" id="optionsexe2" <?php if (isset($_POST["genre"])) { if ($_POST["genre"] == "homme") { echo "checked"; } } ?> value="homme">
                    <label class="form-check-label" for="inlineRadio1">Masculin</label>
                    </div>
                    <br>
                    <!-- validation php -->
                    <?php if(isset($erreur_genre)){?>
                        <?php echo "<span style='color:red;'>$erreur_genre</span>";?>
                        <?php }?>
                </div>
                <div class="form-group">
                    <label for="datenaissance">Date de naissance</label>
                    <input type="text" class="form-control" name="date" id="datenaissance" placeholder="jj/mm/aaaa" value="<?php echo htmlentities($_POST["date"])?>"><br>
                    <!-- Validation php-->
                    <?php if(isset($erreur_date)){?>
                        <?php echo "<span style='color:red;'>$erreur_date</span>";?>
                        <?php }?>
                </div>
                <div class="form-group">
                    <label for="postal">Code postal*</label>
                    <input type="text" class="form-control" name="postal" id="postal"value="<?php echo htmlentities($_POST["postal"])?>"><br>   
                    <!-- validation php -->
                    <?php if(isset($erreur_postal)){?>
                        <?php echo "<span style='color:red;'>$erreur_postal</span>";?>
                        <?php }?>
                </div> 
                <div class="form-group">
                    <label for="adresse">Adresse*</label>
                    <input type="text" class="form-control" name ="adresse" id="adresse"value="<?php echo htmlentities($_POST["adresse"])?>"><br>
                    <!-- validation php -->  
                    <?php if(isset($erreur_adresse)){?>
                        <?php echo "<span style='color:red;'>$erreur_adresse</span>";?>
                        <?php }?>
                </div> 
                <div class="form-group">
                    <label for="ville">ville*</label>
                    <input type="text" class="form-control" name="ville" id="ville" value="<?php echo htmlentities($_POST["ville"])?>"><br> 
                     <!-- validation php --> 
                    <?php if(isset($erreur_ville)){?>
                      <?php echo "<span style='color:red;'>$erreur_ville</span>"?>
                      <?php }?>
                </div>
                <div class="form-group">
                    <label for="mail">Email*</label>
                    <input type="text" class="form-control" name="mail" id="mail" placeholder="dave.loper@afpa.fr" value="<?php echo htmlentities($_POST["mail"])?>"><br>  
                    <!-- validation php --> 
                    <?php if(isset($erreur_mail)){?>
                      <?php echo "<span style='color:red;'>$erreur_mail</span>";?>
                      <?php }?>  
                </div> 
          </fieldset>
          <!--formulaire 2e partie: demande-->
          <fieldset>
            <legend><h3>Votre demande</h3></legend>
                <div class="form-group">
                    <label for="sujet">Sujet*</label>
                    <select class="form-control" name="sujet[]" id="sujet"><br>
                        <option value = "Veuillez sélectionner un sujet">Veuillez sélectionner un sujet</option>
                        <option value = "Mes commandes"<?php if ($choixsujet == "Mes commandes") {echo "selected";}?>>Mes commandes</option>
                        <option value = "Question sur un projet"<?php if ($choixsujet == "Question sur un projet") {echo "selected";}?>>Question sur un projet</option>
                        <option value = "Réclamation"<?php if ($choixsujet == "Réclamation") {echo "selected";}?>>Réclamation</option>
                        <option value = "Autres"<?php if ($choixsujet == "Autres") {echo "selected";}?>>Autres</option>
                    </select><br>
                    <!-- validation php -->
                    <?php if($choixsujet == "Veuillez sélectionner un sujet"){echo "<span style='color:red;'>$erreur_sujet</span>";}?> 
                    </div>
                <div class="form-group">
                    <label for="question">Votre question*:</label>
                    <textarea class="form-control" name ="question" id="question" rows="3"><?php echo htmlspecialchars($_POST["question"]); ?></textarea><br>
                    <!-- validation php -->
                    <?php if(isset($erreur_question)){?>
                      <?php echo "<span style='color:red;'>$erreur_question</span>";?>
                      <?php }?> 
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                        J'accepte le traitement informatique de ce formulaire
                        </label>
                    </div>
                </div>
                <input type="submit" class="btn btn-dark" value="Envoyer" id="envoyer">
                <input type="submit" class="btn btn-dark" value="Annuler">
            </fieldset>             
        </form>
<!--fin du formulaire-->
        <br>
        <!--pied de page pour second menu, liste ordonnée 3 liens-->
        <footer>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!--toggler... bascule vers bouton hamburger -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>   
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class= "navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="legal.html">Mentions légales</a></li>
                    <li class="nav-item"><a class="nav-link" href="horaires.html">Horaires</a></li>
                    <li class="nav-item"><a class="nav-link" href="plansite.html">Plan du site</a></li>
                </ul>
            </nav>
        </footer>
    </div>
<!--javascript boostrap-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

