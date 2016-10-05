<?php
require('ConfigDB.php');
session_start();
if(isset($_POST['mail']))
{
    Connection($_POST['mail'],$_POST['password'],$bdd);
}

if($_GET['deconnect'])
{
    session_destroy();
    header("Location: index.php");
}

function Connection($mail, $password,$bdd)
{
    $request = "SELECT * FROM User where mail = \"$mail\"";
    $respond = $bdd->query($request);
    $donnees = $respond->fetch();
    $connected = 1;
    while($donnees && $connected != 2)
    {
        $password= sha1($password);
        if($password == $donnees['Password'])
        {
            $_SESSION['datas'] = $donnees;
            var_dump($_SESSION);
            $connected = 0;
            $_SESSION['connected'] = true;
            echo "Bienvenue ".$_SESSION['datas']['Name'];
            header("Location: index.php");
        }
        else
        {
            $connected = 2;
            echo "Erreur de connexion";
        }
    }
    if ($connected==1)
    {
        echo "Le compte n'existe pas";
    }
}
?>
