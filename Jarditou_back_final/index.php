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
        <a class="navbar-brand" href="index.php">jarditou.com</a>
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
    <!--image promotion en bannière-->
        <img class="img-fluid" src="src\img\promotion.jpg" alt="promotion" title="promotion">
    <!--colonne 8 à gauche pour écran + 992px, colonne 12 pour écran - 992px;
    colonne 4 à droite pour écran + 992px, colonne 12 - 992px.
    Donc, sur écran - 992 px les colonnes sont l'une sur l'autre
--> <div class="container">
<br><br>
    <h2 class =" text-success text-center">Nos produits</h2>
    <br><br>
    <?php
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
//$db = connexionBase(); // Appel de la fonction de connexion//
$requete = "SELECT * FROM produits WHERE ISNULL(pro_bloque) ORDER BY pro_d_ajout DESC";

$result = $db->query($requete);

if (!$result) 
{
    $tableauErreurs = $db->errorInfo();
    echo $tableauErreur[2]; 
    die("Erreur dans la requête");
}

if ($result->rowCount() == 0) 
{
   // Pas d'enregistrement
   die("La table est vide");
}

echo "<div class='table-responsive'>";
echo "<table class='table table-bordered table-striped'>";
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
echo "</tr>";
echo "</thead>";
echo "<tbody>";

while ($row = $result->fetch(PDO::FETCH_OBJ))
{
    $photo= $row->pro_id.".".$row->pro_photo;
    //echo"<tr class='table-warning'>";//
    echo"<td><img class='img-fluid' src='src\img\\$photo' alt='' title=''width='40%'></td>";
    echo"<td>".$row->pro_id."</td>";
    echo"<td>".$row->pro_cat_id."</td>";
    echo"<td>".$row->pro_ref."</td>";
    //Le lien "detail.php?pro_id" créé une url avec le numéro contenu dans $row->pro_id, qui est récupéré dans le script PHP par une variable GET//
    echo"<td><a href=\"detail.php?pro_id=".$row->pro_id."\" title=\"".$row->pro_libelle."\">$row->pro_libelle</a></td>";
    echo"<td>".$row->pro_prix."</td>";
    echo"<td>".$row->pro_stock."</td>";
    echo"<td>".$row->pro_couleur."</td>";
    echo"</tr>";
}
echo "</tbody>";
echo "</table>"; 
?>
<br>
        
<!--Pied de page pour second menu, liste ordonnée 3 liens-->
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
