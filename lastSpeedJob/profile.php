

<?php
$_COOKIE;
$Pseudo = $_COOKIE['pseudo'] ;
require('id_connexion.php');
$reponse = $bdd->query("SELECT * FROM membre_part WHERE pseudo = '". $Pseudo ."'");

           
       
                      
echo  $cookiePseudo ;
    ?>                       

<?php
                       
 
?>
   <a  href="index.php" >Accueil</a>



