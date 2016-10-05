<?php




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