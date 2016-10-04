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
            <div class="btn">
                Connexion
            </div>
        </div>
        <div>
            <?php
            include ('ConfigDB.php');
            $reponse = $bdd->query('SELECT * FROM Requests');

            while($donnees = $reponse->fetch())
            {

                echo '<table class="table table-bordered">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Title</th>';
                echo '<th>Description</th>';
                echo '<th>Mail</th>';
                echo '<th>PhoneNumber</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                echo '<td>'.$donnees['Title'].'</td>';
                echo '<td>'.$donnees['Description'].'</td>';
                echo '<td>'.$donnees['Mail'].'</td>';
                echo '<td>'.$donnees['PhoneNumber'].'</td>';
                echo '</tbody>';
                echo '<tfoot></tfoot>';
                echo '</table>';
            }

            ?>

        </div>
    </body>
</html>
