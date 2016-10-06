<?php
include('Config.php');
session_start();
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Yardim - Accueil</title>
        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/normalize.css" rel="stylesheet"/>
        <link href="css/style.css" rel="stylesheet"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    </head>
    <body>
        <div class="page-header">
            <?php
            if($_SESSION && $_SESSION['datas']['Admin']=='1')
            {
                echo "<a class=\"admin\" href\"admin.php\">Administration</a>";
            }
            ?>
            <div class="image"><img src="img/logo-simple.png"></div>
            <div class="banner">
                <h1><a href="index.php" class="">Yardim</a></h1>
            </div>
            <div class="description">
                <h4><em>Le site d'aide a la personne pour les etudiants</em></h4>
            </div>
            <div class="connect">
            <?php
            if(!$_SESSION)
            { echo "<a class=\"btn btn-primary\" href='connect.php'>Se connecter</a> <a class=\"btn btn-primary\" href=\"register.php\">S'inscrire</a>"; }
            else
            {
                echo "Bienvenue ".$_SESSION['datas']['Name'];
                if(!$_SESSION['datas']['Admin']=='1')
                {
                    echo " <a class=\"btn btn-primary\" href=\"profile.php\" >Profil</a>";
                }
                echo " <a class=\"btn btn-warning\" href='function.php?deconnect=true' >Deconnexion</a>";
            } ?>
            </div>
        </div>
        <div>

            <div class = "button_add_request">
                <a class="btn btn-default" href="addRequest.php">Ajouter une annonce .. </a>
            </div>

            <div class = "button_student_offers">
                <a class="btn btn-default" href="#">Etudiant ? Postez votre offre .. </a>
            </div>

            <div class="search">
                <form class="form-inline" method="post" action="#">
                    <p>
                        <label for="type">Je recherche</label><br />
                        <select class="form-control" name="type" id="type">
                            <option value="both">Les offres et les demandes</option>
                            <option value="requests">les demandes</option>
                            <option value="offers">les offres</option>
                        </select>
                        <select class="form-control" name="categorie" id="categorie">
                            <option value="all">Toutes catégories</option>
                            <?php
                                $categories = $bdd->query('SELECT * FROM Category');
                                while ($category = $categories->fetch()) {
                                    echo "<option value=".$category['Name'].">".$category['Name']."</option>";
                                }
                            ?>
                        </select>
                        <select class="form-control" name="location" id="locations">
                            <option value="Departement">Tous départements</option>
                            <?php echo $departments; ?>
                        </select>
                        <select class="form-control">
                            <option value="Ville">Toutes Villes</option>
                            <?php
                            $cities = $bdd->query("SELECT DISTINCT(City) FROM Requests UNION SELECT DISTINCT(City) FROM User");
                            while ($city = $cities->fetch()) {
                                echo "<option value=".$city['City'].">".$city['City']."</option>";
                            }
                            ?>
                        </select>
                        <button class="btn btn-primary">RECHERCHER</button>
                        </select>
                    </p>
                </form>
            </div>

            <?php

            $reponse = $bdd->query('SELECT * FROM Requests');
            echo '<div style="width: 75*; height:400px; overflow:auto;">';
            echo '<table class="table table-bordered" style="width: 75%;">';
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
            }
            echo '</table>';
            echo'</div>';
            ?>
        </div>
    </body>
</html>
