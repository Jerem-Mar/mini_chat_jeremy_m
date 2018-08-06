<?php

// Connexion à la base de données

include 'include/connexion.php';


// Récupération des 10 derniers messages

// $reponse = $bdd->query('SELECT pseudo,  message, date FROM messages ORDER BY ID DESC LIMIT 0, 10');
$pseudoExists = $bdd->query('SELECT m.*, u.colors FROM messages m LEFT OUTER JOIN users u on m.pseudo = u.pseudo ORDER BY ID DESC LIMIT 0, 10');


// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)

foreach (array_reverse($pseudoExists->fetchAll()) as $message) {


   echo '<div class="col-8 list-group-item list-group-item-dark">
             <strong style="color:'.$message["colors"].'" >' . htmlspecialchars($message['pseudo']) . '</strong>
              : ' . htmlspecialchars($message['message']) . 
        '</div> 
        <div class="col-3 list-group-item list-group-item-success">
             ' . ($message['date']) . 
        '</div>';
}
?>