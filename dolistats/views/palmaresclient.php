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
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl;?>">
                        <input type="hidden" name="username" value="<?php echo $username;?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey;?>">
                        <button type="submit" class="boutonNavbar" title="Recherche articles"><img class="logoNav" src="../assets/RechercheArticleMenu.png"
                        alt="logo Recherche Articles"></button>
                    </div>
				</form>
                <form action="index.php" method="post">
                    <div class="col-xs-2">
                        <input type="hidden" name="controller" value="Clients">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl;?>">
                        <input type="hidden" name="username" value="<?php echo $username;?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey;?>">
                        <button type="submit" class="boutonNavbar" title="Recherche clients"><img class="logoNav" src="../assets/RechercheClientMenu.png"
                        alt="logo Recherche clients"></button>
                    </div>
                </form>
                <form action="index.php" method="post">
                    <div class="col-xs-2">
                        <input type="hidden" name="controller" value="PalmaresArticles">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl;?>">
                        <input type="hidden" name="username" value="<?php echo $username;?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey;?>">
                        <button type="submit" class="boutonNavbar" title="Palmares articles"><img class="logoNav" src="../assets/PalmaresArticlesMenu.png" 
                        alt="logo palmares articles"></button>
                    </div>
				</form>
                <form action="index.php" method="post">
                    <div class="col-xs-2">
                        <input type="hidden" name="controller" value="palmaresClient">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl;?>">
                        <input type="hidden" name="username" value="<?php echo $username;?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey;?>">
                        <button type="submit" class="boutonNavbar" title="Palmares clients"><img class="logoNav" src="../assets/PalmaresClientMenu.png" 
                        alt="logo palmares client"></button>
                    </div>
                </form>
                <form action="index.php" method="post">
                    <div class="col-xs-2">
                        <input type="hidden" name="controller" value="chiffreAffaire">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl;?>">
                        <input type="hidden" name="username" value="<?php echo $username;?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey;?>">
                        <button type="submit" class="boutonNavbar" title="Affichage chiffre d'affaire"><img class="logoNav" src="../assets/ComparaisonCAMenu.png" 
                        alt="logo CA"></button>
                    </div>
                </form>
            </div>
            <div class="col-xs-5">
                <!--Espace dans la navbar-->
            </div>
            <div class="col-xs-2">
                <form action="index.php" method="post">
                    <div class="col-xs-7"> <?php echo $username ?>
                        <input hidden name="controller" value="Home">
                        <input hidden name="action" value="deconnexion">
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
                        <input type="hidden" name="username" value="<?php echo $username; ?>">
                        <button type="submit" class="search-button">Valider</span></button>
                    </div>
                </form>
            </div>
        </div>
        <!--Liste des clients rentables-->
        <?php if (isset($resultatFac)) { ?>
            <div class="row">
                <table class="table table-striped">
                    <tr>
                        <th>Nom</th>
                        <th>Chiffre d'affaires</th>
                    </tr>

                    <?php
                    $DonneesFacture = [];
                    $PrixFactures = [];
                    $DonneesClient = [];
                    $NomClient = [];
                    $LigneClient = "";
                    $LignePrix = "";
                    $Titre = "Le prix";
                    $i = 0;
                    date_default_timezone_set('Europe/Paris');
                    foreach ($resultatFac as $CA) {
                        $timestamp = $CA['date']; // renvoie un timestamp
                        $date = date('Y-m-d', $timestamp); // format date bd et input date différents
                        // Dans l'intervalle de date
                        if ($date >= $_POST['dateDe'] && $date <= $_POST['dateA']) {
                        $DonneesFacture[$i] = $CA['socid'];
                        $PrixFactures[$i] = $CA['total_ht'];
                        $i++;
                        // if (array_key_exists($CA['socid'], $DonneesFacture)) {
                        //     $DonneesFacture[$CA['socid']] = $DonneesFacture[$CA['socid']] + $CA['total'];
                        // } else {
                        //     $DonneesFacture[$CA['socid']] = $CA['total'];
                        // }
                        }
                    }

                    $i = 0;
                    foreach ($resultatCli as $nom) {
                        $DonneesClient[$i] = $nom['ref'];
                        $NomClient[$i] = $nom['name'];
                        $i++;
                        // if (array_key_exists($nom['socid'], $DonnesClient)) {
                        //     $DonnesClient[$nom['socid']] = $DonnesClient[$nom['socid']] + $nom['total'];
                        // } else {
                        //     $DonnesClient[$nom['socid']] = $nom['total'];
                        // }
                    }
                    //var_dump($PrixFactures);
                    //var_dump($NomClient);
                    // foreach ($client as $ligne) {
					$bonNomClient = [];
                    for ($i = 0; $i <= count($DonneesFacture) - 1; $i++) {
                        if (in_array($DonneesFacture[$i], $DonneesClient)) {
							$bonNomClient[$i] = $NomClient[$i];
                            echo "<tr>";
                            echo "<td>" . $bonNomClient[$i] . "</td>";     //Vérifier le nom de la variable
                            echo "<td>" . (float)number_format($PrixFactures[$i], 2, '.', '') . "€</td>";      //Vérifier le nom de la variable
                            echo "</tr>";
                        }
                    }
                    echo "</table>";
                    echo "<canvas id=\"myChart\" width=\"200px\" height=\"127.5px\"></canvas>";

                    foreach ($bonNomClient as $key => $value) {
                        if ($LigneClient != "") $LigneClient .= ","; // Mise en forme graphique
                        $LigneClient .= '"' . $value . '"';
                    }
                    foreach ($PrixFactures as $key => $value) {
                        if ($LignePrix != "") $LignePrix .= ","; // Mise en forme graphique
                        $LignePrix .= '"' . $value . '"';
                    }
                    $LigneClient = "[" . $LigneClient . "]";  // Ajout des crochets
                    $LignePrix = "[" . $LignePrix . "]";  // Ajout des crochets 
                    ?>
            </div>
            <script type="text/javascript" src="../jchart4-2-1-Min.js"></script>
            <script>
                // setup 
                const data = {
                    labels: <?php echo $LigneClient; ?>,

                    datasets: [{
                        label: '<?php echo $Titre ?>',
                        data: <?php echo $LignePrix; ?>,
                        backgroundColor: [], // TODO le style

                        borderWidth: 1
                    }]
                };
                for (let i = 0; i < <?php echo count($DonneesFacture); ?>; i++) {
                    const r = Math.floor(Math.random() * 256);
                    const g = Math.floor(Math.random() * 256);
                    const b = Math.floor(Math.random() * 256);
                    const randomColor = `rgb(${r}, ${g}, ${b})`;
                    data.datasets[0].backgroundColor.push(randomColor);
                }

                console.log(data);

                const config1 = {
                    type: 'pie',
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
        <?php } ?>
    </div>
</body>

</html>