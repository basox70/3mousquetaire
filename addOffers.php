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
    <?php
    if(session_id() && $_SESSION['datas']['Admin']=='1')
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
        { echo "<a class=\"btn btn-primary\" href='connect.php'>Connexion</a> <a class=\"btn btn-primary\" href=\"register.php\">Inscription</a>"; }
        else
        {
            echo "Bienvenue ".$_SESSION['datas']['Name'];
            echo " <a class=\"btn btn-warning\" href='function.php?deconnect=true' >Deconnexion</a>";
        } ?>
    </div>
</div>
    <div>
        <?php
            if(!$_SESSION)
            {
                echo "Vous devez être connecté pour publier une offre.";
                echo '<br />';
                echo 'Connectez vous <a href ="connect.php">ici</a>';
            }

        ?>


    </div>