<?php
session_start();
$_SESSION = array();
$_POST = array();
$_SESSION['statut']=-1;
header('Location: ../../index.php');
?>