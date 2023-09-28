<?php
require_once 'config.php';

if (isset($_POST['delete']) || !empty($_GET['id_post'])) {
    $id = htmlspecialchars($_GET['id_post']);

    $req = $bdd->prepare("DELETE FROM medicament WHERE id = ?");
    $req->execute(array($id));
    header('Location: ../index.php?reg_err=success_delete');
    die();
} else {
    header('Location: ../index.php?reg_err=faill_delete');
    die();
};

