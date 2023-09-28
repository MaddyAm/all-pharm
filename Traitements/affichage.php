<?php 
require_once 'config.php';

$req = $bdd->prepare("SELECT * FROM medicament ORDER BY id DESC");
$req->execute();
$rows = $req->fetchAll();