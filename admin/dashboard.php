<?php
session_start();
include('assets/inc/head.php');
?>
  <title>Veveille - CarShopt</title>

<?php
include('assets/inc/header.php');
?>
<main>
 <h2>Bienvenue</h2>
 <h3>vous êtes dans le</h3>
<h1>Tableau de bord</h1>

<h3>Gestions des membres</h3>
<input type="button" id="gestion_membres" value="gérer les membres">
<h3>Gestions des véhicules</h3>
<input type="button" id="gestion_vehicules" value="gérer les vehicules">
<h3>Gestions des agences</h3>
<input type="button" id="gestion_agences" value="gérer les agences">


</main>

  <!------------------------------footer-------------------------------------->
  <footer>
    <p class="copy">Cars-location</p>
  </footer>
  <!------------------------Script---------------------------------->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="assets/js/script.js"></script>
</body>
</html>