<html>
<?php
//On récupère les variables
$i = 0;
$temps = time();
$pseudo=$_POST['pseudo'];
$signature = $_POST['signature'];
$email = $_POST['email'];
$website = $_POST['website'];
$localisation = $_POST['localisation'];
$pass = md5($_POST['password']);
$confirm = md5($_POST['confirm']);

//Vérification du pseudo
$query=$db->prepare('SELECT COUNT(*) AS nbr FROM forum_membres WHERE membre_pseudo =:pseudo');
$query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
$query->execute();
$pseudo_free=($query->fetchColumn()==0)?1:0;
$query->CloseCursor();
if(!$pseudo_free)
{
    $pseudo_erreur1 = "Votre pseudo est déjà utilisé par un membre";
    $i++;
}

if (strlen($pseudo) < 3 || strlen($pseudo) > 15)
{
    $pseudo_erreur2 = "Votre pseudo est soit trop grand, soit trop petit";
    $i++;
}

//Vérification du mdp
if ($pass != $confirm || empty($confirm) || empty($pass))
{
    $mdp_erreur = "Votre mot de passe et votre confirmation diffèrent, ou sont vides";
    $i++;
}

<?php

// Création d'un tableau des erreurs
$erreurs_connexion = array();

// Validation des champs suivant les règles
if ($form_connexion->is_valid($_POST)) {

    list($mail, $password) =
        $form_connexion->get_cleaned_data('Mail', 'Password');

    // On veut utiliser le modèle des membres (~/modeles/membres.php)
    include CHEMIN_MODELE.'membres.php';

    // combinaison_connexion_valide() est définit dans ~/modeles/membres.php
    $mail = combinaison_connexion_valide($mail, sha256($password));

    // Si les identifiants sont valides
    if (false !== $id_utilisateur) {

        $infos_utilisateur = lire_infos_utilisateur($id_utilisateur);

        // On enregistre les informations dans la session
        $_SESSION['id']     = $id_utilisateur;
        $_SESSION['pseudo'] = $nom_utilisateur;
        $_SESSION['avatar'] = $infos_utilisateur['avatar'];
        $_SESSION['email']  = $infos_utilisateur['adresse_email'];

        // Affichage de la confirmation de la connexion
        include CHEMIN_VUE.'connexion_ok.php';

    } else {

        $erreurs_connexion[] = "Couple nom d'utilisateur / mot de passe inexistant.";

        // On réaffiche le formulaire de connexion
        include CHEMIN_VUE.'formulaire_connexion.php';
    }

} else {

    // On réaffiche le formulaire de connexion
    include CHEMIN_VUE.'formulaire_connexion.php';
}

?>


</html>