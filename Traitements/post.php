<?php
require_once 'config.php'; // On inclu la connexion à la bdd
session_start();
//fin de la connexion a la base de donnees

//si on clique sur le  boutton add
if (isset($_POST['add'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prix = htmlspecialchars($_POST['prix']);
    $quantite = htmlspecialchars($_POST['quantite']);
    $unite = htmlspecialchars($_POST['unite']);
    $type = htmlspecialchars($_POST['type']);
    $description = htmlspecialchars($_POST['description']);

    $date = time();
    $date = date("d/m/Y", $date );

    if (!empty([$nom, $prix, $quantite, $unite, $type, $description])) {
        //on inserre les informations dans les tables publications

        if (isset($_FILES['fichier']) || $_FILES['fichier']['error'] == 0) {
            $dossier = '../images_publiees/';
            $temp_name = $_FILES['fichier']['tmp_name'];
            if (!is_uploaded_file($temp_name)) {
                header('Location: ../index.php?reg_err=err_ri');
                die();
            }
            if ($_FILES['fichier']['size'] >= 5242880) {
                header('Location: ../index.php?reg_err=err_rv');
                die();
            }
            if ($_FILES['fichier']['size'] < 51200) {
                header('Location: ../index.php?reg_err=err_rq');
                die();
            }
            $infosfichier = pathinfo($_FILES['fichier']['name']);
            $extension_upload = $infosfichier['extension'];

            $extension_upload = strtolower($extension_upload);
            $extensions_autorisees = array('png', 'jpg', 'jpg');
            if (!in_array($extension_upload, $extensions_autorisees)) {
                header('Location: ../index.php?reg_err=err_re');
                die();
            }
            require_once 'shuffle.php';
            $nom_img = str_random(45);
            $nom_photo = $nom_img . "." . $extension_upload;
            if (!move_uploaded_file($temp_name, $dossier . $nom_photo)) {
                header('Location: ../index.php?reg_err=err_rt');
                die();
            }
            $ph_name = $nom_photo;
        }

        $req = $bdd->prepare('INSERT INTO medicament( nom, prix, quantite, unite, type, description, date, img) VALUES(:nom, :prix, :quantite, :unite, :type, :description, :date, :img)');

        $req->execute(array('nom' => $nom, 'prix' => $prix,'quantite' => $quantite, 'unite'=>$unite,'type' => $type,'description' => $description,'date' => $date,'img' => $ph_name));

        //si les donnees on été bien inserrées on redirige avec le message suivant
        header('Location: ../index.php?reg_err=success');
    } else {
        header('Location: ../index.php?reg_err=err_r');
    }
    
}
