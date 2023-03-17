<!DOCTYPE html>
<html lang="Fr">
  <head>
      <title>Dolistats - Recherche client</title>
      <meta charset="utf-8">
	  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	  <link rel="stylesheet" href="../fontawesome-free-6.2.1-web/css/all.css">
	  <link rel="stylesheet" href="../css/style.css"> 
  </head>
  
  <body>
	<div class="container nav">
		<!-- Nav-bar -->
		<div class="row"></div>
		<div class="row col-xs-12">
			<div class="col-xs-5">
                <div class="col-xs-2"><a href="rechercherArticle.php"><img class="logoNav" src="../assets/RechercheArticleMenu.png" alt="logo Recherche Articles"></a></div>
				<div class="col-xs-2"><img class="logoNav" src="../assets/RechercheClientMenu.png" alt="logo Recherche clients"></div>
                <div class="col-xs-2"><img class="logoNav" src="../assets/PalmaresArticlesMenu.png" alt="logo palmares articles"></div>
				<div class="col-xs-2"><img class="logoNav" src="../assets/PalmaresClientMenu.png" alt="logo palmares client"></div>
                <div class="col-xs-2"><img class="logoNav" src="../assets/ComparaisonCAMenu.png" alt="logo CA"></div>
			</div>	
			<div class="col-xs-5">
			<!--Espace dans la navbar-->
			</div>
			<div class="col-xs-2">
				<form action="rechercheClient.php" method="post">				
					<div class="col-xs-7"> Nom Prénom
					<button type="submit" name="deconnexion" value="true" title="Déconnexion">Déconnexion</button> </div>
                    <div class="col-xs-1"><img class="logoNav" src="../assets/Logo.png" alt="logo Doli"></div>
				</form>
			</div>	
		</div>
    </div>
    <div class="container ">
		<div class="row">
            <p class="titre">Rechercher clients</p>
        </div>
		<!-- Recherche par critères -->
		<div class="row">
            <div class="search-box">
                <form action="index.php" method="post">
                    <input type="search" name="recherche" id="search-input" placeholder="Libellé de l'article" required value="<?php 
					if(isset($_POST['rechercheNom'])) {
						echo $_POST['rechercheNom'];
					} else {
						echo '';
					}
					?>">
                    <input type="hidden" name="controller" value="articles">
                    <button type="submit" class="search-button"><span class="fa fa-search"></span></button>
                </form>
            </div>
        </div>
		<!--Liste des clients-->
        <div class="row">
            <table class="table table-striped">
                <tr>
                    <th>Réf.</th>
                    <th>Nom</th>
					<th>Code postal</th>
                </tr>
                <?php 
                foreach($client as $ligne) {
                    echo "<tr>";
                        echo "<td>".$ligne['ref']."</td>";	  //Vérifier le nom de la variable
                        echo "<td>".$ligne['label']."</td>";  //Vérifier le nom de la variable
						echo "<td>".$ligne['cp']."</td>";     //Vérifier le nom de la variable
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
	</div>
  </body>
</html>
