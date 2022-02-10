<?php
session_start();
include('assets/inc/head.php');
?>
  <title>CONTACT</title>

<?php
include('assets/inc/header.php');
?>
<main>
    <div id="raison_sociale">
        <h1>CONTACT</h1>
        <h5>Véville - CarShop</h5>
        <p>numéro de téléphone : 01 00 00 00 00</p>
        <p>Email : veville@veville.com</p>
        <div id="mail">
            <form method="POST">
                <div class="messager">
                    <label for="nom">Nom :</label>
                    <input type="area" name="nom" id="nom" cols="30" rows="10" placeholder="Votre nom">
                    <label for="prenom">Prénom :</label>
                    <input type="area" name="prenom" id="prenom" cols="30" rows="10" placeholder="Votre prénom">
                </div>
                <div class="email">
                    <label for="email">Email :</label>
                    <input type="area" name="email" id="email" cols="30" rows="10" placeholder="Votre email">
                    <label for="sujet">Sujet :</label>
                    <input type="area" name="sujet" id="sujet" cols="30" rows="5" placeholder="Sujet">
                </div>
                <label for="mail">Ecrivez-nous :</label>
                <textarea name="mail" id="mail" cols="60" rows="10" placeholder="Ecrivez ici"></textarea>
                <?php
                    if(isset($_POST['sujet']) && $_POST['mail'] && $_POST['nom'] && $_POST['prenom'] && $_POST['email']==true){
                        
                        $retour = mail('thomas.vmaagdenberg@gmail.com', 
                        $_POST['sujet'], 
                        $_POST['mail'], 
                        'From: webmaster@veville.com'. "\r\n" . 'Reply-to: ' . $_POST['nom']. " ". $_POST['prenom']. " ". $_POST['email']);
                        if ($retour)
                        var_dump($retour);
                        echo '<p>Votre message a bien été envoyé.</p>';
                    }
                ?>
                <input type="submit" value="Envoyez">
            </form>
        </div>
    </div>
<a href="index.php">Retour</a>
</main>

<?php
include('assets/inc/footer.php');
?>
</body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="assets/js/filtre_prix.js"></script>
</html>