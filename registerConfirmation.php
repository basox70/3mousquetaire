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
<div>
    
    <?php


$prenom = $_POST['name'];
$nom = $_POST['surname'];
$mail = $_POST['email'];
$birthDate = $_POST['birthDate'];
$city = $_POST['city'];
$department = $_POST['department'];
$pass = $_POST['pass'];


$pass_hache = sha1($_POST['pass']);


// Insertion
$req = $bdd->prepare('INSERT INTO User(Name, Surname, Mail, BirthDate, City, Department, Password)
                    VALUES(:name, :surname, :mail, :birthDate, :city, :department, :pass)');
$req->execute(array(
    'name' => $prenom,
    'surname' => $nom,
    'mail' => $mail,
    'birthDate' => $birthDate,
    'city' => $city,
    'department' => $department,
    'pass' => $pass_hache));
if (isset($erreur)) echo '<br />',$erreur;


echo "Vous êts bien inscrit au site";

echo '<a href = "index.php"> Retour à l\'accueil </a> ';