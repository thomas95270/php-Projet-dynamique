<?php
session_start();
$_SESSION['statut']=-1;
header('Location: ../../index.php');
?>