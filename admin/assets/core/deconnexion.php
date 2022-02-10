<?php
session_start();
$_SESSION['statut']=-1;
header('Location: ../../../visiteur/index.php');
?>