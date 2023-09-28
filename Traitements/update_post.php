<?php
require_once 'config.php';
if (isset($_POST['edit'])) {
    $id = htmlspecialchars($_GET['id_post']);
    header('Location: ../edit_form.php?post_id=' . $id . '');
    die();
};

