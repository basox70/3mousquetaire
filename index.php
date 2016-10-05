<?php
include ('ConfigDB.php');
session_start();
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
            <div class="connect">
            <?php
            if(!$_SESSION)
            { echo "<a class=\"btn btn-primary\" href='connect.php'>Connexion</a>&nbsp;&nbsp;<a class=\"btn btn-primary\" href=\"register.php\">Inscription</a>"; }
            else
            {
                echo "Bienvenue ".$_SESSION['datas']['Name'];
                echo "&nbsp;&nbsp;<a class=\"btn btn-warning\" href='function.php?deconnect=true' >Deconnexion</a>";
            } ?>
            </div>
        </div>
        <div>

            <div class = "button_add_request">
                <button class ="btn btn-default"><a href = "addRequest.php">Ajouter une Annonce .. </a></button>
            </div>

            <div class = "button_student_offers">
                <button class="btn btn-default">Etudiant ? Postez votre offre .. </button>
            </div>
            <?php

            echo date('Y-m-d');



            $reponse = $bdd->query('SELECT * FROM Requests');
            echo '<table class="table table-bordered" style="width: 75%">';
            echo '<thead>';
            echo '<tr>';
            echo '<th></th>';
            echo '<th>Titre</th>';
            echo '<th>Description</th>';
            echo '<th>Date</th>';
            echo '<th>Departement</th>';
            echo '<th> </th>';
            echo '</tr>';
            echo '</thead>';

            while($donnees = $reponse->fetch())
            {
                echo '<tr>';

                echo '<td>'.$donnees['Id'].'</td>';
                echo '<td>'.$donnees['Title'].'</td>';
                echo '<td>'.$donnees['Description'].'</td>';
                echo '<td>'.$donnees['Date'].'</td>';
                echo '<td>'.$donnees['Department'].'</td>';
                echo '<td><a href = "requests.php?id='.$donnees['Id'].'">J\'y vais</a></td>';
                echo '</tr>';
                echo '<tfoot></tfoot>';

            }
            echo '</table>';

            ?>

        </div>
    </body>
</html>
