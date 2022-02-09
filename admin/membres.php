<?php
session_start();
include('assets/inc/head.php');
?>
    <title>Gestion des membres</title>

<?php
include('assets/inc/header.php');
?>
<main>
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
                    ."<td><a href='assets/core/membres/membre_show.php?id_membre=".$membre['id_membre']."'>Visualiser</a> 
                    <a href='assets/core/membres/membre_update_form.php?id_membre=".$membre['id_membre']."'>Modifier</a> 
                    <a href='assets/core/membres/membre_delete_confirm.php?id_membre=".$membre['id_membre']."'>Effacer</a>
                    </tr>";
                }
            ?>
        </tbody>
    </table>
        <form action="assets/core/membres/membre_ajout.php" method="POST">
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
    </main>
    <?php
    include('assets/inc/footer.php');
    ?>