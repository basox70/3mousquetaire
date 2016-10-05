<?php

    define("HOST_BDD", "37.59.98.99"); // Host de la base de données
    define("NAME_BDD", "mousquetaire"); // Nom de la base de données
    define("USER_BDD", "mousquetaire"); // Identifiant pour se connecter à la base de données
    define("PASS_BDD", "mousquetaire");

    try
    {
        $bdd = new PDO('mysql:host='.HOST_BDD.';dbname='.NAME_BDD.';charset=utf8', USER_BDD , PASS_BDD);
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    
    $departments = "<option value=\"Ain\">Ain</option>
                <option value=\"Aisne\">Aisne</option>
                <option value=\"Allier\">Allier</option>
                <option value=\"Alpes-de-Haute-Provence\">Alpes-de-Haute-Provence</option>
                <option value=\"Hautes-Alpes\">Hautes-Alpes</option>
                <option value=\"Alpes Maritimes\">Alpes Maritimes</option>
                <option value=\"Ardèche\">Ardèche</option>
                <option value=\"Ardennes\">Ardennes</option>
                <option value=\"Ariège\">Ariège</option>
                <option value=\"Aube\">Aube</option>
                <option value=\"Aude\">Aude</option>
                <option value=\"Aveyron\">Aveyron</option>
                <option value=\"Bouches-du-Rhône\">Bouches-du-Rhône</option>
                <option value=\"Calvados\">Calvados</option>
                <option value=\"Cantal\">Cantal</option>
                <option value=\"Charente\">Charente</option>
                <option value=\"Charente-Maritime\">Charente-Maritime</option>
                <option value=\"Cher\">Cher</option>
                <option value=\"Corrèze\">Corrèze</option>
                <option value=\"Corse Du Sud\">Corse Du Sud</option>
                <option value=\"Haute Corse\">Haute Corse</option>
                <option value=\"Côte-d\'Or\">Côte-d\'Or</option>
                <option value=\"Côtes d\'Armor\">Côtes d\'Armor</option>
                <option value=\"Creuse\">Creuse</option>
                <option value=\"Dordogne\">Dordogne</option>
                <option value=\"Doubs\">Doubs</option>
                <option value=\"Drôme\">Drôme</option>
                <option value=\"Eure\">Eure</option>
                <option value=\"Eure-et-Loir\">Eure-et-Loir</option>
                <option value=\"Finistère\">Finistère</option>
                <option value=\"Gard\">Gard</option>
                <option value=\"Haute Garonne\">Haute Garonne</option>
                <option value=\"Gers\">Gers</option>
                <option value=\"Gironde\">Gironde</option>
                <option value=\"Hérault\">Hérault</option>
                <option value=\"Ille-et-Vilaine\">Ille-et-Vilaine</option>
                <option value=\"Indre\">Indre</option>
                <option value=\"Indre-et-Loire\">Indre-et-Loire</option>
                <option value=\"Isère\">Isère</option>
                <option value=\"Jura\">Jura</option>
                <option value=\"Landes\">Landes</option>
                <option value=\"Loir-et-Cher\">Loir-et-Cher</option>
                <option value=\"Loire\">Loire</option>
                <option value=\"Haute Loire\">Haute Loire</option>
                <option value=\"Loire Atlantique\">Loire Atlantique</option>
                <option value=\"Loiret\">Loiret</option>
                <option value=\"Lot\">Lot</option>
                <option value=\"Lot-et-Garonne\">Lot-et-Garonne</option>
                <option value=\"Lozère\">Lozère</option>
                <option value=\"Maine-et-Loire\">Maine-et-Loire</option>
                <option value=\"Manche\">Manche</option>
                <option value=\"Marne\">Marne</option>
                <option value=\"Haute Marne\">Haute Marne</option>
                <option value=\"Mayenne\">Mayenne</option>
                <option value=\"Meurthe-et-Moselle\">Meurthe-et-Moselle</option>
                <option value=\"Meuse\">Meuse</option>
                <option value=\"Morbihan\">Morbihan</option>
                <option value=\"Moselle\">Moselle</option>
                <option value=\"Nièvre\">Nièvre</option>
                <option value=\"Nord\">Nord</option>
                <option value=\"Oise\">Oise</option>
                <option value=\"Orne\">Orne</option>
                <option value=\"Pas-de-Calais\">Pas-de-Calais</option>
                <option value=\"Puy-de-Dôme\">Puy-de-Dôme</option>
                <option value=\"Pyrénées Atlantiques\">Pyrénées Atlantiques</option>
                <option value=\"Hautes Pyrénées\">Hautes Pyrénées</option>
                <option value=\"Pyrénées Atlantiques\">Pyrénées Atlantiques</option>
                <option value=\"Bas-Rhin\">Bas-Rhin</option>
                <option value=\"Haut-Rhin\">Haut-Rhin</option>
                <option value=\"Rhône\">Rhône</option>
                <option value=\"Haute Saône\">Haute Saône</option>
                <option value=\"Saône-et-Loire\">Saône-et-Loire</option>
                <option value=\"Sarthe\">Sarthe</option>
                <option value=\"Savoie\">Savoie</option>
                <option value=\"Haute Savoie\">Haute Savoie</option>
                <option value=\"Paris\">Paris</option>
                <option value=\"Seine Maritime\">Seine Maritime</option>
                <option value=\"Seine-et-Marne\">Seine-et-Marne</option>
                <option value=\"Yvelines\">Yvelines</option>
                <option value=\"Deux-Sèvres\">Deux-Sèvres</option>
                <option value=\"Somme\">Somme</option>
                <option value=\"Tarn\">Tarn</option>
                <option value=\"Tarn-et-Garonne\">Tarn-et-Garonne</option>
                <option value=\"Var\">Var</option>
                <option value=\"Vaucluse\">Vaucluse</option>
                <option value=\"Vendée\">Vendée</option>
                <option value=\"Vienne\">Vienne</option>
                <option value=\"Haute Vienne\">Haute Vienne</option>
                <option value=\"Vosges\">Vosges</option>
                <option value=\"Yonne\">Yonne</option>
                <option value=\"Territoire de Belfort\">Territoire de Belfort</option>
                <option value=\"Essonne\">Essonne</option>
                <option value=\"Hauts-de-Seine\">Hauts-de-Seine</option>
                <option value=\"Seine-St-Denis\">Seine-St-Denis</option>
                <option value=\"Val-de-Marne\">Val-de-Marne</option>
                <option value=\"Val-D\'Oise\">Val-D\'Oise</option>
                <option value=\"Guadeloupe\">Guadeloupe</option>
                <option value=\"Martinique\">Martinique</option>
                <option value=\"Guyane\">Guyane</option>
                <option value=\"La Réunion\">La Réunion</option>
                <option value=\"Mayotte\">Mayotte</option>"
?>