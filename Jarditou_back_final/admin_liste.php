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
        <!--En-tête espace administrateur-->
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
        <h3 class ="text-center">Liste des produits</h3>
        <br>
        <!-- script php: Création de la liste de produits avec connexion à la bdd -->
        <?php
            //Connexion à la bdd //
            require "connexion_bdd.php";
                // Requete préparée pour sélectionner produits dans la bdd//
                $requete = "SELECT * FROM produits WHERE ISNULL(pro_bloque) ORDER BY pro_d_ajout DESC";
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

                echo "<div class='table-responsive'>";
                echo "<table class='table table-bordered'>";
                echo "<thead>";
                echo "<tr>";
                    echo "<th><h4>Photo</h3></th>";
                    echo "<th><h4>ID</h3></th>";
                    echo "<th><h4>Catégorie</th>";
                    echo "<th><h4>Référence</h3></th>";
                    echo "<th><h4>Libellé</h3></th>";
                    echo "<th><h4>Prix</h3></th>";
                    echo "<th><h4>Stock</h3></th>";
                    echo "<th><h4>Couleur</h3></th>";
                    echo "<th><h4>Ajout</h3></th>";
                    echo "<th><h4>Modif</h3></th>";
                    echo "<th><h4>Bloqué</h3></th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row = $result->fetch(PDO::FETCH_OBJ)){
                    $photo= $row->pro_id.".".$row->pro_photo;
                    echo"<tr class='table-secondary'>";
                    echo"<td><img class='img-fluid' src='src\img\\$photo' alt='' title=''width='40%'></td>";
                    echo"<td>".$row->pro_id."</td>";
                    echo"<td>".$row->pro_cat_id."</td>";
                    echo"<td>".$row->pro_ref."</td>";
                    //Le lien "detail.php?pro_id" créé une url avec le numéro contenu dans $row->pro_id, qui est récupéré dans le script PHP par une variable GET//
                    echo"<td><a href=\"admin_detail.php?pro_id=".$row->pro_id."\" title=\"".$row->pro_libelle."\">$row->pro_libelle</a></td>";
                    echo"<td>".$row->pro_prix."</td>";
                    echo"<td>".$row->pro_stock."</td>";
                    echo"<td>".$row->pro_couleur."</td>";
                    echo"<td>".$row->pro_ajout."</td>";
                    echo"<td>".$row->pro_modif."</td>";
                    echo"<td>".$row->pro_bloque."</td>";
                    echo"</tr>";
                }
                echo "</tbody>";
                echo "</table>"; 
        ?>
        <!-- Fin du script php-->
        <br>
        <!-- Bouton d'ajout de produit-->
        <p><a class ="btn btn-outline-primary" href="admin_ajout.php">Ajouter un produit</a></p>
    <!-- Fin container Bootstrap-->
    </div>
<!--javascript bootstrap-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html> 
                   
   