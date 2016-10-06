<?php
include "Config.php";
session_start();
?>

<html>
    <head>
        <meta charset="utf-8"/>
        <title>Yardim - Confirmation inscription</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
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


            $prenom = $_POST['name'];
            $nom = $_POST['surname'];
            $nickname = $_POST['Nickname'];
            $mail = $_POST['email'];
            $birthDate = $_POST['birthDate'];
            $city = $_POST['city'];
            $department = $_POST['department'];

            $pass = $_POST['pass'];
            $pass_confirm = $_POST['pass_confirm'];

            $pass_hache = sha1($_POST['pass']);
            $pass_hache2 = sha1($_POST['pass_confirm']);

            // Insertion
            $req = $bdd->prepare('INSERT INTO User(Name, Surname, Mail, BirthDate, City, Department, Password, Nickname)
                                VALUES(:name, :surname, :mail, :birthDate, :city, :department, :pass, :nickname)');

            if (isset($erreur)) echo '<br />',$erreur;

            if($pass_hache == $pass_hache2)
            {
                echo 'Félicitations, vous êtes désormais un nouvel acteur de Yardim ! ';
                echo '<a href = "index.php"> Retour à l\'accueil </a> ';
                $req->execute(array(
                    'name' => $prenom,
                    'surname' => $nom,
                    'mail' => $mail,
                    'birthDate' => $birthDate,
                    'city' => $city,
                    'department' => $department,
                    'pass' => $pass_hache,
                    'nickname' => $nickname));
            }
            else
            {
                echo 'Les Mots de passes ne concordent pas. Veuillez Réessayer.';
                echo '<a href = "index.php">Retour au formulaire d\'inscription</a>';
            }?>
        </div>
    </body>
</html>

