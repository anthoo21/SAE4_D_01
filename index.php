<?php
	$erreur = true;
	if(isset($_POST['login']) and $_POST['login']!="" ) {
		$login=htmlspecialchars($_POST['login']);
	} else {
		$login="";
		$erreur = false;
	}
	
	//Récupération du prenom
	if(isset($_POST['password']) and $_POST['password']!="" ) {
		$password=htmlspecialchars($_POST['password']);
	} else {
		$password="";
		$erreur = false;
	}
?>

<!DOCTYPE html>
<html lang="Fr">
  <head>
      <title>Dolistats - Connexion</title>
      <meta charset="utf-8">
	  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	  <link rel="stylesheet" href="fontawesome-free-5.10.2-web/css/all.css">
	  <link rel="stylesheet" href="css/styleConnexion.css"> 
  </head>
  
  <body class="body">
		<!--Image accueil-->
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="logoDoli">
                    <img class="logo" src="assets/Logo.png" alt="Logo Doli">
				</div>
			</div>	
		</div>
		<!--Authentification-->
		<div class="row container menu">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<form action="index.php" method="post">
					<p class="titre">Dolistats</p>
					<?php if($erreur == false) { ?>
						<div class="row">
							<h4 class="enRouge center">Identifiant ou mot de passe incorrect !</h4>
						</div>
					<?php ;} ?>
					<div class="row">
						<!--Identifiant-->
						<div class="col-xs-2"></div>
						<div class="col-xs-3 <?php if($login=="") { echo "enRouge";}?> ">
							<h4>Identifiant : </h4>				
						</div>
						<div class="col-xs-5">
							<input type="text" name="login" class="form-control saisie fond">
						</div>
						<div class="col-xs-2"></div>
					</div>
					<div class="row">
						<!--Mot de passe-->
						<div class="col-xs-2"></div>
						<div class="col-xs-3 <?php if($password=="") { echo "enRouge";}?>">
							<h4>Mot de passe : </h4>
						</div>
						<div class="col-xs-5">
							<input type="password" name="password" class="form-control saisie fond">
						</div>
						<div class="col-xs-2"></div>
					</div>
					<div class="row btnConnect">
						<input type="submit" name="connexion" value="Se connecter" class="buttonConnect">
					</div>
					<?php
					?>
				</form>

			</div>	
		</div>
  </body>
</html>