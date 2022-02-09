<?php
session_start();
include('assets/inc/head.php');
?>
  <title>Veveille - CarShopt</title>

<?php
include('assets/inc/header.php');
?>
<main>
<?php
include('assets/core/connexion.php');
?>
<article>

  <!-----------------------------car-list------------------------------------->
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
  <footer>
    <p class="copy">Cars-location</p>
  </footer>
  <!------------------------------footer-------------------------------------->






  <!------------------------Script---------------------------------->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="src/js/main.js"></script>
</body>

</html>