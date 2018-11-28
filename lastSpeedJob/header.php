<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
    
}

//require 'functions.php';
 ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css?dp-version=1542186754" />
<!--    <script src="js/util.js"></script>-->
    <script src="js/gps.js"></script>
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
<link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css?dp-version=1533195059" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css" />
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

     
 
  </head>
  <body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">SP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
     <?php if (isset($_SESSION['auth'])): ?>
        <a class="nav-item nav-link" href="logout.php">deconnexion</a>
        <a class="nav-item nav-link" href="index.php">Home</a>
        <a class="nav-item nav-link" href="account.php">Mon compte</a>
        <?php else: ?>
      <a class="nav-item nav-link" href="connexion.php">connexion</a>
      <a class="nav-item nav-link" href="inscription.php">S'inscrire</a>
      
      <?php endif; ?>
    </div>
  </div>
</nav>
      <div class="container">
          
          <?php if (isset($_SESSION['flash'])):?>
          
          <?php foreach($_SESSION['flash'] as $type =>$message): ?>
            <div class="alert alert-<?= $type; ?>">
                <?= $message; ?>
                
      </div>
          <?php endforeach; ?>
          <?php unset($_SESSION['flash']); ?>
          <?php endif; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
