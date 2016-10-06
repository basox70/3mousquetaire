<?php
include "Config.php";
?>

<html>
<head>
    <meta charset="utf-8"/>
    <title>Yardim - Confirmation demande</title>
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

    $titre = $_POST['title'];
    $description = $_POST['description'];
    $categorie = $_POST['categorie'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $department = $_POST['department'];

    // Insertion
    $req = $bdd->prepare('INSERT INTO Requests(Title, Mail, PhoneNumber, Description, Date, Department, City, Nickname, IdCategory)
                                        VALUES(:title, :email, :number, :description, :date, :department, :city, :name, :categorie)');

    if($date <= date('Y-m-d'))
    {
        echo "Il y a une erreur au niveau de la date, veuillez réessayer ..";
        echo '<a href = "addRequest.php">Retour au formulaire d\'ajout d\'une annonce</a>';
    }
    else
    {
        $req->execute(array(
            'title' => $titre,
            'email' => $email,
            'number' => $number,
            'description' => $description,
            'date' => $date,
            'department' => $department,
            'city' => $city,
            'name' => $name,
            'categorie' => $categorie
            ));

        echo '<br />';

        echo "Votre annonce a bien été ajouté. Vous pouvez la retrouver dès maintenant sur la page d'accueil.";
        echo '<a href = "index.php"> Retour à l\'accueil </a> ';

    }


?>
