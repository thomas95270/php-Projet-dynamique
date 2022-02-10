<?php
session_start();
include('assets/inc/head.php');
?>
    <title>Modifer des membres</title>
    
    <?php
include('assets/inc/header.php');
?>

<main>
    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=veville', 'root', '');
    $sql = "SELECT * FROM membre WHERE id_membre= :id_membre";
    $requete = $bdd->prepare($sql);
    $requete->bindValue(':id_membre', $_GET['id_membre'], PDO::PARAM_INT);
    $requete->execute();
    $resultat=$requete->fetch(PDO::FETCH_ASSOC);
    ?>

    <h2>Modifier le membre</h2>
    <form action="membre_update.php" method="post">
        <input type="number" name="id_membre" class="display-none" value="<?php echo $resultat['id_membre']?>">
        <div class="pseudo">
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" placeholder="Pseudo" value="<?php echo $resultat['pseudo']?>">
        </div>
        <div class="password">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Mot de passe" value="<?php echo $resultat['mdp']?>>
        </div>
        <div class="nom">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" placeholder="Nom" value="<?php echo $resultat['nom']?>">
        </div>
        <div class="prenom">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" placeholder="Prénom" value="<?php echo $resultat['prenom']?>">
        </div>
        <div class="email">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $resultat['email']?>">
        </div>
        <div class="civilite">
            <label for="civilite">Civilite</label>
            <select name="civilite" id="civilite" value="<?php echo $resultat['civilite']?>">
                <option value="">civilite</option>
                <option value="m">M.</option>
                <option value="f">Mme.</option>
            </select>
        </div>
        <div class="statut">
            <label for="statut">Statut</label>
            <select name="statut" id="statut" value="<?php echo $resultat['statut']?>">
                <option value="1">Admin</option>
                <option value="0">Membre</option>
            </select>
        </div>
        <input type="submit" value="Enregistrer">
    </form>
    </main>
    <style>
        .display-none{
            display: none;
        }
    </style>

    <?php
    include('assets/inc/footer.php');
    ?>
    