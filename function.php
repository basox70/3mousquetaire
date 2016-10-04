<html>
<?php
include ('ConfigDB.php');

function Connexion($mail, $password)
{
    $respond = $bdd->query('SELECT * FROM User where mail = $mail');
    while($donnees = $respond->fetch())
    {
        if($password == respond['password'])
        {
            $_SESSION['name'] = $donnees['name'];
        }

    }


}

?>


</html>