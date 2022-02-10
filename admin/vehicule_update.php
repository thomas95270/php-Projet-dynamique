<?php
$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root','');
$sql = "UPDATE vehicule
        SET fk_agence = :fk_agence,
                titre = :titre,
                marque = :marque,
                modele = :modele,
                description = :description,
                photo = :photo,
                prix_journalier = :prix_journalier
        WHERE id_vehicule = :id_vehicule;";
$requete = $bdd->prepare($sql);
$requete->bindValue(':fk_agence', $_POST['fk_agence'], PDO::PARAM_INT);
$requete->bindValue(':id_vehicule', $_POST['id_vehicule'], PDO::PARAM_INT);
$requete->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
$requete->bindValue(':marque', $_POST['marque'], PDO::PARAM_STR);
$requete->bindValue(':modele', $_POST['modele'], PDO::PARAM_STR);
$requete->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
$requete->bindValue(':photo', $_POST['photo'], PDO::PARAM_STR);
$requete->bindValue(':prix_journalier', $_POST['prix_journalier'], PDO::PARAM_INT);
$requete->execute();


header('Location: vehicules.php');
?>
