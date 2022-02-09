<?php
session_start();
include('assets/inc/head.php');
?>
<title>Gestion des véhicules</title>
<?php
include('assets/inc/header.php');
?>
<main>
<?php
//**************Connexion + RECUPERATION DES DONNEES***************/
$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root', '');
$sql = "SELECT  id_agence, titre FROM agence;";
$requete = $bdd->prepare($sql);
$requete->execute();
$resultat=$requete->fetchAll(PDO::FETCH_ASSOC);
?>
<!------------menu deroulant agence--------------->
<div class="agence">
    <label for="agence">Agence</label>
    <select name="agence" id="id_agence">
        <?php
        foreach($resultat as $agence){
            echo '<option name="id_agence" value="'.$agence['id_agence'].'">'.$agence['titre'].'</option>';
        }
        ?>
        <?php
        var_dump($id_agence);
        ?>
    </select>
</div>
<!-- ----------------------------TABLE--------------->
<table>
    <thead>
        <tr>
            <td>vehicule</td>
            <td>Agence</td>
            <td>titre</td>
            <td>marque</td>
            <td>modele</td>
            <td>description</td>
            <td>photo</td>
            <td>prix journalier</td>
            <td>actions</td>
        </tr>
    </thead>
    <!-- ----------------------------TABLEAU en BDD--------------->
    <tbody>
        <?php
            $bdd2 = new PDO('mysql:host=localhost;dbname=veville', 'root', '');
            $sql2 = "SELECT * FROM vehicule;";
            $requete2 = $bdd2->prepare($sql2);
            $requete2->execute();
            $resultat2 = $requete2->fetchAll(PDO::FETCH_ASSOC);

            foreach($resultat2 as $vehicule){
                echo "<tr>
                <td>" .$vehicule['id_vehicule']. "</td>"
                ."<td>" .$agence['titre']. "</td>"
                ."<td>" .$vehicule['titre']. "</td>"
                . "<td>" .$vehicule['marque']. "</td>"
                . "<td>" .$vehicule['modele']. "</td>"
                . "<td>" .$vehicule['description']. "</td>"
                . "<td>" .$vehicule['photo']. "</td>"
                . "<td>" .$vehicule['prix_journalier']. "</td>"
                ."<td><a href='vehicule_show.php?id_vehicule=".$vehicule['id_vehicule']."'>Visualiser</a> 
                <a href='vehicule_update_form.php?id_vehicule=".$vehicule['id_vehicule']."'>Modifier</a> 
                <a href='vehicule_delete_confirm.php?id_vehicule=".$vehicule['id_vehicule']."'>Effacer</a>
                </tr>";
            }
    ?>

</tbody>
</table>
<!-- ----------Formulaire d'ajout--------------->
<form action="vehicule_ajout.php" method="POST">
<input type="number" name="fk_agence" class="display-none" value="<?php echo $agence['id_agence']?>">
            <div class="titre">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre" placeholder="Titre">
            </div>
            <div class="marque">
                <label for="marque">Marque</label>
                <input type="text" name="marque" id="marque" placeholder="Marque">
            </div>
            <div class="modele">
                <label for="modele">Modele</label>
                <input type="text" name="modele" id="modele" placeholder="Modele">
            </div>
            <div class="prix_journalier">
                <label for="prix_journalier">Prix</label>
                <input type="text" name="prix_journalier" id="prix_journalier" placeholder="Prix">
            </div>
            <div class="description">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" placeholder="Description de votre voiture">
            </div>
            <div class="photo">
                <label for="photo">Photo</label>
                <input type="file" name="photo" accept="img/png, .jpg">
            </div>
            <input type="submit" value="Enregistrer">
        </form>
    </main>
    <style>
        .display-none{
            display: none;
        }
        </style>
<!-- -------------------------FOOTER -------------------------->
<?php
    include('assets/inc/footer.php');
    ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script rel="assets/js/select.js"></script>
</html>