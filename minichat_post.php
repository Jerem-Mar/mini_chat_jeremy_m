<?php

// Connexion à la base de données
include 'include/lancement_session.php';

include 'include/connexion.php';
use Colors\RandomColor;
include 'vendor/autoload.php';




// // Insertion du message à l'aide d'une requête préparée

$req = $bdd->prepare('INSERT INTO messages (pseudo, message, date, user_agent, adresse_ip) VALUES(?, ?, NOW(), ?, ?)');

 $req->execute(array($_POST['pseudo'], $_POST['message'], $_SERVER['HTTP_USER_AGENT'],  get_ip()));

 setcookie('pseudo', $_POST['pseudo'], (time() + 365*24*3600), '/', null, false, true);

//Vérification si pseudo est existant

$pseudoExists = $bdd->prepare('SELECT count(*) FROM users where pseudo = ?');

$pseudoExists->execute(array($_POST ['pseudo']));

//Insertion d'une random color si le pseudo n'existe pas

if($pseudoExists->fetchcolumn() === "0"){
    $pseudoExists = $bdd->prepare('INSERT INTO users (pseudo, colors) VALUES(?, ?)');

    $pseudoExists->execute(array($_POST ['pseudo'], RandomColor::one()));
}

// // Redirection du visiteur vers la page du minichat

 //header('Location: index.php#message');

?>