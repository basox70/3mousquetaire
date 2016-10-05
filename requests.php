<?php
include ('ConfigDB.php');
?>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Yardim - Accueil</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="page-header">
    <div class="">
        <h1><a href="index.php" alt="Yardim" class="">Yardim</a></h1>
    </div>
    <div>
        Connexion
    </div>
</div>

<div>
    <?php
    echo $_GET['id']; // Récupération de l'ID dans l'URL
    $reponse = $bdd->query('SELECT * FROM Requests WHERE Id ='.$_GET['id']);

    echo '<div class = "container" style="border: 1px solid;">';

    while ($donnees = $reponse->fetch()) {
        echo '<div class="row">';
            echo '<div class="col-sm-1">test</div>';
            echo '<div class="col-sm-3">Titre</div>';
            echo '<div class="col-sm-6">'.$donnees['Title'].'</div>';
        echo '</div>';

        echo '<div class="row">';
            echo '<div class="col-sm-1">test</div>';
            echo '<div class="col-sm-3">Description</div>';
            echo '<div class="col-sm-6">'.$donnees['Description'].'</div>';
        echo '</div>';
    }






    echo '</div>';

    ?>
</div>
</body>
</html>
