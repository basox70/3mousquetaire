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
    <?php
    if($_SESSION && $_SESSION['datas']['Admin']=='1')
    {
        echo "<a class=\"admin\" href\"admin.php\">Administration</a>";
    }
    ?>
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
            echo " <a class=\"btn btn-warning\" href='function.php?deconnect=true' >Deconnexion</a></span>";
        } ?>
    </div>
</div>

<?php

    $pseudo = $_POST['pseudo'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $pass= $_POST['pass'];
    $pass_conf = $_POST['pass_conf'];

    $pass_hache = sha1($_POST['pass']);
    $pass_hache2 = sha1($_POST['pass_conf']);

// Insertion
$req = $bdd->prepare("Update User set Nickname = ':pseudo', City = ':city', Mail = ':mail', Password = ':password') WHERE Id = ".$_SESSION['datas']['Id']);

print_r($req);

    if($pass_hache == $pass_hache2) {

        echo "Vos informations ont été modifié avec Succès ! ";
        $req->execute(array(
            'pseudo' => $pseudo,
            'city' => $city,
            'mail' => $email,
            'password' => $pass_hache
        ));
        print_r($req);
    }
    else
    {
        echo 'Les Mots de passes ne concordent pas. Veuillez Réessayer.';
        echo '<a href = "profile.php">Retour à votre Profil </a>';
    }



?>
