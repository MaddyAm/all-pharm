<?php
require_once 'config.php';
if (isset($_POST['debloquer']) || isset($_GET['id_user_blq'])) {
    $id = htmlspecialchars($_GET['id_user_blq']);
    $etat = 'autorisé';

    $req = $bdd->prepare('UPDATE utilisateurs SET etat =? WHERE id = "'.$id.'"');

    $req->execute(array($etat));
    header('Location: ../liste_utilisateurs.php?reg_err=success_dblq');
    die();
} else {
    header('Location: ../liste_utilisateurs.php?reg_err=faill_dlq');
    die();
};