<?php
include "Config.php";
session_start();
?>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Yardim - Demande</title>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <!--<link href="css/normalize.css" rel="stylesheet"/>-->
    <link href="css/style.css" rel="stylesheet"/>
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

<div>
    <div class="col-xs-3">&nbsp;</div>
    <div class="col-lg-5">
        <p class="form-group">Proposer une nouvelle annonce ...</p>

        <form action="addRequestConfirmation.php" method="post">
            <div class="form-group row">
                <label class="col-xs-3 col-form-label" for='Titre'>Titre : </label>
                <div class="col-xs-9">
                    <input class="form-control" type="text" name="title" value="">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-xs-3 col-form-label" for='Description'>Description : </label>
                <div class="col-xs-9">
                    <textarea class="form-control" type="text" rows="4" cols="600" style="display: block;" name="description" value=""></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-xs-3 col-form-label" for='Categorie'>Catégorie : </label>
                <div class="col-xs-9">
                    <select class="form-control" name = "categorie">
                        <?php
                        $categories = $bdd->query("SELECT * FROM Category");
                        while ($categorie = $categories->fetch()) {
                            echo "<option value=".$categorie['Id'].">".$categorie['Name']."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-xs-3 col-form-label" for='date'>A effectuer pour le : </label>
                <div class="col-xs-9">
                    <input class="form-control" type="date" name="date" value="">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xs-3 col-form-label" for='mail'>Email : </label>
                <div class="col-xs-9">
                    <input class="form-control" type="email" name="email" value="">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xs-3 col-form-label" for='Phone'>Numero de téléphone : </label>
                <div class="col-xs-9">
                    <input class="form-control" type="text" size="10" name="number" value="">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xs-3 col-form-label" for='Name'>Votre nom : </label>
                <div class="col-xs-9">
                    <input class="form-control" type = "text" name = "name" value = "">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-xs-3 col-form-label" for='City'>Ville : </label>
                <div class="col-xs-9">
                    <input class="form-control" type = "text" name = "city" value = "">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xs-3 col-form-label" for='Departement'>Département : </label>
                <div class="col-xs-9">
                    <select class="form-control" name="department">
                </div>
            </div>
            <div class="col-xs-9">
                <option value="">Select...</option>
                <?php echo $departments ?>
                </select>
            </div>
    </div>

    <input class="btn btn-primary" type="submit" name="addRequest" value="Ajouter l'annonce">
    </form>
</div>
</body>
</html>
