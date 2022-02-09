<?php
session_start();
include('assets/inc/head.php');
?>
  <title>Inscription</title>

<?php
include('assets/inc/header.php');
?>
<main>
    <h1>Formulaire d'incription</h1>
    <form action="inscription.php" method="POST">
            <div class="pseudo">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" placeholder="Pseudo">
            </div>
            <div class="password">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Mot de passe">
            </div>
            <div class="nom">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" placeholder="Nom">
            </div>
            <div class="prenom">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" placeholder="Prénom">
            </div>
            <div class="email">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email">
            </div>
            <div class="civilite">
                <label for="civilite">Civilite</label>
                <select name="civilite" id="civilite">
                    <option value="m">M.</option>
                    <option value="f">Mme.</option>
                </select>
            </div>
            <div class="statut">
                <label for="statut">Statut</label>
                <select name="statut" id="statut">
                    <option value="1">Admin</option>
                    <option value="0">Membre</option>
                </select>
            </div>
            <input type="submit" value="Enregistrer">
        </form>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inscription</h5>
        </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="psuedo" class="col-form-label">Pseudo :</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="password" class="col-form-label">Mot de passe :</label>
            <input type="text" class="form-control" id="password">
          </div>
          <div class="mb-3">
            <label for="nom" class="col-form-label">Nom</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="prenom" class="col-form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>