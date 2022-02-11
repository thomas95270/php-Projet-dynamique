<?php
session_start();
include('assets/inc/head.php');
?>
  <title>Veveille - CarShop</title>

<?php
include('assets/inc/header.php');

?>
<main>
<h1>Vous n'êtes pas connecté.</h1>
<a href="inscription_form.php">Inscrivez-vous</a><br>
<a href="connect.php">connectez-vous</a>
</main>

<!------------------------------footer-------------------------------------->
<?php
include('assets/inc/footer.php');
?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>