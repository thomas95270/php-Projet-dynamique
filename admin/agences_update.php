<?php
$id_agence = $_POST['id_agence'];
$titre = $_POST['titre'];
$adresse = $_POST['adresse'];
$ville = $_POST['ville'];
$cp = $_POST['code_postal'];
$description = $_POST['description'];
$photo = $_POST['photo'];


$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root','');
$sql = "UPDATE agence
        SET titre = :titre,
                adresse =:adresse,
                ville = :ville,
                cp = :code_postal,
                description = :description,
                photo = :photo
        WHERE id_agence = :id_agence;";
$requete = $bdd->prepare($sql);
$requete->bindValue(':id_agence', $id_agence, PDO::PARAM_INT);
$requete->bindValue(':titre', $titre, PDO::PARAM_STR);
$requete->bindValue(':adresse', $adresse, PDO::PARAM_STR);
$requete->bindValue(':ville', $ville, PDO::PARAM_STR);
$requete->bindValue(':code_postal', $cp, PDO::PARAM_INT);
$requete->bindValue(':description', $description, PDO::PARAM_STR);
$requete->bindValue(':photo', $photo, PDO::PARAM_STR);
$requete->execute();

header('Location: ../gestion_agences.php');
?>
