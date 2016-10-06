<?php
include "Config.php";
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
            <h4><em>Le site d'aide a la personne pour les etudiants</em></h4>
        </div>
    </div>
    <div>
        <?php


        $prenom = $_POST['name'];
        $nom = $_POST['surname'];
        $mail = $_POST['email'];
        $birthDate = $_POST['birthDate'];
        $city = $_POST['city'];
        $department = $_POST['department'];

        $pass = $_POST['pass'];
        $pass_confirm = $_POST['pass_confirm'];

        $pass_hache = sha1($_POST['pass']);
        $pass_hache2 = sha1($_POST['pass_confirm']);

        // Insertion
        $req = $bdd->prepare('INSERT INTO User(Name, Surname, Mail, BirthDate, City, Department, Password)
                            VALUES(:name, :surname, :mail, :birthDate, :city, :department, :pass)');

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
                'pass' => $pass_hache));
        }
        else
        {
            echo 'Les Mots de passes ne concordent pas. Veuillez Réessayer.';
            echo '<a href = "index.php">Retour au formulaire d\'inscription</a>';
        }?>
    </div>
</body>
</html>

