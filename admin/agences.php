<?php
session_start();
include('assets/inc/head.php');
?>
    <title>Gestion des agences</title>
    <?php
include('assets/inc/header.php');
?>
<!------------MAIN--------------->
<main>
    <h1>Gestion des agences</h1>
    <?php
//**************Connexion + RECUPeRATION DES DONNEES***************/
$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root', '');
$sql = "SELECT * FROM agence";
$requete = $bdd->prepare($sql);
$requete->execute();
$resultat=$requete->fetchAll(PDO::FETCH_ASSOC);
?>

<!------------TABLE--------------->
<table>
    <thead>
        <tr>
            <td>Agence</td>
            <td>titre</td>
            <td>adresse</td>
            <td>ville</td>
            <td>cp</td>
            <td>description</td>
            <td>photo</td>
            <td>actions</td>
        </tr>
    </thead>
    <tbody>
        
<!------------TABLEAU des Agences en BDD --------------->
<?php
                    foreach($resultat as $agence){
                        echo "<tr>
                        <td>" .$agence['id_agence']. "</td>"
                        . "<td>" .$agence['titre']. "</td>"
                        . "<td>" .$agence['adresse']. "</td>"
                        . "<td>" .$agence['ville']. "</td>"
                        . "<td>" .$agence['cp']. "</td>"
                        . "<td>" .$agence['description']. "</td>"
                        ."<td><img width='50vw' src='assets/img/". $agence['photo']."'></td>"
                        ."<td><a href='agence_show.php?id_agence=".$agence['id_agence']."'>Visualiser</a> 
                        <a href='agence_update_form.php?id_agence=".$agence['id_agence']."'>Modifier</a> 
                        <a href='agence_delete_confirm.php?id_agence=".$agence['id_agence']."'>Effacer</a>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
        
<!------------FORMULAIRE D'AJOUT DES AGENCES --------------->
<div id="container">
        <form action="agence_ajout.php" method="POST">
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
        </form>
        </div>
        <a href="dashboard.php">Retour</a>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="assets/js/select.js"></script>
    <?php
    include('assets/inc/footer.php');
    ?>