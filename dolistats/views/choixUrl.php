<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../fontawesome-free-5.10.2-web/css/all.css">
    <link rel="stylesheet" href="../css/styleUrl.css"> 
    <title>Dolistats</title>
</head>
<body>
<?php
// Fonction pour lire les données du fichier .ini et créer la liste déroulante correspondante
function createSelectOptions($filename) {
    // Ouvre le fichier .ini et lit les données
    $ini = parse_ini_file($filename, true);

    // Vérifie que la section "urls" existe dans le fichier .ini
    if(isset($ini['urls'])) {
        // Parcours la liste des URLs et crée les options de la liste déroulante
        foreach($ini['urls'] as $key => $url) {
            echo '<option value="' . $url . '">' . $url . '</option>';
        }
    }
}
?>

    <!--Image accueil-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="logoDoli">
                <img class="logo" src="../assets/Logo.png" alt="Logo Doli">
            </div>
        </div>	
    </div>
    <div class="container menu">
        
        <div></div>
        <?php 
        if(isset($error)) {
            ?> 
            <div>
                <p class="enRouge">URL Non valide</p>
            </div>
            <?php
        }
        ?>
        <div class="titre">Dolistats</div>
        <div class="sousTitre">Connexion à votre Dolibarr</div>
        <div class="row"></br></div>
        <div class="row">
            <form id="url-form">
                <input type="text" id="new-url" name="new-url" placeholder="Entrez une URL à ajouter">
                <button type="submit">Ajouter</button>
            </form><br>
        </div>
        <div class="row parent">
            <form action="index.php" method="post">
                <select id="url-list" name="urlUtil" class="select">
                <?php createSelectOptions('others/urls.ini'); ?>
                </select>
                <input type="hidden" name="controller" value="Home">
                <input type="hidden" name="action" value="urlRecup">
                <button type="submit">Valider</button><br/>
                <!-- <button id="delete-url-btn" class="supprimer">Supprimer</button> -->
            </form>
        </div>
        <div class="row url">
            </br>
            <i>L'url doit se finir à : "..../api/index.php/"</i>
        </div>
        <div class="row"></br></div>
    </div>
    <script>

    const urlList = document.getElementById('url-list');
    const urlForm = document.getElementById('url-form');


//     const deleteUrlButton = document.getElementById('delete-url-btn');
//     const urlSelect = document.getElementById('url-list');

// deleteUrlButton.addEventListener('click', () => {
//   const selectedOption = urlSelect.options[urlSelect.selectedIndex];

//   if (selectedOption) {
//     const urlToDelete = selectedOption.value;

//     // Ici, vous pouvez ajouter le code qui supprime l'URL sélectionnée du fichier .ini
//     // Par exemple, vous pouvez utiliser une méthode AJAX pour envoyer une requête au serveur
//     // qui supprime l'URL du fichier .ini.

//     // Ensuite, vous pouvez supprimer l'option de la liste déroulante
//     selectedOption.remove();
//   }
// });

    // Fonction pour ajouter une URL dans la liste déroulante
    function addUrl(url) {
      const option = document.createElement('option');
      option.value = url;
      option.text = url;
      urlList.appendChild(option);
    }

    // Fonction pour récupérer les URLs depuis le serveur
    function loadUrls() {
      fetch('others/get_urls.php')
        .then(response => response.json())
        .then(data => {
          data.urls.forEach(url => {
            addUrl(url);
          });
        });
    }

    // Fonction pour ajouter une nouvelle URL
    function addNewUrl(event) {
  event.preventDefault();

  const newUrl = document.getElementById('new-url').value;

  console.log('Nouvelle URL :', newUrl);

  fetch('others/add_url.php', {
    method: 'POST',
    body: JSON.stringify({ url: newUrl }),
    headers: {
      'Content-Type': 'application/json'
    }
  })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        addUrl(newUrl);
        urlForm.reset();
      } else {
        alert('Une erreur s\'est produite');
      }
    });
}


    // Chargement des URLs au chargement de la page
    loadUrls();

    // Ajout de l'écouteur pour l'ajout d'une URL
    urlForm.addEventListener('submit', addNewUrl);
  </script>
</body>
</html>
