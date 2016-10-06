<?php

include "Config.php";
session_start();
?>

<html>
<head>
    <meta charset="utf-8"/>
    <title>Yardim - Confirmation Offre</title>
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

echo
$titre = $_POST['title'];
$description = $_POST['description'];
$categorie = $_POST['categorie'];
$dateD = $_POST['dateD'];
$dateF = $_POST['dateF'];
$email = $_POST['email'];
$city = $_POST['city'];
$department = $_POST['department'];

// Insertion
$req = $bdd->prepare('INSERT INTO Offers(Title, Description, BeginningDate, EndingDate, IdCategory, IdUser, City, Department)
                                        VALUES(:title, :description, :dateD, :dateF, :categorie, :user, :city, :department)');

if($dateD <= date('Y-m-d'))
{
    echo "Il y a une erreur au niveau de la date, veuillez réessayer ..";
    echo '<a href = "addOffers.php">Retour au formulaire d\'ajout d\'une annonce</a>';
}
else
{
    $req->execute(array(
        'title' => $titre,
        'description' => $description,
        'dateD' => $dateD,
        'dateF' => $dateF,
        'categorie' => $categorie,
        'user' => $_SESSION['datas']['Id'],
        'city' => $city,
        'department' => $department
    ));

    echo '<br />';

    echo "Votre Offre a bien été ajouté. Vous pouvez la retrouver dès maintenant sur la page d'accueil.";
    echo '<a href = "index.php"> Retour à l\'accueil </a> ';

}


?>
