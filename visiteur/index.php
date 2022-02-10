<?php
session_start();
include('assets/inc/head.php');
?>
  <title>Veveille - CarShop</title>

<?php
include('assets/inc/header1.php');
?>
<main>
<article>
  <!-- --------------------------------------------FILTRE tri prix----------------------------- -->

  <!-- --------------------------------------------APPEL BDD----------------------------- -->
  <?php
  $bdd = new PDO('mysql:host=localhost;dbname=veville', 'root','');
  /* ****************************** REQUETE Affichage des vehicules prix croissant*********************** */
  if(isset($_POST['filtre_prix'])){
    if($_POST['filtre_prix'] == 1){
      $sql = "SELECT vehicule.id_vehicule, vehicule.fk_agence, vehicule.photo, vehicule.titre, vehicule.description, vehicule.prix_journalier, agence.titre AS titreAgence
        FROM vehicule
        LEFT JOIN agence
        ON agence.id_agence = vehicule.fk_agence
        ORDER BY prix_journalier ASC";
    /* ****************************** REQUETE Affichage des vehicules prix décroissant*********************** */
  } else if($_POST['filtre_prix'] == 2){
    $sql = "SELECT vehicule.id_vehicule, vehicule.fk_agence, vehicule.photo, vehicule.titre, vehicule.description, vehicule.prix_journalier, agence.titre AS titreAgence
    FROM vehicule
    LEFT JOIN agence
    ON agence.id_agence = vehicule.fk_agence
    ORDER BY prix_journalier DESC
    ";
    /* ****************************** REQUETE Affichage des vehicules retirer filtres*********************** */
  }else{
    $sql = "SELECT vehicule.id_vehicule, vehicule.fk_agence, vehicule.photo, vehicule.titre, vehicule.description, vehicule.prix_journalier, agence.titre AS titreAgence
    FROM vehicule
    LEFT JOIN agence
    ON agence.id_agence = vehicule.fk_agence";
    }
    $requete = $bdd->prepare($sql);
    $requete->execute();
    $resultat = $requete->fetchALL(PDO::FETCH_ASSOC);
    /* ****************************** REQUETE Affichage des vehicules au chargement de la page*********************** */
  }else{
    $sql = "SELECT vehicule.id_vehicule, vehicule.fk_agence, vehicule.photo, vehicule.titre, vehicule.description, vehicule.prix_journalier, agence.titre AS titreAgence
        FROM vehicule
        LEFT JOIN agence
        ON agence.id_agence = vehicule.fk_agence";
$requete = $bdd->prepare($sql);
$requete->execute();
$resultat = $requete->fetchALL(PDO::FETCH_ASSOC);
}
?>

<div class="filtre_prix">
  <form action="index.php" method="POST">
    <select name="filtre_prix" id="piltre_prix" onChange="submit()">
      <option value="">Trier par : </option>
      <option value="1">Prix croissant</option>
      <option value="2">Prix décroissant</option>
      <option value="3">Ne pas trier</option>
    </select>
  </form>
</div>

<h3><?php if(isset($_SESSION['agence'])){echo $_SESSION['agence'];}?> </h3>
  <!-- ---------------------------LISTE DE VOITURES AVEC FILTRE AGENCE S'il y a----------------------------------- -->
  <?php
      foreach($resultat as $vehicule){
        if(isset($_SESSION['id_agence']) && $_SESSION['agence']==$vehicule['titreAgence']){
      echo  '
        <form action="commande_form.php" method="post">
          <div class="container mt-5">
            <div class="col-12">
              <div class="list-car">
                <div class="card mb-5" style="max-width: 950px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                    <img src="assets/img/'.$vehicule['photo'].'" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">'.$vehicule['titre'].'</h5>
                        <p class="card-text">'.$vehicule['description'].'</p>
                        <p class="card-text">' .$vehicule['prix_journalier'].'€ - '.$vehicule['titreAgence'].'</p>
                        <button type="submit" class="btn btn-success" id="btn_reserver">Reservez et Payer</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <input type="number" name="id_vehicule" value="'.$vehicule['id_vehicule'].'" class="display-none">
          <input type="number" name="prix_journalier" value="'.$vehicule['prix_journalier'].'" class="display-none">
          <input type="number" name="fk_agence" value="'.$vehicule['fk_agence'].'" class="display-none">
          <input type="text" name="titre" value="'.$vehicule['titre'].'" class="display-none">
          <input type="text" name="titreAgence" value="'.$vehicule['titreAgence'].'" class="display-none">
          </form>';
/*     ********************  LISTE DE VOITURES AVEC FILTRE AGENCE S'il est enlevé ******************* */ 
   } else if ((isset($_SESSION['id_agence'])) && $_SESSION['id_agence']==0){
    echo  '
      <form action="commande_form.php" method="post">
        <div class="container mt-5">
          <div class="col-12">
            <div class="list-car">
              <div class="card mb-5" style="max-width: 950px;">
                <div class="row g-0">
                  <div class="col-md-4">
                  <img src="assets/img/'.$vehicule['photo'].'" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">'.$vehicule['titre'].'</h5>
                      <p class="card-text">'.$vehicule['description'].'</p>
                      <p class="card-text">' .$vehicule['prix_journalier'].'€ - '.$vehicule['titreAgence'].'</p>
                      <button type="submit" class="btn btn-success" id="btn_reserver">Reservez et Payer</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <input type="number" name="id_vehicule" value="'.$vehicule['id_vehicule'].'" class="display-none">
        <input type="number" name="prix_journalier" value="'.$vehicule['prix_journalier'].'" class="display-none">
        <input type="number" name="fk_agence" value="'.$vehicule['fk_agence'].'" class="display-none">
        <input type="text" name="titre" value="'.$vehicule['titre'].'" class="display-none">
        <input type="text" name="titreAgence" value="'.$vehicule['titreAgence'].'" class="display-none">
        </form>';
    }
  }
  ?>

</article>
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