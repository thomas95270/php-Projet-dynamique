<?php
session_start();
echo '<pre>';
var_dump($_POST);
echo '</pre>';

$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root','');
$sql = "INSERT INTO commande(fk_membre, fk_vehicule, fk_agence,
                    date_heure_depart, date_heure_fin,
                    prix_total, date_enregistrement)
        VALUES(:fk_membre, :fk_vehicule, :fk_agence,
                    :date_heure_depart, :date_heure_fin,
                    :prix_total, :date_enregistrement);";
$requete = $bdd->prepare($sql);
$requete->bindValue(':fk_membre', $_POST['id_membre'], PDO::PARAM_INT);
$requete->bindValue(':fk_vehicule', $_POST['id_vehicule'], PDO::PARAM_INT);
$requete->bindValue(':fk_agence', $_POST['id_agence'], PDO::PARAM_INT);
$requete->bindValue(':date_heure_depart', $_POST['date_depart'], PDO::PARAM_STR);
$requete->bindValue(':date_heure_fin', $_POST['date_fin'], PDO::PARAM_STR);
$requete->bindValue(':prix_total', $_POST['prix_total'], PDO::PARAM_INT);
$requete->bindValue(':date_enregistrement', $_POST['date_enregistrement'], PDO::PARAM_STR);
$requete->execute();
header('Location: ../../mon_compte.php');
?>