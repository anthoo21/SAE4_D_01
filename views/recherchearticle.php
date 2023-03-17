<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="fontawesome-free-5.10.2-web/css/all.css">
    <link rel="stylesheet" href="css/recherchearticle.css">
    <link rel="stylesheet" href="css/navbar.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
            <!-- <nav>
        <ul class="left-icons">
            <li><img src="icone1.png"></li>
            <li><img src="icone2.png"></li>
            <li><img src="icone3.png"></li>
            <li><img src="icone4.png"></li>
            <li><img src="icone5.png"></li>
        </ul>
        <div class="right-content">
            <img src="logo.png" class="logo">
            <div class="nom">NOM</div>
            <div class="deconnexion">Déconnexion</div>
        </div>
        </nav> -->
        <div class="row">
            <p class="titre">RECHERCHER ARTICLES</p>
        </div>
        <div class="row">
            <div class="search-box">
                <form action="index.php" method="post">
                    <label for="search-input" class="sr-only">Rechercher</label>
                    <input type="search" name="recherche" id="search-input" name="q" placeholder="Rechercher" required>
                    <input type="hidden" name="controller" value="articles">
                    <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="row">
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Libellé</th>
                </tr>
                <?php 
                $compteur = 0;
                foreach($articles as $ligne) {
                    echo "<tr>";
                        echo "<td>".$compteur."</td>";
                        echo "<td>".$ligne['label']."</td>";
                    echo "</tr>";
                    $compteur++;
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>