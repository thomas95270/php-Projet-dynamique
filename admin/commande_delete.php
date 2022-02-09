<?php
$id_vehicule = $_GET['id_vehicule'];
$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root', '');
$sql = "DELETE FROM vehicule WHERE id_vehicule= :id_vehicule;";
$requete = $bdd->prepare($sql);
$requete->bindValue(':id_vehicule', $id_vehicule, PDO::PARAM_INT);
$requete->execute();

header('Location: vehicules.php');
?>