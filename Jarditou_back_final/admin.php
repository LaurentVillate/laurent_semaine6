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
    </div>
<!--javascript boostrap-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
