<?php
session_start();
include('assets/inc/head.php');
?>
  <title>Veveille - CarShop</title>

<?php
include('assets/inc/header.php');

?>
<main>
<h3>Réserver votre véhicule</h3>

<div class="identite">
<p>id_membre : <?php echo $_SESSION['id_membre']; ?></p>
<p>nom : <?php echo $_SESSION['nom']; ?></p>
<p>prenom : <?php echo $_SESSION['prenom']; ?></p>
<p>email : <?php echo $_SESSION['email']; ?></p>
</div>

<div class="vehicule">
  <p>id_vehicule : <?php echo $_POST['id_vehicule']; ?></p>
  <p>Véhicule : <?php echo $_POST['titre']; ?></p>
  <p>Prix Journalier : <?php echo $_POST['prix_journalier']; ?>€</p>
</div>

<div class="agence">
  <p>id_agence : <?php echo $_SESSION['id_agence']; ?></p>
  <p>Agence : <?php echo $_SESSION['agence']; ?></p>
</div>

<div class="date">
<?php
$id_membre=$_SESSION['id_membre'];
$id_vehicule=$_POST['id_vehicule'];
$id_agence = $_SESSION['id_agence'];

//trouver le nombre de jours de location
$date1 = $_SESSION['date_depart'];
$date2 = $_SESSION['date_fin'];
$days = abs(strtotime($date2)- strtotime($date1));
$days = $days +1;
$prix_total = intval(($_POST['prix_journalier'] * $days)/(3600*24));

// concatenation des dates
$depart = $_SESSION['date_depart']. " " . $_SESSION['heure_depart'];
$fin = $_SESSION['date_fin']. " " . $_SESSION['heure_fin'];
$date=date('Y-m-d H:i:s');
?>

  <p>Date depart : <?php echo $depart; ?></p>
  <p>Date fin : <?php echo $fin; ?></p>
  <p>Date d'enregistrement : <?php echo $date; ?></p>
</div>

<?php
echo '<form action="assets/core/create_commande.php" method="post">
<input type="number" name="id_membre" value="' . $id_membre.'" class="display-none">
  <input type="number" name="id_vehicule" value="' . $id_vehicule.'" class="display-none">
  <input type="number" name="id_agence" value="' . $id_agence.'" class="display-none">
  <input type="text" name="date_depart" value="' . $depart.'" class="display-none">
  <input type="text" name="date_fin" value="' . $fin.'" class="display-none">
  <input type="number" name="prix_total" value="' . $prix_total.'" class="display-none">
  <input type="text" name="date_enregistrement" value="'.$date.'" class="display-none">
  <input type="submit" value="Validez votre choix">
</form>';
?>
<a href="index.php">Retour</a>
<?php
echo '<pre>';
var_dump($id_membre);
var_dump($id_vehicule);
var_dump($id_agence);
var_dump($depart);
var_dump($fin);
var_dump($prix_total);
var_dump($date);
echo '</pre>';
?>
</main>

<!------------------------------footer-------------------------------------->
<?php
include('assets/inc/footer.php');
?>
</body>

</html>