<!DOCTYPE html>
<html lang="Fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../fontawesome-free-5.10.2-web/css/all.css">
    <link rel="stylesheet" href="../css/styleCA.css">
    <title>Dolistats - Chiffre d'affaires</title>
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
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey;?>">
                        <button type="submit" class="boutonNavbar"><img class="logoNav" src="../assets/RechercheArticleMenu.png"
                        alt="logo Recherche Articles"></button>
                    </div>
				</form>
                <form action="index.php" method="post">
                    <div class="col-xs-2">
                        <input type="hidden" name="controller" value="Clients">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl;?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey;?>">
                        <button type="submit" class="boutonNavbar"><img class="logoNav" src="../assets/RechercheClientMenu.png"
                        alt="logo Recherche clients"></button>
                    </div>
                </form>
                <form action="index.php" method="post">
                    <div class="col-xs-2">
                        <input type="hidden" name="controller" value="PalmaresArticles">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl;?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey;?>">
                        <button type="submit" class="boutonNavbar"><img class="logoNav" src="../assets/PalmaresArticlesMenu.png" 
                        alt="logo palmares articles"></button>
                    </div>
				</form>
                <form action="index.php" method="post">
                    <div class="col-xs-2">
                        <input type="hidden" name="controller" value="palmaresClient">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl;?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey;?>">
                        <button type="submit" class="boutonNavbar"><img class="logoNav" src="../assets/PalmaresClientMenu.png" 
                        alt="logo palmares client"></button>
                    </div>
                </form>
                <form action="index.php" method="post">
                    <div class="col-xs-2">
                        <input type="hidden" name="controller" value="chiffreAffaire">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl;?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey;?>">
                        <button type="submit" class="boutonNavbar"><img class="logoNav" src="../assets/ComparaisonCAMenu.png" 
                        alt="logo CA"></button>
                    </div>
                </form>
			</div>	
			<div class="col-md-5 col-sm-3 col-xs-3">
			<!--Espace dans la navbar-->
			</div>
			<div class="col-md-2 col-sm-4 col-xs-4">
				<form action="rechercheArticle.php" method="post">				
					<div class="col-sm-9 col-xs-12" class="deco"> Nom Prénom
					<button type="submit" name="deconnexion" value="true" title="Déconnexion">Déconnexion</button> </div>
                    <div class="col-sm-3 hidden-xs"><img class="logoNav" src="../assets/Logo.png" alt="logo Doli"></div>
				</form>
			</div>	
		</div>
    </div>
    <div class="container ">
		<div class="row">
            <p class="titre">Comparaison du chiffre d'affaires</p>
        </div>
        <!-- Recherche par critères -->
		<div class="row">
            <div class="search-box">
                <form action="comparaisonCA.php" method="post">
                    <!-- OK jusqu'ici -->
                    <div class="col-xs-12 part">
                        <input type="radio" id="quantite" name="choix" selected> <label for="quantite">En mois</label>
                        <input type="radio" id="ca" name="choix"> <label for="ca">En jours</label>
                        De
                        <input type="date" name="dateDe" required>
                        à
                        <input type="date" name="dateA" required>
                    </div>
                    <div class="col-xs-12 part">
                        De
                        <input type="date" name="dateDe" required>
                        à
                        <input type="date" name="dateA" required>
                        <input type="hidden" name="controller" value="palamares">
                        <button type="submit" class="search-button">Comparer</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

