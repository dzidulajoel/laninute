<?php
    $dsn = 'mysql:host=localhost;dbname=laminute;charset=utf8';
    $pseudo_utilisateur = 'root';
    $mot_de_passe = '';

    try{
        $config = new PDO($dsn, $pseudo_utilisateur, $mot_de_passe);
    }catch(PDOException $e){
        echo 'Une erreur est survenue !';
    }