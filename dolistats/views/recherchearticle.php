<!DOCTYPE html>
<html lang="Fr">
  <head>
      <title>Dolistats - Recherche articles</title>
      <meta charset="utf-8">
	  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	  <link rel="stylesheet" href="../fontawesome-free-5.10.2-web/css/all.css">
	  <link rel="stylesheet" href="../css/styleRecherche.css"> 
      <link rel="stylesheet" href="../css/testAccordeon.css"> 
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
                        <input type="hidden" name="controller" value="CA">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl;?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey;?>">
                        <button type="submit" class="boutonNavbar"><img class="logoNav" src="../assets/ComparaisonCAMenu.png" 
                        alt="logo CA"></button>
                    </div>
                </form>
			</div>	
			<div class="col-xs-5">
			<!--Espace dans la navbar-->
			</div>
			<div class="col-xs-2">
				<form action="rechercheArticle.php" method="post">				
					<div class="col-xs-7"> Nom Prénom
					<button type="submit" name="deconnexion" value="true" title="Déconnexion">Déconnexion</button> </div>
                    <div class="col-xs-5"><img class="logoNav" src="../assets/Logo.png" alt="logo Doli"></div>
				</form>
			</div>	
		</div>
    </div>
    <div class="container ">
		<div class="row">
            <p class="titre">Rechercher articles</p>
        </div>
		<!-- Recherche par critères -->
		<div class="row">
            <div class="search-box">
                <form action="index.php" method="post" class="form">
                    <label for="search-input" class="sr-only">Rechercher</label>
                    <input type="search" name="recherche" id="search-input" placeholder="Rechercher" value="<?php 
                    if(isset($recherche)) {
                        echo $recherche;
                    }
                    ?>">
                    <input type="hidden" name="controller" value="Articles">
                    <input type="hidden" name="action" value="recherche">
                    <input type="hidden" name="apiUrl" value="<?php echo $apiUrl;?>">
                    <input type="hidden" name="apiKey" value="<?php echo $apiKey;?>">
                    <button type="submit" class="search-button submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
		<!--Liste des clients-->
        <?php   
        if(isset($resultat)) {
        ?>
    
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Réf.</th>
                        <th>Label</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach($resultat as $ligne) {
                    echo "<tr class=\"accordion\">";
                        echo "<td>".$ligne['ref']."</td>";
                        echo "<td>".$ligne['label']."</td>";
                        echo "<td><button class=\"accordion-button\"></button></td>";
                    echo "</tr>";
                    echo "<tr class=\"accordion-content\">";
                        echo "<td></td>";
                        echo "<td>Description : ".$ligne['description']."<br>
                              Prix HT : ".(float)number_format($ligne['price'], 2, '.', '')."<br>
                              Prix TTC : ".(float)number_format($ligne['price_ttc'], 2, '.', '')."<br>
                              Prix min TTC : ".(float)number_format($ligne['price_min_ttc'], 2, '.', '')."<br>
                              Stocks : ".$ligne['stock_reel']."<br>
                              Poids : ".$ligne['height']."</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
        <?php
        }
        ?>
	</div>
    <script>
        const accordionButtons = document.querySelectorAll('.accordion-button');

        for (let i = 0; i < accordionButtons.length; i++) {
        const accordionButton = accordionButtons[i];
        accordionButton.addEventListener('click', function() {

            const accordionRow = this.parentNode.parentNode;
            const accordionContentRow = accordionRow.nextElementSibling;
            accordionContentRow.classList.toggle('active');
        });
        }

    </script>
  </body>
</html>
