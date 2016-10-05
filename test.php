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

    echo "bonjour";
    $reponse = $bdd->query('SELECT * FROM Requests');
    echo '<table class="table table-bordered" style="width: 75%">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Titre</th>';
    echo '<th>Description</th>';
    echo '<th>Date</th>';
    echo '<th>Departement</th>';
    echo '<th> </th>';
    echo '</tr>';
    echo '</thead>';

    while($donnees = $reponse->fetch())
    {

        echo '<tbody>';

        echo '<td>'.$donnees['Id'].'</td>';
        echo '<td>'.$donnees['Title'].'</td>';
        echo '<td>'.$donnees['Description'].'</td>';
        echo '<td>'.$donnees['Date'].'</td>';
        echo '<td>'.$donnees['Department'].'</td>';
        echo '<td><a href = "requests.php">J\'y vais</a></td>';
        echo '</tbody>';
        echo '<tfoot></tfoot>';

    }
    echo '</table>';

    ?>

</div>
</body>
</html>
