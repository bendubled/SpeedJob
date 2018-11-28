<?php

require('id_connexion.php');
$recherche = $_POST['recherche'];



 $reponse = $bdd->query('SELECT * FROM membre_part WHERE poste LIKE "%'.$recherche.'%"');


if($reponse->rowCount()<=0){
    
     $reponse = $bdd->query('SELECT * FROM membre_part WHERE ville LIKE "%'.$recherche.'%"');
}
if($reponse->rowCount()<=0){
    $reponse = $bdd->query('SELECT * FROM membre_part WHERE pseudo LIKE "%'.$recherche.'%"');
}       

                    
                       while ($donnees = $reponse->fetch())
{
    ?>                       
<p>
    <strong>Liste</strong> : <?php echo $donnees['pseudo']; ?><br />
    VILLE : <?php echo $donnees['ville']; ?><br />POSTE<?php echo $donnees['poste']; ?> <br />
    INTRO<?php echo $donnees['intro']; ?><br />MAIL <?php echo $donnees['mail']; ?> 
   </p>
<?php
                       }
 
?>
   <a  href="index.php" >Accueil</a>