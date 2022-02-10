<?php
session_start();
include('assets/inc/head.php');
?>
    <title>Vehicule deleting</title>
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
            <td>prix journalier</td>

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
        <?php echo "<td><img width='50vw' src='assets/img/". $resultat['photo']."'></td>"?>
        <td><?php echo $resultat['prix_journalier']?></td>
    </tr>
    </tbody>
</table>
<div id="confirmation">
<p>Etes-vous sûr de vouloir effacer ce véhicule ? </p>    
    <p><a href="vehicule_delete.php?id_vehicule=<?php echo $id_vehicule ?>">oui</a></p>
    <p><a href="vehicules.php">non</a></p>
</div>
<?php
include('assets/inc/footer.php');
?>