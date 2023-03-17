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
		<div class="row col-xs-12">
			<div class="col-xs-5">
                <div class="col-xs-1"><a href="rechercherArticle.php"><img class="logoNav" src="../assets/RechercheArticleMenu.png" alt="logo Recherche Articles"></a></div>
				<div class="col-xs-1"><img class="logoNav" src="../assets/RechercheClientMenu.png" alt="logo Recherche clients"></div>
                <div class="col-xs-1"><img class="logoNav" src="../assets/PalmaresArticlesMenu.png" alt="logo palmares articles"></div>
				<div class="col-xs-1"><img class="logoNav" src="../assets/PalmaresClienrMenu.png" alt="logo palmares client"></div>
                <div class="col-xs-1"><img class="logoNav" src="../assets/ComparaisonCAMenu.png" alt="logo CA"></div>
			</div>	
			<div class="col-xs-4">
			<!--Espace dans la navbar-->
			</div>
			<div class="col-xs-3">
				<form action="rechercheClient.php" method="post">				
					<div class="deco"> Nom Prénom
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
		<!--Recherche par critères-->
		<div class="row espaceB">
			<div class="row rechCri">
				<form class="rechercheCriteres" method="post" action="accueilMedecin.php">
					<div class="col-md-3 col-sm-12 col-xs-12">
						<h3>Recherche par critère :</h3>
					</div>
					<!--Recherche par nom prénom -->
					<div class="col-md-3 col-sm-4 col-xs-12 inputCritere">
						<input type="texte" name="rechercheNom" class="form-control" placeholder="NOM" value="<?php 
						if(isset($_POST['rechercheNom'])) {
							echo $_POST['rechercheNom'];
						} else {
							echo '';
						}
						?>">
					</div>
					<!--Bouton rechercher -->
					<div class="col-md-3 col-sm-4 col-xs-12 divBtn">
						<input type="submit" name="rechercher" value="Rechercher" class="buttonRechercher">
					</div>	
				</form>
			</div>
		</div>
		<!--Liste des patients-->
        <div class="row">
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Libellé</th>
                </tr>
                <?php 
                $compteur = 0;
                foreach($client as $ligne) {
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