<?php
include "ConfigDB.php";


$prenom = $_POST['name'];
$nom = $_POST['surname'];
$mail = $_POST['email'];
$birthDate = $_POST['birthDate'];
$city = $_POST['city'];
$department = $_POST['department'];
$pass = $_POST['pass'];


echo $prenom;
echo $nom;
echo $mail;
echo $birthDate;
echo $city;
echo $department;
echo $pass;

$pass_hache = sha1($_POST['pass']);

echo $pass_hache;

// Insertion
$req = $bdd->prepare('INSERT INTO User(Name, Surname, Mail, BirthDate, City, Department, Password)
                    VALUES(:name, :surname, :mail, :birthDate, :city, :department, :pass)');
$req->execute(array(
    'name' => $pseudo,
    'surname' => $pass_hache,
    'mail' => $birthDate,
    'birthDate' => $email,
    'city' => $city,
    'department' => $department,
    'pass' => $pass_hache));
if (isset($erreur)) echo '<br />',$erreur;

echo"ok";