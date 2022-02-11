<?php
$mdp=$_POST['password'];
$options = ['cost' => 12];
$mdp = password_hash(trim($_POST['password']), PASSWORD_DEFAULT, $options);
$nom =  $_POST['nom'];
$nom= addslashes(mb_convert_case(strtolower($_POST['nom']), MB_CASE_TITLE, 'UTF-8'));
$prenom =  $_POST['prenom'];
$prenom= addslashes(mb_convert_case(strtolower($_POST['prenom']), MB_CASE_TITLE, 'UTF-8'));
$email=$_POST['email'];
$email= strtolower($_POST['email']);
$date = date('Y-m-d');
/*Connexion bdd*/
$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root','');
/*ecriture requete SQL*/
$sql = "INSERT INTO membre(pseudo, mdp, nom, prenom, email, civilite, statut, date_enregistrement)
        VALUES(:pseudo, :mdp, :nom, :prenom, :email, :civilite, :statut, :date_enregistrement)";
/*preparation de la requete sql vers la BDD*/
$requete = $bdd->prepare($sql);
/*relier les valeurs+ securisation*/
$requete->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
$requete->bindValue(':mdp', $mdp, PDO::PARAM_STR);
$requete->bindValue(':nom', $nom, PDO::PARAM_STR);
$requete->bindValue(':prenom', $prenom, PDO::PARAM_STR);
$requete->bindValue(':email', $email, PDO::PARAM_STR);
$requete->bindValue(':civilite', $_POST['civilite'], PDO::PARAM_STR);
$requete->bindValue(':statut', $_POST['statut'], PDO::PARAM_STR);
$requete->bindValue(':date_enregistrement', $date, PDO::PARAM_STR);
/*execution de la requete*/
$requete->execute();

/*redirection vers la page*/
header('Location: index.php');
?>