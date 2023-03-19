<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../fontawesome-free-5.10.2-web/css/all.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/accueil.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar">
        <div class="navbar-left">
            <form action="index.php" method="post">
                <input type="hidden" name="controller" value="Articles">
                <button type="submit"><img class="logoNav" src="../assets/RechercheArticleMenu.png"
                        alt="logo Recherche Articles" title="Recherche articles"></button>
            </form>
            <form action="index.php" method="post">
                <button type="submit"><img class="logoNav" src="../assets/RechercheClientMenu.png"
                        alt="logo Recherche clients" title="Recherche clients"></button>
            </form>
            <form action="index.php" method="post">
                <button type="submit"><img class="logoNav" src="../assets/PalmaresArticlesMenu.png"
                        alt="logo palmares articles" title="Palmares articles"></button>
            </form>
            <form action="index.php" method="post">
                <button type="submit"><img class="logoNav" src="../assets/PalmaresClientMenu.png"
                        alt="logo palmares client" title="Palmares clients"></button>
            </form>
            <form action="index.php" method="post">
                <button type="submit"><img class="logoNav" src="../assets/ComparaisonCAMenu.png" alt="logo CA"
                        title="Affichage chiffre d'affaire"></button>
            </form>
        </div>
        <div class="navbar-right">
            <span>NOM</span>
            <img src="../assets/Logo.png" alt="Logo">
        </div>
    </nav>
    <div class="container body">
        <div class="row">
            <h1>Bienvenue sur Dolistats !</h1><br>
            <h2>Vous pouvez accéder, depuis la navbar, au différents menus.</h2><br>
            <h3>(recherche articles, recherche clients, ...)</h3>
        </div>
    </div>
</body>

</html>