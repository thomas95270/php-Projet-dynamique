<?php

$extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root','');

$sql = "INSERT INTO agence (titre, adresse, ville, cp, description, photo)
        VALUES( :titre, :adresse, :ville, :cp, :description, :photo)";

$requete = $bdd->prepare($sql);

$requete->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
$requete->bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR);
$requete->bindValue(':ville', $_POST['ville'], PDO::PARAM_STR);
$requete->bindValue(':cp', $_POST['code_postal'], PDO::PARAM_STR);
$requete->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
$requete->bindValue(':photo', $extension, PDO::PARAM_STR);
$requete->execute();

header('Location: agences.php');
?>