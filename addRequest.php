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
            <p>Proposer une nouvelle annonce ...</p>
            <form action="addRequestConfirmation.php" method="post">
                Titre : <input type="text" name="title" value=""><br />
                Description : <textarea type="text" size="200" style="display: block; width: 20%;" name="description" value=""></textarea><br />

                Catégorie : <select name = "categorie">
                    <?php
                    $categories = $bdd->query("SELECT * FROM Category");
                    while ($categorie = $categories->fetch()) {
                        echo "<option value=".$categorie['Id'].">".$categorie['Name']."</option>";
                    }
                    ?>

                            </select><br />
                A effectuer pour le : <input type="date" name="date" value=""><br />
                Email : <input type="email" name="email" value=""><br />
                Numéro de téléphone : * <input type="text" size="10" name="number" value=""><br />
                Votre nom :  <input type = "text" name = "name" value = ""><br />
                Ville : <input type = "text" name = "city" value = ""><br />
                Département : <select name="department">
                    <option value="">Select...</option>
                    <?php echo $departments ?>
                </select> <br />
                <input type="submit" name="addRequest" value="Ajouter l'annonce">
            </form>
        </div>
    </body>
</html>