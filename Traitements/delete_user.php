<?php
require_once 'config.php';

if (isset($_POST['delete']) || isset($_GET['id_user'])) {
    $id = htmlspecialchars($_GET['id_user']);

    $req = $bdd->prepare("DELETE FROM utilisateurs WHERE id = ?");
    $req->execute(array($id));
    header('Location: ../liste_utilisateurs.php?reg_err=success_delete');
    die();
} else {
    header('Location: ../liste_utilisateurs.php?reg_err=faill_delete');
    die();
};

