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