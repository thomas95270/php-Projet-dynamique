<?php
$id_agence = $_GET['id_agence'];
$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root', '');
$sql = "DELETE FROM agence WHERE id_agence= :id_agence;";
$requete = $bdd->prepare($sql);
$requete->bindValue(':id_agence', $id_agence, PDO::PARAM_INT);
$requete->execute();

header('Location: ../gestion_agences.php');
?>