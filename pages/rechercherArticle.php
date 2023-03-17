<!DOCTYPE html>
<html lang="Fr">
  <head>
      <title>Dolistats - Connexion</title>
      <meta charset="utf-8">
	  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	  <link rel="stylesheet" href="fontawesome-free-5.10.2-web/css/all.css">
	  <link rel="stylesheet" href="css/style.css"> 
  </head>
  
  <body class="body">
	<div class="container 1">
		<!-- Nav-bar -->
		<div class="row nav">
			<div class="col-md-6 col-sm-12 col-xs-12">
				<img class="logo1" src="" alt="nav bar">
				<img class="logo2" src="" alt="nav bar">
                <img class="logo3" src="" alt="nav bar">
				<img class="logo4" src="" alt="nav bar">
                <img class="logo5" src="" alt="nav bar">
                <div id="Deco">
                    
                </div>
			</div>	
		</div>
		<!--Image accueil-->
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="home">
					Bienvenue sur le site </br></br>de notre cabinet MedSoft
				</div>
			</div>	
		</div>
		<!--Authentification-->
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php if($erreur == true) { ?>
						<div class="row">
							<h3 class="enRouge center">Identifiant ou mot de passe incorrect !</h3>
							<h4 class="enRouge center"><i>Merci de saisir correctement vos coordonnées de connexion !</i></h4>
						</div>
				<?php ;} ?>
					<form action="index.php" method="post">
						<p class="titre">Connexion à mon compte : </p>
						<div class="row">
							<!--Identifiant-->
							<div class="col-md-2 hidden-sm hidden-12"></div>
							<div class="col-md-3 col-sm-12 col-xs-12">
								<label>IDENTIFIANT : </label>				
							</div>
							<div class="col-md-5 col-sm-12 col-xs-12">
								<input type="text" name="login" class="form-control saisie fond">
							</div>
							<div class="col-md-2 hidden-sm hidden-12"></div>
						</div>
						<div class="row">
							<!--Mot de passe-->
							<div class="col-md-2 hidden-sm hidden-12"></div>
							<div class="col-md-3 col-sm-12 col-xs-12">
								<label>MOT DE PASSE : </label>
							</div>
							<div class="col-md-5 col-sm-12 col-xs-12">
								<input type="password" name="password" class="form-control saisie fond">
							</div>
							<div class="col-md-2 hidden-sm hidden-12"></div>
						</div>
						<div class="row divBouton">
							<!--Identifiant et mot de passe dans la BDD : affichage page d'accueil-->
							<input type="submit" name="connexion" value="Me connecter" class="buttonConnect">
						</div>
					</form>
					<?php
					if(isset($authOK)) {
						if($_SESSION['role']=='MED') {
							header ('Location: pages/accueilMedecin.php');
						} else {
							header ('Location: pages/accueilAdmin.php');
						}
					}
					?>
			</div>	
		</div>
	</div>
  </body>
</html>