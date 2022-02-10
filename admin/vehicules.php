<?php
session_start();
include('assets/inc/head.php');
?>
<title>Gestion des véhicules</title>
<?php
include('assets/inc/header.php');
?>
<main>
    <h1>Gestion des véhicules</h1>
<?php
//**************Connexion + RECUPERATION DES DONNEES***************/
$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root', '');
$sql = "SELECT  id_agence, titre FROM agence;";
$requete = $bdd->prepare($sql);
$requete->execute();
$resultat=$requete->fetchAll(PDO::FETCH_ASSOC);
?>
<!------------menu deroulant agence--------------->
<form action="vehicules.php" method='POST'>
    <label for="agence">Agence</label>
    <select name="agence" id="id_agence" onChange="submit()">
        <option name="id_agence">Choisissez une agence</option>';
        <?php
        foreach($resultat as $agence){
            echo '<option name="id_agence" value="'.$agence['id_agence'].'">'.$agence['titre'].'</option>';
        }
        
        ?>
        <option name="id_agence" value="0">Toutes les agences</option>';
    </select>
</form>
<?php
?>
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
            $sql2 = "SELECT vehicule.id_vehicule, vehicule.fk_agence, vehicule.titre, vehicule.marque, vehicule.modele, vehicule.description, vehicule.photo, vehicule.prix_journalier, agence.titre AS titreAgence FROM vehicule
            LEFT JOIN agence
            ON agence.id_agence = vehicule.fk_agence;";
            $requete2 = $bdd2->prepare($sql2);
            $requete2->execute();
            $resultat2 = $requete2->fetchAll(PDO::FETCH_ASSOC);

            
/************************************  Filtre toutes les agences**********************/
                if((isset($_POST['agence']) && $_POST['agence']==0) || (!isset($_POST['agence']))){
                    foreach($resultat2 as $vehicule){
                        echo "<tr>
                        <td>" .$vehicule['id_vehicule']. "</td>"
                        ."<td>" .$vehicule['titreAgence']. "</td>"
                        ."<td>" .$vehicule['titre']. "</td>"
                        . "<td>" .$vehicule['marque']. "</td>"
                        . "<td>" .$vehicule['modele']. "</td>"
                        . "<td>" .$vehicule['description']. "</td>"
                        . "<td><img width='50vw' src='assets/img/" .$vehicule['photo']. "'</td>"
                        . "<td>" .$vehicule['prix_journalier']. "</td>"
                        ."<td><a href='vehicule_show.php?id_vehicule=".$vehicule['id_vehicule']."'>Visualiser</a> 
                        <a href='vehicule_update_form.php?id_vehicule=".$vehicule['id_vehicule']."'>Modifier</a> 
                        <a href='vehicule_delete_confirm.php?id_vehicule=".$vehicule['id_vehicule']."'>Effacer</a>
                        </tr>";
                    }
/************************************  Filtre agence selectionnee**********************/
                }else if (isset($_POST['agence'])){
                    foreach($resultat2 as $vehicule){
                        if($_POST['agence']==$vehicule['fk_agence']){
                            echo "<tr>
                            <td>" .$vehicule['id_vehicule']. "</td>"
                            ."<td>" .$vehicule['titreAgence']. "</td>"
                            ."<td>" .$vehicule['titre']. "</td>"
                            . "<td>" .$vehicule['marque']. "</td>"
                            . "<td>" .$vehicule['modele']. "</td>"
                            . "<td>" .$vehicule['description']. "</td>"
                            . "<td><img width='50vw' src='assets/img/" .$vehicule['photo']. "'</td>"
                            . "<td>" .$vehicule['prix_journalier']. "</td>"
                            ."<td><a href='vehicule_show.php?id_vehicule=".$vehicule['id_vehicule']."'>Visualiser</a> 
                            <a href='vehicule_update_form.php?id_vehicule=".$vehicule['id_vehicule']."'>Modifier</a> 
                            <a href='vehicule_delete_confirm.php?id_vehicule=".$vehicule['id_vehicule']."'>Effacer</a>
                            </tr>";
                        }
                    }
                }
        ?>

</tbody>
</table>
<!-- ----------Formulaire d'ajout--------------->
<div id="container">
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
                <input type="file" name="photo">
            </div>
            <input type="submit" value="Enregistrer">
        </form>
        </div>
    </main>
    <style>
        .display-none{
            display: none;
        }
        </style>
        <footer>
        </footer>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="assets/js/select.js"></script>
        
</html>