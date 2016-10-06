<?php
include('Config.php');
session_start();
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Yardim - Accueil</title>
        <link href="css/bootstrap.css" rel="stylesheet"/>
        <!--<link href="css/normalize.css" rel="stylesheet"/>-->
        <link href="css/style.css" rel="stylesheet"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    </head>
    <body>
        <div class="page-header">
            <div class="pull-left hidden-xs col-xs-4">&nbsp;</div>
            <div class="pull-left hidden-xs image"><img src="img/logo-simple.png"></div>
            <div class="banner">
                <h1><a href="index.php" class="">Yardim</a></h1>
            </div>
            <div class="description pull-left col-xs-7 hidden-xs">
                <h4><em>Le site d'aide a la personne par des etudiants benevoles</em></h4>
            </div>
            <div class="connect pull-right col-xs-4">
                <?php
                if(!$_SESSION)
                { echo " <span class=\"pull-right\"><a class=\"btn btn-primary\" href='connect.php'>Se connecter</a>&nbsp;<a class=\"btn btn-primary\" href=\"register.php\">S'inscrire</a></span>"; }
                else
                {
                    if($_SESSION['datas']['Nickname']== null)
                    {
                        echo "<span class=\"pull-right\" >Bienvenue " . $_SESSION['datas']['Name'] . "&nbsp;";
                    }else
                    {
                        echo "<span class=\"pull-right\" >Bienvenue " . $_SESSION['datas']['Nickname'] . "&nbsp;";
                    }
                    if(!$_SESSION['datas']['Admin']=='1')
                    {
                        echo " <a class=\"btn btn-primary\" href=\"profile.php\" >Profil</a>";
                    }
                    if($_SESSION['datas']['Admin']=='1')
                    {
                        echo "<a class=\"btn btn-danger\" href=\"admin.php\">Administration</a>";
                    }
                    echo " <a class=\"btn btn-warning\" href='function.php?deconnect=true' >Deconnexion</a></span>";
                } ?>
            </div>
        </div>
        <div>
            <div class="col-xs-11">
                <div class="col-lg-3">
                    <a class="btn btn-default btn-block" href="addRequest.php">Ajouter une annonce</a>
                </div>
                <div class="col-lg-3">
                    <a class="btn btn-default btn-block" href="addOffers.php">Etudiant? Postez votre offre</a>
                </div><br/>
            </div>

            <?php
            //demandes
            $reponse = $bdd->query('SELECT * FROM Requests');
            echo '<div class="col-xs-3 hidden-xs hidden-sm">&nbsp;</div>';
            echo '<div class="col-lg-7 col-xs-7" style="height:350px; overflow:auto;">';
            echo '<table class="table table-bordered" >';
            echo '<thead>';
            echo '<th>Titre</th>';
            echo '<th>Description</th>';
            echo '<th>Date</th>';
            echo '<th>Departement</th>';
            echo '<th> </th>';
            echo '</thead>';

            while($donnees = $reponse->fetch())
            {
                echo '<tr>';
                echo '<td>'.$donnees['Title'].'</td>';
                echo '<td>'.$donnees['Description'].'</td>';
                echo '<td>'.$donnees['Date'].'</td>';
                echo '<td>'.$donnees['Department'].'</td>';
                echo '<td><a href = "requests.php?type=request&id='.$donnees['Id'].'">J\'y vais</a></td>';
                echo '</tr>';
            }
            echo '</table>';
            echo'</div>';


            //Offres
            $reponse = $bdd->query('SELECT * FROM Offers');
            echo '<div class="col-xs-3 hidden-xs hidden-sm">&nbsp;</div>';
            echo '<div class="col-lg-7 col-xs-7" style="height:350px; overflow:auto;">';
            echo '<table class="table table-bordered" style="width: 75%;">';
            echo '<thead>';
            echo '<th>Titre</th>';
            echo '<th>Date de début</th>';
            echo '<th>Date de fin</th>';
            echo '<th>Departement</th>';
            echo '<th> </th>';
            echo '</thead>';

            while($donnees = $reponse->fetch())
            {
                echo '<tr>';
                echo '<td>'.$donnees['Title'].'</td>';
                echo '<td>'.$donnees['BeginningDate'].'</td>';
                echo '<td>'.$donnees['EndingDate'].'</td>';
                echo '<td>'.$donnees['Department'].'</td>';
                echo '<td><a href = "requests.php?type=offer&id='.$donnees['Id'].'">Je demande</a></td>';
                echo '</tr>';
            }
            echo '</table>';
            echo'</div>';
            ?>
        </div>
    </body>
</html>
