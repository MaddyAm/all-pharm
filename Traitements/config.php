<?php 
    try
    {
        $bdd = new PDO("mysql:host=localhost;dbname=mady;charset=utf8", "root", "");
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }
