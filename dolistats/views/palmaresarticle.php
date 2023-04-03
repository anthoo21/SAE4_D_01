<!DOCTYPE html>
<html lang="Fr">

<head>
    <title>Dolistats - Palmarès articles</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../fontawesome-free-5.10.2-web/css/all.css">
    <link rel="stylesheet" href="../css/stylePalmares.css">
</head>

<body>
    <div class="container nav">
        <!-- Nav-bar -->
        <div class="row"></div>
        <div class="row col-xs-12">
            <div class="col-xs-5">
                <form action="index.php" method="post">
                    <div class="col-xs-2">
                        <input type="hidden" name="controller" value="Articles">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl; ?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey; ?>">
                        <button type="submit" class="boutonNavbar"><img class="logoNav" src="../assets/RechercheArticleMenu.png" alt="logo Recherche Articles"></button>
                    </div>
                </form>
                <form action="index.php" method="post">
                    <div class="col-xs-2">
                        <input type="hidden" name="controller" value="Clients">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl; ?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey; ?>">
                        <button type="submit" class="boutonNavbar"><img class="logoNav" src="../assets/RechercheClientMenu.png" alt="logo Recherche clients"></button>
                    </div>
                </form>
                <form action="index.php" method="post">
                    <div class="col-xs-2">
                        <input type="hidden" name="controller" value="PalmaresArticles">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl; ?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey; ?>">
                        <button type="submit" class="boutonNavbar"><img class="logoNav" src="../assets/PalmaresArticlesMenu.png" alt="logo palmares articles"></button>
                    </div>
                </form>
                <form action="index.php" method="post">
                    <div class="col-xs-2">
                        <input type="hidden" name="controller" value="PalmaresClients">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl; ?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey; ?>">
                        <button type="submit" class="boutonNavbar"><img class="logoNav" src="../assets/PalmaresClientMenu.png" alt="logo palmares client"></button>
                    </div>
                </form>
                <form action="index.php" method="post">
                    <div class="col-xs-2">
                        <input type="hidden" name="controller" value="CA">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl; ?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey; ?>">
                        <button type="submit" class="boutonNavbar"><img class="logoNav" src="../assets/ComparaisonCAMenu.png" alt="logo CA"></button>
                    </div>
                </form>
            </div>
            <div class="col-xs-5">
                <!--Espace dans la navbar-->
            </div>
            <div class="col-xs-2">
                <form action="rechercheArticle.php" method="post">
                    <div class="col-xs-7"> Nom Prénom
                        <button type="submit" name="deconnexion" value="true" title="Déconnexion">Déconnexion</button>
                    </div>
                    <div class="col-xs-5"><img class="logoNav" src="../assets/Logo.png" alt="logo Doli"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <p class="titre">Palmarès Articles</p>
        </div>
        <!-- Recherche par critères -->
        <div class="row">
            <div class="search-box A">
                <form action="index.php" method="post">
                    <div class="col-xs-12 part">
                        Entrez le nombre d'articles :
                        <input class="nb" type="search" name="rechercheNb" id="search-input" required value="<?php
                                                                                                                if (isset($_POST['rechercheNb'])) {
                                                                                                                    echo $_POST['rechercheNb'];
                                                                                                                } else {
                                                                                                                    echo '';
                                                                                                                }
                                                                                                                ?>">
                        <input type="radio" id="quantite" name="choix"> <label for="quantite">En quantité</label>
                        <input type="radio" id="ca" name="choix"> <label for="ca">En chiffre d'affaires</label>
                    </div>
                    <div class="col-xs-12 part">
                        De
                        <input type="date" name="dateDe" required>
                        à
                        <input type="date" name="dateA" required>
                        <input type="hidden" name="controller" value="palamares">
                        <button type="submit" class="search-button">Valider</span></button>
                    </div>
                </form>
            </div>
        </div>
        <!--Liste des clients rentables-->
        <div class="row">
            <table class="table table-striped">
                <tr>
                    <th>Réf.</th>
                    <th>Désignation</th>
                    <th>Chiffre d'affaires</th>
                </tr>
                <?php
                // foreach($client as $ligne) {
                //     echo "<tr>";
                //         echo "<td>".$ligne['ref']."</td>";	   //Vérifier le nom de la variable
                //         echo "<td>".$ligne['label']."</td>";  
                // 		echo "<td>".$ligne['ca']."</td>";      //Vérifier le nom de la variable
                //     echo "</tr>";
                // } 
                ?>
            </table>
        </div>
        <form action="index.php" method="post" class="form">
            <input type="hidden" name="controller" value="PalmaresArticles">
            <input type="hidden" name="action" value="palmares">
            <input type="hidden" name="apiUrl" value="<?php echo $apiUrl; ?>">
            <input type="hidden" name="apiKey" value="<?php echo $apiKey; ?>">
            <button type="submit" class="button submit"></i></button>
        </form>
        <div class="row">
            <div class="col-xs-3 "></div>
            <div class="col-xs-6">
                <h1>Exemple Diagramme Barres</h1>
                <canvas id="myChart" width="400" height="225"></canvas>
            </div>
        </div>
        <?php

        //var_dump($resultat);
        $Donnees = [];
        //$Donnees1 = [];
        //$Donnees2 = [];
        //$Donnees['Quantite'] = '';
        $ligneLibelle = "";
        $ligneQuantite = "";
        $LeTitre = "Produits le plus vendue en quantité";
        $sommeqty = 0;
        foreach ($resultat as $ligne) {
            foreach ($ligne['lines'] as $wanted) {
                //$Donnees1[] .= $wanted['libelle'];
                //$Donnees2[] .= $wanted['qty'];
                $Donnees[$wanted['libelle']] = '';
                var_dump(str_contains($Donnees[$wanted['libelle']],$wanted['libelle']));
                var_dump($Donnees[$wanted['libelle']]);
                var_dump($wanted['libelle']);
                if (in_array($wanted['libelle'],array($Donnees[$wanted['libelle']]))) {
                    $Donnees[$wanted['libelle']] .= $wanted['qty'] + $wanted['qty'];
                }
                $Donnees[$wanted['libelle']] .= $wanted['qty'];
                var_dump($Donnees);
                //echo $wanted['ref']."<br>";
            }
        }
        /*
        foreach ($Donnees1 as $donnees) {
            if ($ligneLibelle != "") $ligneLibelle .= ",";
            $ligneLibelle .= '"' . $donnees . '"';
            if (str_contains($ligneLibelle,$donnees)) {
                substr($ligneLibelle,strlen($donnees),-strlen($donnees));
            } 
        }
        foreach ($Donnees2 as $donnees) {
            if ($ligneQuantite != "") $ligneQuantite .= ",";
            $ligneQuantite .= '"' . $donnees . '"';
        } */

        foreach($Donnees as $label=>$quantite) {
            if ($ligneLibelle!="") $ligneLibelle.=",";
            $ligneLibelle.='"'.$label.'"' ;
            
            if ($ligneQuantite!="") $ligneQuantite.=",";
            $ligneQuantite.='"'.$quantite.'"' ;
        }
        $ligneLibelle = "[" . $ligneLibelle . "]";  // Ajout des crochets
        $ligneQuantite = "[" . $ligneQuantite . "]";  // Ajout des crochets
        var_dump($ligneLibelle);
        var_dump($ligneQuantite);
        ?>
    </div>  
    <script type="text/javascript" src="../jchart4-2-1-Min.js"></script>
        <script>
            // setup 
            const data = {
                labels: <?php echo $ligneLibelle; ?>, 

                datasets: [{
                    label: '<?php echo $LeTitre; ?>', 
                    data: <?php echo $ligneQuantite; ?>, 
                    backgroundColor: 'rgb(255, 99, 132)', // TODO le style

                    borderWidth: 1
                }]
            };
            console.log(data);

            const config1 = {
                type: 'bar',
                data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };
            const myChart = new Chart(document.getElementById('myChart'), config1);
        </script>
</body>

</html>