<?php
session_start();
include('assets/inc/head.php');
?>
    <title>Vue vehicule</title>
    
    <?php
include('assets/inc/header.php');
?>

<?php
$id_vehicule = $_GET['id_vehicule'];

$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root', '');
$sql = "SELECT * FROM vehicule WHERE id_vehicule= :id_vehicule";
$requete = $bdd->prepare($sql);
$requete->bindValue(':id_vehicule', $id_vehicule, PDO::PARAM_INT);
$requete->execute();
$resultat=$requete->fetch(PDO::FETCH_ASSOC);
?>
<table>
    <thead>
    <tr>
            <td>vehicule</td>
            <td>Agence</td>
            <td>titre</td>
            <td>marque</td>
            <td>modele</td>
            <td>description</td>
            <td>photo</td>
            <td>prix</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $resultat['id_vehicule']?></td>
            <td><?php echo $resultat['fk_agence']?></td>
            <td><?php echo $resultat['titre']?></td>
            <td><?php echo $resultat['marque']?></td>
            <td><?php echo $resultat['modele']?></td>
            <td><?php echo $resultat['description']?></td>
            <td><?php echo $resultat['photo']?></td>
            <td><?php echo $resultat['prix_journalier']?></td>
        </tr>
    </tbody>
</table>
<p><a href="vehicules.php">Retour</a></p>
</body>
</html>