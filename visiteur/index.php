<?php
session_start();
include('assets/inc/head.php');
?>
  <title>Veveille - CarShopt</title>

<?php
include('assets/inc/header.php');
?>
<main>
<article>
<!-- --------------------------------------------APPEL BDD----------------------------- -->
<?php
  $bdd = new PDO('mysql:host=localhost;dbname=veville', 'root','');
if(isset($_POST['filtre_prix'])){
  if($_POST['filtre_prix'] == 1){
      $sql = "SELECT vehicule.photo, vehicule.titre, vehicule.description, vehicule.prix_journalier, agence.titre AS titreAgence
        FROM vehicule
        LEFT JOIN agence
        ON agence.id_agence = vehicule.fk_agence
        ORDER BY prix_journalier ASC";
  } else if($_POST['filtre_prix'] == 2){
    $sql = "SELECT vehicule.photo, vehicule.titre, vehicule.description, vehicule.prix_journalier, agence.titre AS titreAgence
    FROM vehicule
    LEFT JOIN agence
    ON agence.id_agence = vehicule.fk_agence
    ORDER BY prix_journalier DESC
    ";
  }else {
    $sql = "SELECT vehicule.photo, vehicule.titre, vehicule.description, vehicule.prix_journalier, agence.titre AS titreAgence
    FROM vehicule
    LEFT JOIN agence
    ON agence.id_agence = vehicule.fk_agence";
    }
    $requete = $bdd->prepare($sql);
    $requete->execute();
    $resultat = $requete->fetchALL(PDO::FETCH_ASSOC);
}else{

  $sql = "SELECT vehicule.photo, vehicule.titre, vehicule.description, vehicule.prix_journalier, agence.titre AS titreAgence
        FROM vehicule
        LEFT JOIN agence
        ON agence.id_agence = vehicule.fk_agence";
$requete = $bdd->prepare($sql);
$requete->execute();
$resultat = $requete->fetchALL(PDO::FETCH_ASSOC);
}
?>
  <!-- -------------------------------FILTRE------------------------------------------ -->
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

  <!-- ---------------------------LISTE DE VOITURES----------------------------------- -->
  <?php
      foreach($resultat as $vehicule){
      echo  '
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
                          <p class="card-text">' .$vehicule['prix_journalier'].' - '.$vehicule['titreAgence'].'</p>
                          <button type="button" class="btn btn-success">Reservez</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>';
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
</html>