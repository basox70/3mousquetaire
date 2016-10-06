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
                <h4><em>Le site d'aide a la personne pour les etudiants</em></h4>
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
                if(!$_SESSION['datas']['Admin']=='1')
                {
                    echo "Vous n'êtes pas autorisé à voir cette page";
                    sleep(5);
                    header("Location: index.php");
                }
                else
                {
                    //USERS
                    $users = $bdd->query('SELECT Id, Name, Surname FROM User');

                    echo "<div class=\"hidden-xs col-xs-3\">&nbsp;</div>";
                    echo "<div class='col-lg-6'>";
                    echo "<form class=\"form-group\" method='post' action='function.php'>";
                    echo "<p>Utilisateurs inscrits :</p>";
                    echo "<input type=\"hidden\" value=\"true\" name=\"deleteUser\" />";
                    echo "<select class=\"form-control\" name=\"user\">";
                    while($user = $users->fetch())
                    {
                        echo "<option value=\"".$user['Id']."\">".$user['Name']." ".$user['Surname']."</option>";
                    }
                    echo "</select><br/>";
                    echo "<input class=\"btn btn-warning\" type=\"submit\" value=\"Supprimer l'(les) utilisateur(s)\"/>";
                    echo "</form>";

                    //DEMANDES
                    $requests = $bdd->query('SELECT Id, Title, Mail FROM Requests');

                    echo "<form class=\"form-group\" method='post' action='function.php'>";
                    echo "<p>Demandes effectuées :</p>";
                    echo "<input type=\"hidden\" value=\"true\" name=\"deleteRequest\" />";
                    echo "<select class=\"form-control\" name=\"request\">";
                    while($request = $requests->fetch())
                    {
                        echo "<option value=\"".$request['Id']."\">\"".$request['Title']."\" posté par : ".$request['Mail']."</option>";
                    }
                    echo "</select><br/>";
                    echo "<input class=\"btn btn-warning\" type=\"submit\" value=\"Supprimer la(les) demande(s)\"/>";
                    echo "</form>";

                    //OFFRES
                    $requests = $bdd->query('SELECT Id, Title FROM Offers');

                    echo "<form class=\"form-group\" method='post' action='function.php'>";
                    echo "<p>Demandes effectuées :</p>";
                    echo "<input type=\"hidden\" value=\"true\" name=\"deleteOffer\" />";
                    echo "<select class=\"form-control\" name=\"offer\">";
                    while($request = $requests->fetch())
                    {
                        echo "<option value=\"".$request['Id']."\">".$request['Title']."</option>";
                    }
                    echo "</select><br/>";
                    echo "<input class=\"btn btn-warning\" type=\"submit\" value=\"Supprimer l'(les) offre(s)\"/>";
                    echo "</form>";

                }
            ?>
        </div>
    </body>
</html>
