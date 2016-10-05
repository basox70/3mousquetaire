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

    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $department = $_POST['department'];


    echo $titre;
    echo $description;
    echo $email;
    echo $number;
    echo $name;
    echo $city;
    echo $department;


?>
