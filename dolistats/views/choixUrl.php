<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../fontawesome-free-5.10.2-web/css/all.css">
    <link rel="stylesheet" href="../css/styleUrl.css"> 
    <title>Document</title>
</head>
<body>
    <!--Image accueil-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="logoDoli">
                <img class="logo" src="../assets/Logo.png" alt="Logo Doli">
            </div>
        </div>	
    </div>
    <div class="container menu">
        
        <div></br></br></br></div>
        <?php 
        if(isset($error)) {
            ?> 
            <div class="row">
                <p class="enRouge">URL Non valide</p>
            </div>
            <?php
        }
        ?>
        <div class="row">
            <form action="index.php" method="post">
                <input type="text" name="urlUtil" placeholder="Entrez une URL de Dolibarr"/>
                <input type="hidden" name="controller" value="Home">
                <input type="hidden" name="action" value="urlRecup">
                <button type="submit">Valider</button><br/>
            </form>
        </div>
        <div class="row url">
            <p>L'url doit être sous la forme : "http://dolibarr.iut-rodez.fr/G2022-XX/htdocs/api/index.php/"</p>
        </div>
        <div></br></br></br></div>
    </div>
</body>
</html
