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
    <div><a href="register.php">Inscription</a></div>

        Inscription à l'espace membre :<br />
        <form action="registerConfirmation.php" method="post">
            Prénom : <input type="text" name="name" value=""><br />
            Nom : <input type="text" name="surname" value=""><br />
            Mail : <input type="email" name="email" value=""><br />
            Date de Naissance : <input type = "date" name = "birthDate" value = ""><br />
            Ville : <input type = "text" name = "city" value = ""><br />
            Département : <select name="formGender">
                            <option value="">Select...</option>
                            <option value="01">Ain</option>
                            <option value="01">Aisne</option>
                            <option value="03">Allier</option>
                            <option value="04">Alpes-de-Haute-Provence</option>
                            <option value="05">Hautes-Alpes</option>
                            <option value="06">Alpes Maritimes</option>
                            <option value="07">Ardèche</option>
                            <option value="08">Ardennes</option>
                            <option value="09">Ariège</option>
                            <option value="10">Aube</option>
                            <option value="11">Aude</option>
                            <option value="12">Aveyron</option>
                            <option value="13">Bouches-du-Rhône</option>
                            <option value="14">Calvados</option>
                            <option value="15">Cantal</option>
                            <option value="16">Charente</option>
                            <option value="17">Charente-Maritime</option>
                            <option value="18">Cher</option>
                            <option value="19">Corrèze</option>
                            <option value="2A">Corse Du Sud</option>
                            <option value="2B">Haute Corse</option>
                            <option value="21">Côte-d'Or</option>
                            <option value="22">Côtes d'Armor</option>
                            <option value="23">Creuse</option>
                            <option value="24">Dordogne</option>
                            <option value="25">Doubs</option>
                            <option value="26">Drôme</option>
                            <option value="27">Eure</option>
                            <option value="28">Eure-et-Loir</option>
                            <option value="29">Finistère</option>
                            <option value="30">Gard</option>
                            <option value="31">Haute Garonne</option>
                            <option value="32">Gers</option>
                            <option value="33">Gironde</option>
                            <option value="34">Hérault</option>
                            <option value="35">Ille-et-Vilaine</option>
                            <option value="36">Indre</option>
                            <option value="37">Indre-et-Loire</option>
                            <option value="38">Isère</option>
                            <option value="39">Jura</option>
                            <option value="40">Landes</option>
                            <option value="41">Loir-et-Cher</option>
                            <option value="42">Loire</option>
                            <option value="43">Haute Loire</option>
                            <option value="44">Loire Atlantique</option>
                            <option value="45">Loiret</option>
                            <option value="46">Lot</option>
                            <option value="47">Lot-et-Garonne</option>
                            <option value="48">Lozère</option>
                            <option value="49">Maine-et-Loire</option>
                            <option value="50">Manche</option>
                            <option value="51">Marne</option>
                            <option value="52">Haute Marne</option>
                            <option value="53">Mayenne</option>
                            <option value="54">Meurthe-et-Moselle</option>
                            <option value="55">Meuse</option>
                            <option value="56">Morbihan</option>
                            <option value="57">Moselle</option>
                            <option value="58">Nièvre</option>
                            <option value="59">Nord</option>
                            <option value="60">Oise</option>
                            <option value="61">Orne</option>
                            <option value="62">Pas-de-Calais</option>
                            <option value="63">Puy-de-Dôme</option>
                            <option value="64">Pyrénées Atlantiques</option>
                            <option value="65">Hautes Pyrénées</option>
                            <option value="66">Pyrénées Atlantiques</option>
                            <option value="67">Bas-Rhin</option>
                            <option value="68">Haut-Rhin</option>
                            <option value="69">Rhône</option>
                            <option value="70">Haute Saône</option>
                            <option value="71">Saône-et-Loire</option>
                            <option value="72">Sarthe</option>
                            <option value="73">Savoie</option>
                            <option value="74">Haute Savoie</option>
                            <option value="75">Paris</option>
                            <option value="76">Seine Maritime</option>
                            <option value="77">Seine-et-Marne</option>
                            <option value="78">Yvelines</option>
                            <option value="79">Deux-Sèvres</option>
                            <option value="80">Somme</option>
                            <option value="81">Tarn</option>
                            <option value="82">Tarn-et-Garonne</option>
                            <option value="83">Var</option>
                            <option value="84">Vaucluse</option>
                            <option value="85">Vendée</option>
                            <option value="86">Vienne</option>
                            <option value="87">Haute Vienne</option>
                            <option value="88">Vosges</option>
                            <option value="89">Yonne</option>
                            <option value="90">Territoire de Belfort</option>
                            <option value="91">Essonne</option>
                            <option value="92">Hauts-de-Seine</option>
                            <option value="93">Seine-St-Denis</option>
                            <option value="94">Val-de-Marne</option>
                            <option value="95">Val-D'Oise</option>
                            <option value="971">Guadeloupe</option>
                            <option value="972">Martinique</option>
                            <option value="973">Guyane</option>
                            <option value="974">La Réunion</option>
                            <option value="975">Mayotte</option>
                            </select> <br />

            Mot de passe : <input type="password" name="pass" value=""><br />
            Confirmation du mot de passe : <input type="password" name="pass_confirm" value=""><br />
            <input type="submit" name="inscription" value="Inscription">
        </form>
<?php
echo $_GET['name'];


?>
</body>
</html>