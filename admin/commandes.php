<?php
session_start();
include('assets/inc/head.php');
?>
    <title>Gestion des commandes</title>
    
    <?php
include('assets/inc/header.php');
?>
    <main>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root', '');
$sql = "SELECT * FROM commande 
INNER JOIN vehicule
ON commande.fk_vehicule= vehicule.id_vehicule
INNER JOIN agence
ON commande.fk_agence= agence.id_agence
INNER JOIN membre
ON commande.fk_membre= membre.id_membre;";
$requete = $bdd->prepare($sql);
$requete->execute();
$resultat=$requete->fetch(PDO::FETCH_ASSOC);
echo '<pre>';
var_dump($resultat);
echo '</pre>';
?>
            <div class="agence">
                <label for="agence">Agence</label>
                <select name="agence" id="agence">
                    <option value="admin">Agence de Paris</option>
                    <option value="admin">Agence de Lyonnaise</option>
                    <option value="admin">Agence de Bordeaux</option>
                </select>
            </div>
        <table>
            <thead>
                <tr>
                    <td>Commande</td>
                    <td>Membre</td>
                    <td>commande</td>
                    <td>Agence</td>
                    <td>date et heure de départ</td>
                    <td>date et heure de fin</td>
                    <td>prix total</td>
                    <td>date et heure d'enregistrement</td>
                    <td>actions</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </main>
    <?php
    include('assets/inc/footer.php');
    ?>