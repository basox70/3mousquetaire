<?php

    define("HOST_BDD", "37.59.98.99"); // Host de la base de données
    define("NAME_BDD", "mousquetaire"); // Nom de la base de données
    define("USER_BDD", "mousquetaire"); // Identifiant pour se connecter à la base de données
    define("PASS_BDD", "mousquetaire");

    try
    {
        $bdd = new PDO('mysql:host='.HOST_BDD.';dbname='.NAME_BDD.';charset=utf8', USER_BDD , PASS_BDD);
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
?>