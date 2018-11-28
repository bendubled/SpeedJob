<?php
require('id_connexion.php');
$pseudo = $_POST['pseudo'];
$ville = $_POST['ville'];
$poste = $_POST['poste'];
$intro = $_POST['intro'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
//$bdd->exec("INSERT INTO membre_part(id, prenom) VALUES ('',$prenom)");
//echo'fait';


$req = $bdd->prepare("INSERT INTO membre_part(pseudo, ville, poste, intro, mail, pass) VALUES(:pseudo, :ville, :poste, :intro, :mail, :pass)");
$req->execute(array(
    
	'pseudo' => $pseudo,
        'ville' => $ville,
        'poste' => $poste,
        'intro' => $intro,
        'mail' => $mail,
        'pass' => $pass_hache
        
	
	));
header("Location:http://localhost/lastspeedjob/index.php");
?>
