<?php
$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root','');
$sql = "SELECT vehicule.photo, vehicule.titre, vehicule.description, vehicule.prix_journalier, agence.titre AS titreAgence
        FROM vehicule
        LEFT JOIN agence
        ON agence.id_agence = vehicule.fk_agence";
$requete = $bdd->prepare($sql);
$requete->execute();
$resultat = $requete->fetchALL(PDO::FETCH_ASSOC);
?>