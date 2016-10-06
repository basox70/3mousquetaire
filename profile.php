<?php
include('Config.php');
session_start();
?>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Yardim - Profil</title>
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
        <h4><em>Le site d'aide a la personne pour les etudiants</em></h4>
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

<form action="modifProfile.php" method="post">
<table class="table table-responsive" style="width: 75%;">
    <tr>
        <td height="26" colspan="2">Vos informations</td>
    </tr>
    <tr>
        <td>Prénom : </td>
        <td><?php echo $_SESSION['datas']['Name']?></td>
    </tr>
    <tr>
        <td>Nom : </td>
        <td><?php echo $_SESSION['datas']['Surname'] ?></td>
    </tr>
    <tr>
        <td>Pseudo : </td>
        <td><input type="text" name="pseudo" value="" <?php echo $_SESSION['datas']['Nickname']?>></td>
    </tr>
    <tr>
        <td>Date de Naissance : </td>
        <td><?php echo $_SESSION['datas']['Birthdate'] ?></td>
    </tr>
    <tr>
        <td>Ville : </td>
        <td><input type="text" name ="city" value="" <?php echo $_SESSION['datas']['City'] ?>></td>
    </tr>
    <tr>
        <td>Département : </td>
        <td><?php echo $_SESSION['datas']['Department'] ?></td>
    </tr>
    <tr>
        <td>Adresse Email : </td>
        <td><input type="email" name="email" value="" <?php echo $_SESSION['datas']['Mail'] ?>></td>
    </tr>
    <tr>
        <td>Votre nouveau Mot de Passe : </td>
        <td><input type="password" name="pass" value=""></td>
    </tr>    <tr>
        <td>Votre Confirmation de Mot de Passe : </td>
        <td><input type="password" name="pass_conf" value=""></td>
    </tr>
</table>

    <input type="submit" name="modifProf" value="Modifier votre Profil">
</form>

</body>
</html>