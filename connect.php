<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Yardim - Connexion</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
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
        <div class="">
            <p>Se connecter</p>
            <div class="col-lg-5">
                <form action="function.php" method="post">
                    <div class="form-group row">
                        <label for='Mail'>Mail :</label>
                        <input class="form-control" type="email" id="Mail" name="mail" placeholder="mail@example.com"/>
                    </div>
                    <div class="form-group row">
                        <label for="Password">Mot de passe :</label>
                        <input class="form-control" type="password" name="password" id="Password" placeholder="Password"/>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Connexion"/>
                </form>
                <p>Pas encore de compte</p>
                <button class="btn btn-primary" href="#">Inscrivez-vous!</button>
            </div>
        </div>
    </body>
</html>
