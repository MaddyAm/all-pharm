<?php
require_once 'config.php';
if (isset($_POST['upgrade']) || isset($_GET['id_user'])) {
    $id = htmlspecialchars($_GET['id_user']);
    $statut = 'pharmacien(ne)';

    $req = $bdd->prepare('UPDATE utilisateurs SET statut =? WHERE id = "'.$id.'"');

    $req->execute(array($statut));
    header('Location: ../liste_utilisateurs.php?reg_err=success_upgrade');
    die();
} else {
    header('Location: ../liste_utilisateurs.php?reg_err=faill_upgrade');
    die();
};