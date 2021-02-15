
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
    <!--Container bootstrap-->
    <div class="container">
        <header>
        <br><br>
        <h2 class = "text-center">Jarditou – Espace administrateur</h2>
        <br><br>
        </header>
            <!--menu: liste non ordonnée-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!--toggler... bascule vers bouton hamburger -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>   
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <!--Menu de navigation espace administrateur-->
                <ul class= "navbar-nav mr-auto">
                    <li class="nav-item"><a  class="nav-link" href="index.php">Aller sur le site</a></li>
                    <li class="nav-item active"><a  class="nav-link" href="admin.php">Accueil administrateur</a></li>
                    <li class="nav-item"><a  class="nav-link" href="admin_liste.php">Liste des produits</a></li>
                    <li class="nav-item"><a  class="nav-link" href="admin_ajout.php">Ajouter un produit</a></li>
                </ul>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                </form>
            </div>
        </nav>
        <br>
        <h3 class ="text-center">Ajouter un produit</h3>
        <br>
        <!--formulaire -->
        <form name="ajout" action="add_script.php" method="post" enctype="multipart/form-data">
            <fieldset>
            <!-- récupération des catégories liste déroulante-->
                <?php
                require "connexion_bdd.php"; // Bibliothèque de fonctions
                //$db = connexionBase(); // Fonction de connexion//
                    $requete = "SELECT DISTINCT cat_id, cat_nom FROM categories";//Sélection des différentes catégories//
                    $result = $db->query($requete);

                    if (!$result){
                        $tableauErreurs = $db->errorInfo();
                        echo $tableauErreur[2]; 
                        die("Erreur dans la requête");
                    }

                    if ($result->rowCount() == 0){
                        // Pas d'enregistrement
                        die("La table est vide");
                    }
                    // Création d'un menu déroulant et boucle pour insérer les option//
                    echo "<form name='deroulant' action='' method='post'>";
                    echo "<div class='form-group'>";
                    echo "<label for='sujet'>Catégorie</label>";
                    echo "<select class='form-control' name='cat[]'>";
                    while ($row = $result->fetch(PDO::FETCH_OBJ)){
                                echo "<option value= \"$row->cat_id\">$row->cat_nom</option>";
                    }
                    echo "</select><br>";
                    echo "</form";
                    echo "</div>";
                // Fin de la liste déroulante catégorie//
                ?>
                <!--Ajout d'une référence-->
                <div class="form-group">
                    <label for="ref">Référence</label>
                    <input type="text" class="form-control" name ="ref" id="ref" placeholder="Saisissez la référence" value="">    
                </div>
                <!--Ajout d'un libellé-->
                <div class="form-group">
                    <label for="libel">Libellé</label>
                    <input type="text" class="form-control" name ="libel" id="libel" placeholder="Saisissez le libellé" value="">    
                </div>
                <!--Ajout d'une description-->
                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea class="form-control" name = "desc" id="desc" rows="3"><?php echo $produit->pro_description; ?></textarea>
                <!--Ajout d'un prix-->
                </div>
                <div class="form-group">
                    <label for="prix">Prix</label>
                    <input type="text" class="form-control" name ="prix" id="prix" placeholder="Saisissez le prix" value="">
                <!--Ajout d'un stock-->    
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" name="stock" id="stock" placeholder="Saisissez le stock" value="" >  
                <!--Ajout d'une couleur-->
                </div>
                <div class="form-group">
                    <label for="coul">Couleur</label>
                    <input type="text" class="form-control" name ="coul" id="coul" placeholder="Saisissez la couleur" value="">
                </div>
                <!-- Ajout d'une photo-->
                <div class="form-group">
                    <label for="photo">Photo</label><br>
                    <input type="file" name="photo">
                </div>
                <!-- Date du jour -->
                <div class="form-group">
                    <label for="date">date</label>
                    <input type="text" class="form-control" name ="date" id="date" placeholder="" value="<?php echo date("Y/m/d")?>">
                </div>
                <!--Ajout d'un produit bloqué-->  
                <div class="form-group">
                    Produit bloqué: 
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="bloque" id="" value="oui" checked = "<?php $produit->pro_couleur != NULL; ?>">
                    <label class="form-check-label" for="inlineRadio1">Oui</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="bloque" id="" value="non" checked = "<?php $produit->pro_couleur != NULL; ?>">
                    <label class="form-check-label" for="inlineRadio1">Non</label>
                    </div>
                </div>
                <div class="form-group">
                <!-- Envoyer-->
                <input type="submit" class="btn btn-outline-primary" value="Envoyer" id="">
            </fieldset>             
        </form>
        <br><br><br>
<!--fin du formulaire-->
        </div>
<!--javascript boostrap-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

