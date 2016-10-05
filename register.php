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
    <div><a href="registerConfirm.php">Inscription</a></div>

        Inscription à l'espace membre :<br />
        <form action="inscription.php" method="post">
            Prénom : <input type="text" name="name" value=""><br />
            Nom : <input type="text" name="surname" value=""><br />
            Mail : <input type="email" name="email" value=""><br />
            Date de Naissance : <input type = "date" name = "birthDate" value = ""><br />
            Ville : <input type = "text" name = "city" value = ""><br />
            Département : <input type = "text" name = "department" value = ""><br />
            Mot de passe : <input type="password" name="pass" value=""><br />
            Confirmation du mot de passe : <input type="password" name="pass_confirm" value=""><br />
            <input type="submit" name="inscription" value="Inscription">
        </form>
<?php
$pass_hache = sha1($_POST['pass']);

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
?>
</body>
</html>