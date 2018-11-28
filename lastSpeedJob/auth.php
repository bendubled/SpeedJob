
<?php

//session_start();
//$_SESSION['pseudo'] = 'ben';
//require('id_connexion.php');
//$req = $bdd->prepare('SELECT pseudo, pass FROM membre_part WHERE pseudo = :pseudo');
//$req->execute(array(
//    'pseudo' => 'ben'));
//$resultat = $req->fetch();
////echo $pseudo;
////echo $pass;
////if($_POST['pass'] == $resultat['pass']){
////    
////    echo 'ok vs etes co...';
////}
////else{
////    echo'intruders';
////}
//
//
//$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);
//
//if (!$resultat)
//{
//    echo 'Mauvais identifiant ou mot de passe !';
//}
//else
//{
//    if ($isPasswordCorrect) {
//        session_start();
//        $_SESSION['id'] = $resultat['id'];
//        $_SESSION['pseudo'] = $pseudo;
//        echo 'Vous �tes connect� !';
//    }
//    else {
//        echo 'Mauvais identifiant ou mot de passe !';
//    }
//}
//  R�cup�ration de l'utilisateur et de son pass hash�


//
//require('id_connexion.php');
//
//$req = $bdd->prepare('SELECT pseudo, pass FROM membre_part WHERE pseudo = :pseudo');
//$req->execute(array(
//    'pseudo' => $_POST['pseudo']));
//$resultat = $req->fetch();
//
//// Comparaison du pass envoy� via le formulaire avec la base
//$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);
//
//if (!$resultat)
//{
//    echo 'Mauvais identifiant ou mot de passe !';
//}
//else
//{
//    if ($isPasswordCorrect) {
//        
//        
//        
//        echo 'Salut';
//       
//    }
//    else {
//        echo 'Mauvais identifiant ou mot de passe !';
//    }
//}
//setcookie('pseudo', $pseudo, time() + 365*24*3600);
//header("Location:http://localhost/lastspeedjob");