<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="fontawesome-free-5.10.2-web/css/all.css">
    <link rel="stylesheet" href="css/recherchearticle.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <p class="titre">RECHERCHER ARTICLES</p>
        </div>
        <div class="row">
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Libellé</th>
                </tr>
                <?php 
                $compteur = 0;
                foreach($articles as $ligne) {
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