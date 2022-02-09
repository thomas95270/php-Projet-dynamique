<?php
session_start();
include('assets/inc/head.php');
?>
    <title>Agence</title>
    
    <?php
include('assets/inc/header.php');
?>

<?php
$id_agence = $_GET['id_agence'];

$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root', '');
$sql = "SELECT * FROM agence WHERE id_agence= :id_agence";
$requete = $bdd->prepare($sql);
$requete->bindValue(':id_agence', $id_agence, PDO::PARAM_INT);
$requete->execute();
$resultat=$requete->fetch(PDO::FETCH_ASSOC);
?>
<table>
    <thead>
    <tr>
        <td>Agence</td>
        <td>titre</td>
        <td>adresse</td>
        <td>ville</td>
        <td>cp</td>
        <td>description</td>
        <td>photo</td>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $resultat['id_agence']?></td>
            <td><?php echo $resultat['titre']?></td>
            <td><?php echo $resultat['adresse']?></td>
            <td><?php echo $resultat['ville']?></td>
            <td><?php echo $resultat['cp']?></td>
            <td><?php echo $resultat['description']?></td>
            <td><?php echo $resultat['photo']?></td>
        </tr>
    </tbody>
</table>
<div id="confirmation">
<p>Etes-vous sûr de vouloir effacer cette agence ? </p>    
    <p><a href="agence_delete.php?id_agence=<?php echo $id_agence ?>">oui</a></p>
    <p><a href="agences.php">non</a></p>
</div>
<?php
include('assets/inc/footer.php');
?>