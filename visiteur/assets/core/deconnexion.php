<?php
session_start();
$_SESSION = array();
$_SESSION['statut']=-1;
header('Location: ../../index.php');
?>