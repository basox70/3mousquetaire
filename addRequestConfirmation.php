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

    // Insertion
    $req = $bdd->prepare('INSERT INTO Requests(Title, Mail, PhoneNumber, Description, Date, Department, City, Nickname)
                                        VALUES(:title, :email, :number, :description, :date, :department, :city, :name)');


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
            'name' => $name));

        echo "Votre annonce a bien été ajouté. Vous pouvez la retrouver dès maintenant sur la page d'accueil.";
        echo '<a href = "index.php"> Retour à l\'accueil </a> ';

    }


?>
