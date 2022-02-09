<?php
echo '<pre>';
var_dump($_POST);
echo '</pre>';

$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root','');

$sql = "INSERT INTO vehicule(fk_agence, titre, marque, modele, description, photo, prix_journalier)
        VALUES (:fk_agence, :titre, :marque, :modele, :description, :photo, :prix_journalier)";
$requete = $bdd->prepare($sql);

$requete->bindValue(':fk_agence', $_POST['fk_agence'], PDO::PARAM_STR);
$requete->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
$requete->bindValue(':marque', $_POST['marque'], PDO::PARAM_STR);
$requete->bindValue(':modele', $_POST['modele'], PDO::PARAM_STR);
$requete->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
$extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
$requete->bindValue(':photo', $extension, PDO::PARAM_STR);
$requete->bindValue(':prix_journalier', $_POST['prix_journalier'], PDO::PARAM_INT);

$requete->execute();

header('Location: vehicules.php');
?>