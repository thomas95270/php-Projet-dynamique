<?php
session_start();
$pseudo=$_POST['pseudo'];
$mdp=$_POST['password'];
$statut=-1;
$_SESSION['statut']=$statut;
$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root','');
$sql = "SELECT pseudo, mdp, statut FROM membre;";
$requete = $bdd->prepare($sql);
$requete->execute();
$resultat = $requete->fetchALL(PDO::FETCH_ASSOC);
foreach($resultat as $test){
    if($test['pseudo'] == $pseudo && $test['mdp'] == $mdp){
        $statut=$test['statut'];
        $_SESSION['statut']=$statut;
    }else{ 
         header('Location: ../../../visiteur/inscription_form.php');
     }
    
    }
    if($statut == 0){
        echo "je suis membre";
        var_dump($_POST['statut']);
        $_SESSION['statut']=$statut;
        header('Location: ../../../visiteur/index.php');
    }
    
    if($statut == 1){
        echo '<pre>';
        echo "je suis admin";
        $_SESSION['statut']=$statut;
        var_dump($_SESSION['statut']);
        var_dump($_SESSION);
        echo '</pre>';
    header('Location: ../../../admin/dashboard.php');
}

?>