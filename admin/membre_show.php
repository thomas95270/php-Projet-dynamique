<?php
session_start();
include('../../../assets/inc/head.php');
?>
    <title>Vue membre</title>
    
    <?php
include('../../../assets/inc/header.php');
?>

<?php
$id_membre = $_GET['id_membre'];

$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root', '');
$sql = "SELECT * FROM membre WHERE id_membre= :id_membre";
$requete = $bdd->prepare($sql);
$requete->bindValue(':id_membre', $id_membre, PDO::PARAM_INT);
$requete->execute();
$resultat=$requete->fetch(PDO::FETCH_ASSOC);
if ($resultat['statut']==1){
    $statut="admin";
}else{
    $statut="membre";

}
?>
<table>
    <thead>
    <tr>
                <td>id_membre</td>
                <td>pseudo</td>
                <td>nom</td>
                <td>prenom</td>
                <td>email</td>
                <td>civilite</td>
                <td>statut</td>
                <td>date_enregistrement</td>
            </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $resultat['id_membre']?></td>
            <td><?php echo $resultat['pseudo']?></td>
            <td><?php echo $resultat['nom']?></td>
            <td><?php echo $resultat['prenom']?></td>
            <td><?php echo $resultat['email']?></td>
            <td><?php echo $resultat['civilite']?></td>
            <td><?php echo $resultat['statut']?></td>
            <td><?php echo $resultat['date_enregistrement']?></td>
        </tr>
    </tbody>
</table>
<p><a href="../../../membres.php">Retour</a></p>
</body>
</html>