<?php

include "Config.php";
session_start();
?>

<html>
<head>
    <meta charset="utf-8"/>
    <title>Yardim - Accueil</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="page-header">
    <div class="">
        <h1><a href="index.php" alt="Yardim" class="">Yardim</a></h1>
    </div>
    <div>
        Connexion
    </div>
    <div><a href="register.php">Inscription</a></div>
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