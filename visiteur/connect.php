<?php
session_start();
include('assets/inc/head.php');
?>
  <title>Connexion</title>

<?php
include('assets/inc/header.php');
?>
<main>
    <h1>Formulaire de connexion</h1>
    <form action="assets/core/connexion_test.php" method="POST">
            <input type="number" name="statut" id="statut" class="display-none" value="-1">
            <div class="pseudo">
                <label for="pseudo">Votre pseudo</label>
                <input type="text" name="pseudo" placeholder="Pseudo">
            </div>
            <div class="password">
                <label for="password">Votre mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Mot de passe">
            </div>
            <input type="submit" value="Enregistrer">
        </form>
        <a href="index.php">Retour</a>
</main>

<?php
include('assets/inc/footer.php');
?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="assets/js/filtre_prix.js"></script>
</html>