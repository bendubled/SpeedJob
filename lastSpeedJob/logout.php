<?php

session_start();
unset($_SESSION['auth']);
$_SESSION['flash']['success'] = 'Vous êtes maintenant deconnecté';
header('location: connexion.php');

