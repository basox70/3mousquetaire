<?php
include('Config.php');
session_start();
?>
<html>
<head>
        <meta charset="utf-8"/>
        <title>Yardim - Accueil</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
<div class="page-header">
        <div class="pull-left hidden-xs col-xs-4">&nbsp;</div>
        <?php
        if($_SESSION && $_SESSION['datas']['Admin']=='1')
        {
                echo "<a class=\"admin\" href\"admin.php\">Administration</a>";
        }
        ?>
        <div class="pull-left hidden-xs image"><img src="img/logo-simple.png"></div>
        <div class="banner">
                <h1><a href="index.php" class="">Yardim</a></h1>
        </div>
        <div class="description pull-left col-xs-7 hidden-xs">
                <h4><em>Le site d'aide a la personne pour les etudiants</em></h4>
        </div>
        <div class="connect pull-right col-xs-4">
                <?php
                if(!$_SESSION)
                { echo " <span class=\"pull-right\"><a class=\"btn btn-primary\" href='connect.php'>Se connecter</a>&nbsp;<a class=\"btn btn-primary\" href=\"register.php\">S'inscrire</a></span>"; }
                else
                {
                        echo "<span class=\"pull-right\" >Bienvenue ".$_SESSION['datas']['Name']."&nbsp;";
                        if(!$_SESSION['datas']['Admin']=='1')
                        {
                                echo " <a class=\"btn btn-primary\" href=\"profile.php\" >Profil</a>";
                        }
                        echo " <a class=\"btn btn-warning\" href='function.php?deconnect=true' >Deconnexion</a></span>";
                } ?>
        </div>
</div>
<div>
        <?php
        if(!$_SESSION)
        {
                echo "Vous devez être connecté pour publier une offre.";
                echo '<br />';
                echo 'Connectez vous <a href ="connect.php">ici</a>';
        }
        else
        {?>
        <div class="col-xs-3">&nbsp;</div>
        <div class="col-lg-5">
                <p class="form-group">Proposer votre offre ..</p>
                <form action="addOffersConfirmation.php" method="post">

                        <div class="form-group row">
                                <label class="col-xs-3 col-form-label" for='Titre'>Titre : </label>
                                <div class="col-xs-9">
                                        <input class="form-control" type="text" name="title" value=""><br />
                                </div>
                        </div>

                        <div class="form-group row">
                                <label class="col-xs-3 col-form-label" for='Description'>Description : </label>
                                <div class="col-xs-9">
                                        <textarea class="form-control" type="text" rows="4" cols="600" style="display: block name="description" value=""></textarea><br />
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

                                        </select><br />
                                </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-xs-3 col-form-label" for='from'>Disponible à partir de </label>
                                <div class="col-xs-9">
                                        <input class="form-control" type="date" name="dateD" value=""><br />
                                </div>
                        </div>

                        <div class="form-group row">
                                <label class="col-xs-3 col-form-label" for='until'>Jusqu'au </label>
                                <div class="col-xs-9">
                                        <input class="form-control" type="date" name="dateF" value=""><br />
                                </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-xs-3 col-form-label" for='mail'>Votre E-mail </label>
                                <div class="col-xs-9">
                                        <input class="form-control" type="email" name="email" value=""><br />
                                </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-xs-3 col-form-label" for='Tel'>Votre numéro de téléphone *</label>
                                <div class="col-xs-9">
                                        <input class="form-control" type="text" size="10" name="number" value=""><br />
                                </div>
                        </div>

                        <div class="form-group row">
                                <label class="col-xs-3 col-form-label" for='Nom'>Votre Nom</label>
                                <div class="col-xs-9">
                                        <input class="form-control" type = "text" name = "name" value = ""><br />
                                </div>
                        </div>

                        <div class="form-group row">
                                <label class="col-xs-3 col-form-label" for='city'>Ville</label>
                                <div class="col-xs-9">
                                        <input class="form-control" type = "text" name = "city" value = ""><br />
                                </div>
                        </div>

                        <div class="form-group row">
                                <label class="col-xs-3 col-form-label" for='department'>Département</label>
                                <div class="col-xs-9">
                                        <select class="form-control" name="department">
                                                <option value="">Selection...</option>
                                                <?php
                                                echo $departments;
                                                ?>
                                        </select> <br />
                                </div>
                        </div>


                        <input class="btn btn-primary" type="submit" name="addOffers" value="Publier votre Offre">

                </form>
                <?php
                }

                ?>


        </div>