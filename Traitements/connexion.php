<?php 
    session_start(); // Démarrage de la session
    require_once 'config.php'; // On inclut la connexion à la base de données
if(isset($_POST['connecter'])){
    if(!empty($_POST['email']) && !empty($_POST['psd'])) // Si il existe les champs email, password et qu'il sont pas vident
    {
        // on recupère les informations entrées par l'utilisateur
        $email = htmlspecialchars($_POST['email']); 
        $psd = htmlspecialchars($_POST['psd']);
        
        $email = strtolower($email); // email transformé en minuscule
        
        // On vrérifie si l'utilisateur est inscrit dans la table utilisateurs
        $check = $bdd->prepare('SELECT nom, email, psd, etat, statut FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        // Si $row est > à 0 alors l'utilisateur existe
        if($row > 0)
        {
            // Si le mail est bon niveau format
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // Si le mot de passe est le bon
                if(password_verify($psd, $data['psd']))
                {
                    //on verifie si l'utilisateur est bloqué
                     // On vrérifie si l'utilisateur est inscrit dans la table utilisateurs
                    $check = $bdd->prepare('SELECT etat FROM utilisateurs WHERE email = ?');
                    $check->execute(array($email));
                    $datablq = $check->fetch();
                    $rows = $check->rowCount();
                    if($datablq["etat"] !== "autorisé"){
                        header('Location: ../auth-forms/html/auth-login-basic.php?login_err=blq'); die();
                    }else{
                        // On crée la session et on redirige sur index.php
                        $_SESSION['user'] = $data['nom'];
                        $_SESSION['statut'] = $data['statut'];
                        header('Location: ../index.php');
                        die();
                    }
                    
                }else{ header('Location: ../auth-forms/html/auth-login-basic.php?login_err=psd'); die(); }
            }else{ header('Location: ../auth-forms/html/auth-login-basic.php?login_err=email'); die(); }
        }else{ header('Location: ../auth-forms/html/auth-login-basic.php?login_err=no_account'); die(); }
    }else{ header('Location: ../auth-forms/html/auth-login-basic.php?login_err=f_vide'); die();} // si le formulaire est envoyé sans aucune données
}
