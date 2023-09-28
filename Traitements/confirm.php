<?php   

if(isset($_POST['oui'])){
    session_start();
    session_destroy();
    header('Location: ../index.php');
}elseif(isset($_POST['non'])){
    header('Location: ../index.php');
}
