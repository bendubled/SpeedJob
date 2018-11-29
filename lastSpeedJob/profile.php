

<?php
require 'header.php';
require 'functions.php';
require_once 'db.php';
require('id_connexion.php');
logged_only();
$util = $_GET["user"];
?>
<div>PROFILE de <?php  echo $util; ?></div>

<?php 

  $reponse = $bdd->query('SELECT * FROM users WHERE username = "'.$util.'"');

  print_r($reponse->fetch());
?>

