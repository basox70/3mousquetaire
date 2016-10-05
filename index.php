<?php
include('Config.php');
session_start();
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Yardim - Accueil</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    </head>
    <body>
        <div class="page-header">
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
            <div class="search">
                <form method="post" action="#">
                    <p>
                        <label for="type">Je recherche</label><br />
                        <select name="type" id="type">
                            <option value="both">Les offres et les demandes</option>
                            <option value="requests">les demandes</option>
                            <option value="offers">les offres</option>
                        </select>
                        <select name="categorie" id="categorie">
                            <option value="all">Toutes catégories</option>
                            <?php
                                $categories = $bdd->query('SELECT * FROM Category');
                                while ($category = $categories->fetch()) {
                                    echo "<option value=".$category['Name'].">".$category['Name']."</option>";
                                }
                            ?>
                        </select>
                        <select name="location" id="locations">
                            <option value="Departement">Tous départements</option>
                            <?php echo $departments; ?>
                        </select>
                        <select>
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

            }
            echo '</table>';

            ?>

        </div>
    </body>
</html>
