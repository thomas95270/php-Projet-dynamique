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
<p>Agence : <?php echo $_POST['titreAgence']; ?></p>
<p>Véhicule : <?php echo $_POST['titre']; ?></p>
<div>
    <label for="date_depart">Date de départ et heure</label>
    <input type="date" name="date_depart" id="date_depart">
    <input type="time" name="heure_depart" id="heure_depart">
</div>
<div>
    <label for="date_fin">Date de départ et heure</label>
    <input type="date" name="date_fin" id="date_fin">
    <input type="time" name="heure_fin" id="heure_fin">
</div>
<input type="number" name="id_vehicule" value="'.$vehicule['id_vehicule'].'" class="display-none">
<input type="number" name="prix_journalier" value="'.$vehicule['prix_journalier'].'" class="display-none">
<input type="text" name="prix_journalier" value="'.$vehicule['titre'].'" class="display-none">
<input type="text" name="prix_journalier" value="'.$vehicule['titreAgence'].'" class="display-none">
<input type="number" name="fk_agence" value="'.$vehicule['fk_agence'].'" class="display-none">
<a href="index.php">Retour</a>
</main>

<!------------------------------footer-------------------------------------->
<?php
 include('assets/inc/footer.php');
?>
</body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="assets/js/filtre_prix.js"></script>
</html>