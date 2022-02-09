<?php
$id_membre = $_GET['id_membre'];
$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root', '');
$sql = "DELETE FROM membre WHERE id_membre= :id_membre;";
$requete = $bdd->prepare($sql);
$requete->bindValue(':id_membre', $id_membre, PDO::PARAM_INT);
$requete->execute();

header('Location: ../../../membres.php');
?>