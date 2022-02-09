<?php
 $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

/*Connexion bdd*/
$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root','');
/*ecriture requete SQL*/
$sql = "INSERT INTO agence (titre, adresse, ville, cp, description, photo)
        VALUES( :titre, :adresse, :ville, :cp, :description, :photo)";
/*preparation de la requete sql vers la BDD*/
$requete = $bdd->prepare($sql);
/*relier les valeurs+ securisation*/
$requete->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
$requete->bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR);
$requete->bindValue(':ville', $_POST['ville'], PDO::PARAM_STR);
$requete->bindValue(':cp', $_POST['code_postal'], PDO::PARAM_STR);
$requete->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
$requete->bindValue(':photo', $extension, PDO::PARAM_STR);
/*execution de la requete*/
$requete->execute();

/*redirection vers la page*/
header('Location: ../gestion_agences.php');
?>