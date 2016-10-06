<?php
include('Config.php');
session_start();
?>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Yardim - Accueil</title>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/normalize.css" rel="stylesheet"/>
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
    <div class="connect">
        <?php
        if(!$_SESSION)
        { echo "<a class=\"btn btn-primary\" href='connect.php'>Se connecter</a> <a class=\"btn btn-primary\" href=\"register.php\">S'inscrire</a>"; }
        else
        {
            echo "Bienvenue ".$_SESSION['datas']['Name'];
            if(!$_SESSION['datas']['Admin']=='1')
            {
                echo " <a class=\"btn btn-primary\" href=\"profile.php\" >Profil</a>";
            }
            echo " <a class=\"btn btn-warning\" href='function.php?deconnect=true' >Deconnexion</a>";
        } ?>
    </div>
</div>

<table class="table table-responsive" width="75%" align="center">
    <tr>
        <td height="26" colspan="2">Your Profile Information </td>
    </tr>
    <tr>
        <td valign="top">>Prénom : </td>
        <td valign="top"><?php echo $_SESSION['datas']['Name'] ?></td>
    </tr>
    <tr>
        <td valign="top">Nom : </td>
        <td valign="top"><?php echo $_SESSION['datas']['Surname'] ?></td>
    </tr>
    <tr>
        <td valign="top">Pseudo : </td>
        <td valign="top"><?php echo $_SESSION['datas']['Nickname'] ?></td>
    </tr>
    <tr>
        <td valign="top">Date de Naissance : </td>
        <td valign="top"><?php echo $_SESSION['datas']['BirthDate'] ?></td>
    </tr>
    <tr>
        <td valign="top">Ville : </td>
        <td valign="top"><?php echo $_SESSION['datas']['City'] ?></td>
    </tr>
    <tr>
        <td valign="top">Département : </td>
        <td valign="top"><?php echo $_SESSION['datas']['Department'] ?></td>
    </tr>
    <tr>
        <td valign="top">Adresse Email : </td>
        <td valign="top"><?php echo $_SESSION['datas']['Mail'] ?></td>
    </tr>
</table>

</body>
</html>