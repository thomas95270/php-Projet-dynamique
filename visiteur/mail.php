<?php
session_start();
include('assets/inc/head.php');
?>
  <title>Envoi mail</title>

<?php
include('assets/inc/header.php');
?>
<?php
$retour = mail('thomas.vmaagdenberg@gmail.com', $_POST['sujet'], $_POST['message'], 'From: webmaster@veville.com');
if ($retour)
        echo '<p>Votre message a bien été envoyé.</p>';
        ?>
<a href="index.php">Retour</a>
<?php
  include('assets/inc/footer.php');
?>
</body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="assets/js/filtre_prix.js"></script>
</html>