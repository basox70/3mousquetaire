<?php
include('Config.php');
session_start();
?>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Yardim - Inscription</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
</head>
<body>
    <div class="page-header">
        <div class="image"><img src="img/logo-simple.png"></div>
        <div class="banner">
            <h1><a href="index.php" class="">Yardim</a></h1>
        </div>
        <div class="description">
            <h4><em>Le site d'aide a la personne pour les etudiants</em></h4>
        </div>
    </div>
    <div><a href="register.php">Inscription</a></div>
    <div class="registration">
        <p>Inscription à l'espace membre :</p>
        <form action="registerConfirmation.php" method="post">
            Prénom : <input type="text" name="name" value=""><br />
            Nom : <input type="text" name="surname" value=""><br />
            Mail : <input type="email" name="email" value=""><br />
            Date de Naissance : <input type = "date" name = "birthDate" value = ""><br />
            Ville : <input type = "text" name = "city" value = ""><br />
            Département : <select name="department">
                <option value="">Select...</option>
                <?php echo $departments; ?>
                            </select> <br />

            Mot de passe : <input type="password" name="pass" value=""><br />
            Confirmation du mot de passe : <input type="password" name="pass_confirm" value=""><br />
            <input type="submit" name="inscription" value="Inscription">
        </form>
    </div>
</body>
</html>
