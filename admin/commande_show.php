<?php
session_start();
include('assets/inc/head.php');
?>
    <title>Vue Commande</title>
    <?php
include('assets/inc/header.php');
?>
<?php
$id_commande = $_GET['id_commande'];

$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root', '');
$sql = "SELECT * FROM commande WHERE id_commande= :id_commande";
$requete = $bdd->prepare($sql);
$requete->bindValue(':id_commande', $id_commande, PDO::PARAM_INT);
$requete->execute();
$resultat=$requete->fetch(PDO::FETCH_ASSOC);
?>
<table>
    <thead>
    <tr>
        <td>Commande</td>
        <td>Membre</td>
        <td>Vehicule</td>
        <td>Agence</td>
        <td>date et heure de départ</td>
        <td>date et heure de fin</td>
        <td>prix total</td>
        <td>date et heure d'enregistrement</td>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $resultat['id_commande']?></td>
            <td><?php echo $resultat['fk_membre']?></td>
            <td><?php echo $resultat['fk_vehicule']?></td>
            <td><?php echo $resultat['fk_agence']?></td>
            <td><?php echo $resultat['date_heure_depart']?></td>
            <td><?php echo $resultat['date_heure_fin']?></td>
            <td><?php echo $resultat['prix_total']?></td>
            <td><?php echo $resultat['date_enregistrement']?></td>
        </tr>
    </tbody>
</table>
<p><a href="commandes.php">Retour</a></p>
</body>
</html>