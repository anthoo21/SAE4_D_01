<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../fontawesome-free-5.10.2-web/css/all.css">
    <link rel="stylesheet" href="../css/choixUrl.css"> 
    <title>Document</title>
</head>
<body>
    <div class="container">
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
                <input type="text" name="urlUtil" placeholder="Entrez un n° de groupe"/>
                <input type="hidden" name="controller" value="Home">
                <input type="hidden" name="action" value="urlRecup">
                <button type="submit">Valider</button><br/>
            </form>
        </div>
        <div class="row">
            <p>Rentrez dans le champ ci-dessus le numéro du groupe correspondant</p>
            <p>L'url est sous la forme : "http://dolibarr.iut-rodez.fr/G2022-XX/htdocs/api/index.php/"
                 (XX remplace le numéro du groupe)</p>
        </div>
    </div>
</body>
</html>