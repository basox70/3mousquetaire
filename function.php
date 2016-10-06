<?php
require('Config.php');
session_start();


if(isset($_POST['mail']))
{
    Connection($_POST['mail'],$_POST['password'],$bdd);
}
if(isset($_GET['deconnect']))
{
    session_destroy();
    header("Location: index.php");
}
if(isset($_POST['deleteUser']))
{
    var_dump($_POST);
    DeleteUser($_POST['user'], $bdd);
}
if(isset($_POST['deleteRequest']))
{
    DeleteRequest($_POST['request'], $bdd);
}
if(isset($_POST['deleteOffer']))
{
    DeleteRequest($_POST['offer'], $bdd);
}


/**
 * @param $mail
 * @param $password
 * @param $bdd
 */
function Connection($mail, $password, $bdd)
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
            echo "<script language='JavaScript'>alert(\"Erreur de connexion\")</script>";
            sleep(2);
            header("Location: index.php");
        }
    }
    if ($connected==1)
    {
        echo "<script language='JavaScript'>alert(\"Le compte n'existe pas\")</script>";
        sleep(2);
        header("Location: index.php");
    }
}

/**
 * @param $id
 * @param $bdd
 */
function DeleteUser($id, $bdd)
{
    $request = "DELETE FROM User WHERE Id= $id";
    echo $request;
    $req = $bdd->prepare($request);
    $req->execute();
    header("Location: admin.php");
}

/**
 * @param $id
 * @param $bdd
 */
function DeleteRequest($id, $bdd)
{
    $request = "DELETE FROM Requests WHERE Id= $id";
    echo $request;
    $req = $bdd->prepare($request);
    $req->execute();
    header("Location: admin.php");
}

/**
 * @param $id
 * @param $bdd
 */
function DeleteOffer($id, $bdd)
{
    $request = "DELETE FROM Offers WHERE Id= $id";
    echo $request;
    $req = $bdd->prepare($request);
    $req->execute();
    header("Location: admin.php");
}
