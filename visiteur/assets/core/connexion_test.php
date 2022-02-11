<?php
session_start();
$pseudo=$_POST['pseudo'];
// $options = ['cost' => 12];
// $mdp = password_hash(trim($_POST['password']), PASSWORD_DEFAULT, $options);
$mdp=$_POST['password'];
$statut=-1;
$_SESSION['statut']=$statut;
$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root','');

$sql = "SELECT * FROM membre
        WHERE pseudo=:pseudo
        AND mdp=:mdp;";
$requete = $bdd->prepare($sql);
$requete->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
$requete->bindValue(':mdp', $mdp, PDO::PARAM_STR);
$requete->execute();
$resultat = $requete->fetch(PDO::FETCH_ASSOC);

    $statut=$resultat['statut'];
    $_SESSION['statut']=$statut;
    if($statut == 0){
        echo "je suis membre";
        $_SESSION['id_membre']=$resultat['id_membre'];
        $_SESSION['pseudo']=$resultat['pseudo'];
        $_SESSION['civilite']=$resultat['civilite'];
        $_SESSION['nom']=$resultat['nom'];
        $_SESSION['prenom']=$resultat['prenom'];
        $_SESSION['email']=$resultat['email'];
        header('Location: ../../../visiteur/mon_compte.php');
    }else if($statut == 1){
        echo '<pre>';
        echo "je suis admin";
        $_SESSION['statut']=$statut;
        var_dump($_SESSION['statut']);
        var_dump($_SESSION);
        echo '</pre>';
    header('Location: ../../../admin/dashboard.php');
} else {
    header('Location: ../../../visiteur/redirection.php');
}

?>