<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Yardim - Connexion</title>
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
        <div class="">
            <div class="col-xs-3">&nbsp;</div>
            <div class="col-lg-5">
                <p class="form-group">Se connecter</p>
                <form action="function.php" method="post">
                    <div class="form-group row">
                        <label class="col-xs-3 col-form-label" for='Mail'>Mail :</label>
                        <div class="col-xs-9">
                            <input class="form-control" type="email" id="Mail" name="mail" placeholder="mail@example.com"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-3 col-form-label" for="Password">Mot de passe :</label>
                        <div class="col-xs-9">
                            <input class="form-control" type="password" name="password" id="Password" placeholder="Password"/>
                        </div>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Connexion"/><span class="pull-right">Pas encore de compte : <a class="btn btn-primary" href="register.php">Inscrivez-vous!</a></span>
                </form>
            </div>
        </div>
    </body>
</html>
