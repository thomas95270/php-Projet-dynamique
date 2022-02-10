<?php
session_start();
include('assets/inc/head.php');
?>
<title>Modifier un véhicule</title>
<?php
include('assets/inc/header.php');
?>
<main>
    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=veville', 'root', '');
    $sql = "SELECT * FROM vehicule WHERE id_vehicule= :id_vehicule";
    $requete = $bdd->prepare($sql);
    $requete->bindValue(':id_vehicule', $_GET['id_vehicule'], PDO::PARAM_INT);
    $requete->execute();
    $resultat=$requete->fetch(PDO::FETCH_ASSOC);
    ?>
    <h2>Modifier le vehicule</h2>
    <form action="vehicule_update.php" method="post">

        <input type="number" name="fk_agence" class="display-none" value="<?php echo $resultat['fk_agence']?>">
        <input type="number" name="id_vehicule" class="display-none" value="<?php echo $resultat['id_vehicule']?>">
        <div class="titre">
            <label for="titre">Titre</label>
            <input type="text" name="titre" placeholder="titre" value="<?php echo $resultat['titre']?>">
        </div>
        <div class="marque">
            <label for="marque">Marque</label>
            <input type="marque" name="marque" id="marque" placeholder="Marque" value="<?php echo $resultat['marque']?>">
        </div>
        <div class="modele">
            <label for="modele">Modele</label>
            <input type="text" name="modele" id="modele" placeholder="modele" value="<?php echo $resultat['modele']?>">
        </div>
        <div class="description">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" placeholder="Description" value="<?php echo $resultat['description']?>">
        </div>
        <div class="photo">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" placeholder="photo" value="<?php echo $resultat['photo']?>">
        </div>
        <div class="prix_journalier">
            <label for="prix_journalier">Prix journalier</label>
            <input name="prix_journalier" id="prix_journalier" value="<?php echo $resultat['prix_journalier']?>">
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
    