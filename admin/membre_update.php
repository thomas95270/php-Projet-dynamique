<?php
$date_enregistrement = date('Y-m-d H:m:s');
echo '<pre>';
var_dump($date_enregistrement);
echo '</pre>';

$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root','');
$sql = "UPDATE membre SET pseudo = :pseudo,
                        mdp = :password,
                        nom = :nom,
                        prenom = :prenom,
                        email = :email,
                        civilite = :civilite,
                        statut = :statut,
                        date_enregistrement = :date_enregistrement
        WHERE id_membre = :id_membre;";
$requete = $bdd->prepare($sql);
$requete->bindValue(':id_membre', $_POST['id_membre'], PDO::PARAM_INT);
$requete->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
$requete->bindValue(':password', $_POST['password'], PDO::PARAM_STR);
$requete->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
$requete->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
$requete->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$requete->bindValue(':civilite', $_POST['civilite'], PDO::PARAM_STR);
$requete->bindValue(':statut', $_POST['statut'], PDO::PARAM_INT);
$requete->bindValue(':date_enregistrement', $date_enregistrement, PDO::PARAM_STR);
$requete->execute();


header('Location: ../../../membres.php');
?>
