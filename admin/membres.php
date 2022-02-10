<?php
session_start();
include('assets/inc/head.php');
?>
    <title>Gestion des membres</title>

<?php
include('assets/inc/header.php');
?>
<main>
    <h1>Gestion des membres</h1>
    <?php
//**************Connexion + RECUPERATION DES DONNEES***************/
$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root', '');
$sql = "SELECT * FROM membre";
$requete = $bdd->prepare($sql);
$requete->execute();
$resultat=$requete->fetchAll(PDO::FETCH_ASSOC);
?>

<!------------TABLE--------------->
    <table>
        <thead>
            <tr>
                <td>id_membre</td>
                <td>pseudo</td>
                <td>nom</td>
                <td>prenom</td>
                <td>email</td>
                <td>civilite</td>
                <td>statut</td>
                <td>date_enregistrement</td>
                <td>actions</td>
            </tr>
        </thead>
<!------------TABLEAU des Agences en BDD --------------->
        <tbody>
            <?php
                foreach($resultat as $membre){
                    if($membre['statut']==1){
                        $statut='admin';
                    }else{$statut='membre';}
                    echo "<tr>
                    <td>" .$membre['id_membre']. "</td>"
                    . "<td>" .$membre['pseudo']. "</td>"
                    . "<td>" .$membre['nom']. "</td>"
                    . "<td>" .$membre['prenom']. "</td>"
                    . "<td>" .$membre['email']. "</td>"
                    . "<td>" .$membre['civilite']. "</td>"
                    . "<td>" .$statut. "</td>"
                    . "<td>" .$membre['date_enregistrement']. "</td>"
                    ."<td><a href='membre_show.php?id_membre=".$membre['id_membre']."'>Visualiser</a> 
                    <a href='membre_update_form.php?id_membre=".$membre['id_membre']."'>Modifier</a> 
                    <a href='membre_delete_confirm.php?id_membre=".$membre['id_membre']."'>Effacer</a>
                    </tr>";
                }
            ?>
        </tbody>
    </table>
    <form action="membre_ajout.php" method="POST">
            <div id="container">
            
            <div class="pseudo">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" placeholder="Pseudo">

                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Mot de passe">
            </div>
            <div class="personne">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" placeholder="Nom">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" placeholder="Prénom">
            </div>
            <div class="email">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email">

                <label for="civilite">Civilite</label>
                <select name="civilite" id="civilite">
                    <option value="m">M.</option>
                    <option value="f">Mme.</option>
                </select>
                <label for="statut">Statut</label>
                <select name="statut" id="statut">
                    <option value="1">Admin</option>
                    <option value="0">Membre</option>
                </select>
            </div>
        </div>
        <input type="submit" value="Enregistrer">
        </form>
    </main>
    <footer>
        </footer>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="assets/js/select.js"></script>
        
</html>