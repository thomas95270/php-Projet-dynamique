<?php
session_start();
include('../assets/inc/head.php');
?>
    <title>Gestion des agences</title>
    
    <?php
include('../assets/inc/header.php');
?>

<main>
    <?php
    $id_agence = $_GET['id_agence'];
    $bdd = new PDO('mysql:host=localhost;dbname=veville', 'root', '');
    $sql = "SELECT * FROM agence WHERE id_agence= :id_agence";
    $requete = $bdd->prepare($sql);
    $requete->bindValue(':id_agence', $id_agence, PDO::PARAM_INT);
    $requete->execute();
    $resultat=$requete->fetch(PDO::FETCH_ASSOC);
    ?>


    <h2>Modifier l'agence</h2>
    <form action="agences_update.php" method="POST">
        <input type="number" name="id_agence" class="display-none" value="<?php echo $resultat['id_agence']?>">
        <div class="titre">
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" placeholder="Titre">
        </div>
        <div class="description">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" placeholder="Description de votre agence">
        </div>
        <div class="adresse">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" placeholder="Adresse">
        </div>
        <div class="ville">
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville" placeholder="Ville">
        </div>
        <div class="code_postal">
            <label for="code_postal">Code Postal</label>
            <input type="text" name="code_postal" id="code_postal" placeholder="Code Postal">
        </div>
        <div class="photo">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo">
        </div>
        <input type="submit" value="Enregistrer">
    </main>

    <?php
    include('../../inc/footer.php');
    ?>