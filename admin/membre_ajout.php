<?php
var_dump($_POST);

$date = date('Y-m-d');
/*Connexion bdd*/
$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root','');
/*ecriture requete SQL*/
$sql = "INSERT INTO membre(pseudo, mdp, nom, prenom, email, civilite, statut, date_enregistrement)
        VALUES( :pseudo, :mdp, :nom, :prenom, :email, :civilite, :statut, :date_enregistrement)";
/*preparation de la requete sql vers la BDD*/
$requete = $bdd->prepare($sql);
/*relier les valeurs+ securisation*/
$requete->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
$requete->bindValue(':mdp', $_POST['password'], PDO::PARAM_STR);
$requete->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
$requete->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
$requete->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$requete->bindValue(':civilite', $_POST['civilite'], PDO::PARAM_STR);
$requete->bindValue(':statut', $_POST['statut'], PDO::PARAM_STR);
$requete->bindValue(':date_enregistrement', $date, PDO::PARAM_STR);
/*execution de la requete*/
$requete->execute();

/*redirection vers la page*/
header('Location: ../../../membres.php');
?>