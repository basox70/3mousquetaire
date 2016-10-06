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
        <div class="pull-left hidden-xs col-xs-4">&nbsp;</div>
        <div class="pull-left hidden-xs image"><img src="img/logo-simple.png"></div>
        <div class="banner">
            <h1><a href="index.php" class="">Yardim</a></h1>
        </div>
        <div class="description pull-left col-xs-7 hidden-xs">
            <h4><em>Le site d'aide a la personne par des etudiants benevoles</em></h4>
        </div>
        <div class="connect pull-right col-xs-4">
            <?php
            if(!$_SESSION)
            { echo " <span class=\"pull-right\"><a class=\"btn btn-primary\" href='connect.php'>Se connecter</a>&nbsp;<a class=\"btn btn-primary\" href=\"register.php\">S'inscrire</a></span>"; }
            else
            {
                if($_SESSION['datas']['Nickname']== null)
                {
                    echo "<span class=\"pull-right\" >Bienvenue " . $_SESSION['datas']['Name'] . "&nbsp;";
                }else
                {
                    echo "<span class=\"pull-right\" >Bienvenue " . $_SESSION['datas']['Nickname'] . "&nbsp;";
                }
                if(!$_SESSION['datas']['Admin']=='1')
                {
                    echo " <a class=\"btn btn-primary\" href=\"profile.php\" >Profil</a>";
                }
                if($_SESSION['datas']['Admin']=='1')
                {
                    echo "<a class=\"btn btn-danger\" href=\"admin.php\">Administration</a>";
                }
                echo " <a class=\"btn btn-warning\" href='function.php?deconnect=true' >Deconnexion</a></span>";
            } ?>
        </div>
    </div>
        <div class="registration">
            <div class="col-xs-3">&nbsp;</div>
            <div class="col-lg-5">
                <p class="form-group">Inscription à l'espace membre :</p>
                <form action="registerConfirmation.php" method="post">
                    <div class="form-group row">
                        <label class="col-xs-3 col-form-label" for='Prenom'>Prénom : </label>
                        <div class="col-xs-9">
                            <input class="form-control" type="text" name="name" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-3 col-form-label" for='Nom'>Nom : </label>
                        <div class="col-xs-9">
                            <input class="form-control" type="text" name="surname" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-3 col-form-label" for='Nickname'>Pseudo : </label>
                        <div class="col-xs-9">
                            <input class="form-control" type="text" name="Nickname" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-3 col-form-label" for='Mail'>Mail : </label>
                        <div class="col-xs-9">
                            <input class="form-control" type="email" name="email" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-3 col-form-label" for='DateDeNaissance'>Date de naissance : </label>
                        <div class="col-xs-9">
                            <input class="form-control" type = "date" name = "birthDate" value = "">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-3 col-form-label" for='city'>Ville : </label>
                        <div class="col-xs-9">
                            <input class="form-control" type = "text" name = "city" value = "">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-3 col-form-label" for='departement'>Département : </label>
                        <div class="col-xs-9">
                            <select class="form-control"name="department">
                                <option value="">Selection départment...</option>
                                <?php echo $departments; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-3 col-form-label" for='password'>Mot de passe : </label>
                        <div class="col-xs-9">
                            <input class="form-control" type="password" name="pass" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xs-3 col-form-label" for='pass_confirm'>Confirmation du mot de passe : </label>
                        <div class="col-xs-9">
                            <input class="form-control" type="password" name="pass_confirm" value="">
                        </div>
                    </div>
                    <input class="btn btn-primary"type="submit" name="inscription" value="Inscription">
                </form>
            </div>
        </div>
    </body>
</html>
