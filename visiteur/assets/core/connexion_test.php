<?php
$pseudo=$_POST['pseudo'];
$mdp=$_POST['password'];
$statut=-1;

$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root','');
$sql = "SELECT pseudo, mdp, statut FROM membre;";
$requete = $bdd->prepare($sql);
$requete->execute();
$resultat = $requete->fetchALL(PDO::FETCH_ASSOC);
foreach($resultat as $test){
    if($test['pseudo'] == $pseudo && $test['mdp'] == $mdp){
        $statut=$test['statut'];
    }else{ 
         header('Location: ../../../visiteur/inscription_form.php');
     }
    
    }
    if($statut == 0){
        echo "je suis membre";
        var_dump($statut);
        header('Location: ../../../membre/connecte.php');
    }
    
    if($statut == 1){
        
        echo "je suis admin";
    var_dump($statut);
    header('Location: ../../../admin/dashboard.php');
}

?>