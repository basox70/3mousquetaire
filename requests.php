<?php
include('Config.php');
session_start()
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Yardim - Demande</title>
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
            <?php
            if($_GET['type'] == "request") {//echo $_GET['id']; // Récupération de l'ID dans l'URL
                $reponse = $bdd->query('SELECT * FROM Requests WHERE Id =' . $_GET['id']);
                $category = $bdd->query('SELECT * FROM Category c, Requests r WHERE c.Id = r.IdCategory');

                echo '<div class = "container" style="border: 1px solid;">';

                while (($donnees = $reponse->fetch()) && ($cat = $category->fetch())) {
                    echo '<div class="row">';
                    echo '<div class="col-sm-1"></div>';
                    echo '<div class="col-sm-3">Titre</div>';
                    echo '<div class="col-sm-6">' . $donnees['Title'] . '</div>';
                    echo '</div>';

                    echo '<div class="row">';
                    echo '<div class="col-sm-1"></div>';
                    echo '<div class="col-sm-3">Description</div>';
                    echo '<div class="col-sm-6">' . $donnees['Description'] . '</div>';
                    echo '</div>';

                    echo '<div class="row">';
                    echo '<div class="col-sm-1"></div>';
                    echo '<div class="col-sm-3">Catégorie</div>';
                    echo '<div class="col-sm-6">' . $cat['Name'] . '</div>';
                    echo '</div>';

                    echo '<div class="row">';
                    echo '<div class="col-sm-1"></div>';
                    echo '<div class="col-sm-3">Adresse Email de Contact</div>';
                    echo '<div class="col-sm-6">' . $donnees['Mail'] . '</div>';
                    echo '</div>';

                    echo '<div class="row">';
                    echo '<div class="col-sm-1"></div>';
                    echo '<div class="col-sm-3">A effectuer le </div>';
                    echo '<div class="col-sm-6">' . $donnees['Date'] . '</div>';
                    echo '</div>';

                    echo '<div class="row">';
                    echo '<div class="col-sm-1"></div>';
                    echo '<div class="col-sm-3">Pseudo</div>';
                    echo '<div class="col-sm-6">' . $donnees['Nickname'] . '</div>';
                    echo '</div>';

                    echo '<a class="btn btn-success" href="mailto:'.$donnees['Mail'].'">Je contacte</a> ';
                }
            }

            if($_GET['type'] == "offer") {//echo $_GET['id']; // Récupération de l'ID dans l'URL
                $reponse = $bdd->query('SELECT * FROM Offers WHERE Id =' . $_GET['id']);
                $category = $bdd->query('SELECT * FROM Category c, Offers o WHERE c.Id = o.IdCategory ');
                $user = $bdd->query('SELECT * FROM User u, Offers o WHERE u.Id = o.IdCategory ');

                echo '<div class = "container" style="border: 1px solid;">';

                while (($donnees = $reponse->fetch()) && ($cat = $category->fetch()) && ($data = $user->fetch())) {
                    echo '<div class="row">';
                    echo '<div class="col-sm-1"></div>';
                    echo '<div class="col-sm-3">Titre</div>';
                    echo '<div class="col-sm-6">' . $donnees['Title'] . '</div>';
                    echo '</div>';

                    echo '<div class="row">';
                    echo '<div class="col-sm-1"></div>';
                    echo '<div class="col-sm-3">Description</div>';
                    echo '<div class="col-sm-6">' . $donnees['Description'] . '</div>';
                    echo '</div>';

                    echo '<div class="row">';
                    echo '<div class="col-sm-1"></div>';
                    echo '<div class="col-sm-3">Catégorie</div>';
                    echo '<div class="col-sm-6">' . $cat['Name'] . '</div>';
                    echo '</div>';

                    echo '<div class="row">';
                    echo '<div class="col-sm-1"></div>';
                    echo '<div class="col-sm-3">Adresse Email de Contact</div>';
                    echo '<div class="col-sm-6">' . $data['Mail'] . '</div>';
                    echo '</div>';

                    echo '<div class="row">';
                    echo '<div class="col-sm-1"></div>';
                    echo '<div class="col-sm-3">Disponible du </div>';
                    echo '<div class="col-sm-6">' . $donnees['BeginningDate'] . ' au ' . $donnees['EndingDate'] . '</div>';
                    echo '</div>';

                    echo '<div class="row">';
                    echo '<div class="col-sm-1"></div>';
                    echo '<div class="col-sm-3">Pseudo</div>';
                    echo '<div class="col-sm-6">' . $data['Nickname'] . '</div>';
                    echo '</div>';
                }

                echo '<a class="btn btn-success" href="mailto:'.$data['Mail'].'">Je contacte</a> ';
            }
                echo '<a class="btn btn-primary" href="index.php">Page Précedente</a>';
            echo '</div>';
            ?>
        </div>
    </body>
</html>
