<?php
session_start();
include('assets/inc/head.php');
?>
  <title>Mon compte</title>

<?php
include('assets/inc/header.php');
?>
<main>
  <?php
  ?>
<section>
<h1>Mon compte</h1>
<h3>Bienvenue, 
    <?php if($_SESSION['civilite']=='f'){echo "mme.";}else{echo "M.";} ?> 
    <?php echo $_SESSION['nom'] ?> 
    <?php echo $_SESSION['prenom'] ?>.</h3>
<p>Email : <?php echo $_SESSION['email'] ?>.</p>
<p>Statut : membre.</p>

<?php
$id_membre = $_SESSION['id_membre'];
$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root','');
$sql = "SELECT commande.id_commande, commande.fk_membre, commande.fk_agence, commande.fk_vehicule,
        commande.date_heure_depart, commande.date_heure_fin, commande.prix_total, commande.date_enregistrement,
        vehicule.titre AS titreVehicule, agence.titre AS titreAgence FROM commande
        LEFT JOIN vehicule
        ON commande.fk_vehicule = vehicule.id_vehicule
        LEFT JOIN agence
        ON vehicule.fk_agence = agence.id_agence
        LEFT JOIN membre
        ON commande.fk_membre = membre.id_membre;";
$requete = $bdd->prepare($sql);
$requete->execute();
$resultat = $requete->fetchALL(PDO::FETCH_ASSOC);
?>
<h4>Historique de vos commandes : </h4>
<table>
    <thead>
        <td>Commande</td>
        <td>Membre</td>
        <td>Vehicule</td>
        <td>Agence</td>
        <td>date et heure de départ</td>
        <td>date et heure de fin</td>
        <td>prix total</td>
        <td>date et heure d'enregistrement</td>
    </thead>
    <tbody>
        <?php foreach($resultat as $com){
          if($com['fk_membre']==$id_membre){
            echo "<tr>
            <td>" . $com['id_commande'] . "</td>
            <td>" . $com['fk_membre'] . " - ". $_SESSION['prenom'] . " " . $_SESSION['nom'] . " - " . $_SESSION['email'] . "</td>
            <td>" . $com['fk_vehicule'] . " - ". $com['titreVehicule'] . "</td>
            <td>" . $com['fk_agence'] . " - ". $com['titreAgence'] . "</td>
            <td>" . $com['date_heure_depart'] . "</td>
            <td>" . $com['date_heure_fin'] . "</td>
            <td>" . $com['prix_total'] . "€</td>
            <td>" . $com['date_enregistrement'] . "</td>
            </tr>";
          }
        }
        ?>
    </tbody>
</table>
</section>
<a href="index.php">Retour</a>
</main>

<!------------------------------footer-------------------------------------->
<?php
 include('assets/inc/footer.php');
?>
</body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="assets/js/filtre_prix.js"></script>
  <script src="assets/js/reserver.js"></script>
</html>