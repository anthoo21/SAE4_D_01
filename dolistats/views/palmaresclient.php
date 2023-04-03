<!DOCTYPE html>
<html lang="Fr">

<head>
    <title>Dolistats - Palmarès client</title>
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
                        <input type="hidden" name="controller" value="palmaresClient">
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
            <p class="titre">Palmarès clients</p>
        </div>
        <!-- Recherche par critères -->
        <div class="row">
            <div class="search-box">
                <form action="index.php" method="post">
                    <div class="col-xs-12 part">
                        Entrez le nombre de clients :
                        <input type="search" name="rechercheNb" id="search-input" placeholder="Nombre de clients" required value="<?php
                                                                                                                                    if (isset($_POST['rechercheNb'])) {
                                                                                                                                        echo $_POST['rechercheNb'];
                                                                                                                                    } else {
                                                                                                                                        echo '';
                                                                                                                                    }
                                                                                                                                    ?>">
                    </div>
                    <div class="col-xs-12 part">
                        De
                        <input type="date" name="dateDe" required>
                        à
                        <input type="date" name="dateA" required>
                        <input type="hidden" name="controller" value="palmaresClient">
                        <input type="hidden" name="action" value="palmares">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl; ?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey; ?>">
                        <button type="submit" class="search-button">Valider</span></button>
                    </div>
                </form>
            </div>
        </div>
        <!--Liste des clients rentables-->
        <div class="row">
            <table class="table table-striped">
                <tr>
                    <th>Nom</th>
                    <th>Chiffre d'affaires</th>
                </tr>

                <?php
                /*
                $DonneesFacture = [];
                $DonnesClient = [];
                foreach ($resultatFac as $CA) {
                    if (array_key_exists($CA['socid'], $DonneesFacture)) {
                        $DonneesFacture[$CA['socid']] = $DonneesFacture[$CA['socid']] + $CA['total'];
                    } else {
                        $DonneesFacture[$CA['socid']] = $CA['total'];
                    }
                }

                foreach ($resultatCli as $nom) {
                    if (array_key_exists($nom['socid'], $DonnesClient)) {
                        $DonnesClient[$nom['socid']] = $DonnesClient[$nom['socid']] + $nom['total'];
                    } else {
                        $DonnesClient[$nom['socid']] = $nom['total'];
                    }
                }

                foreach ($client as $ligne) {
                    echo "<tr>";
                    echo "<td>" . $ligne['nom'] . "</td>";       //Vérifier le nom de la variable
                    echo "<td>" . $ligne['prenom'] . "</td>";  //Vérifier le nom de la variable
                    echo "<td>" . $ligne['ca'] . "</td>";      //Vérifier le nom de la variable
                    echo "</tr>";
                } */
                ?>
            </table>
        </div>
    </div>
</body>

</html>