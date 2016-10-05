<?php
include "ConfigDB.php";
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

    $titre = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $department = $_POST['department'];


    echo $titre;
    echo $description;
    echo $date;
    echo $email;
    echo $number;
    echo $name;
    echo $city;
    echo $department;

// Insertion
$req = $bdd->prepare('INSERT INTO Requests(Title, Mail, PhoneNumber, Description, Date, Department, Nickname)
                    VALUES(:titre, :email, :number, :description, :date, :department, :name)');


if (isset($erreur)) echo '<br />',$erreur;

if(date('d/m/Y') > '06/06/2014')

    echo 'Error';

else

    echo 'Good';


?>
