

<?php 


if(!empty($_POST) && !empty($_POST['email'])){
    require_once 'db.php';
    require_once 'functions.php';
    $req = $pdo->prepare('SELECT * FROM users WHERE email = ? AND confirmed_at IS NOT NULL');
    $req->execute([$_POST['email']]);
    $user = $req->fetch();
    if($user){
        session_start();
        $reset_token = str_random(60);
        $pdo->prepare('UPDATE users SET reset_token = ?, reset_at = NOW() WHERE id = ?')->execute([$reset_token, $user->id]);
        $_SESSION['flash']['success'] = 'Les instructions du rappel de mot de passe vous ont été envoyées par emails';
        mail($_POST['email'], 'Réinitiatilisation de votre mot de passe', "Afin de réinitialiser votre mot de passe merci de cliquer sur ce lien\n\nhttp://localhost/lastspeedjob/reset.php?id={$user->id}&token=$reset_token");
        header('Location: connexion.php');
        exit();
    }else{
        $_SESSION['flash']['danger'] = 'Aucun compte ne correspond à cet adresse';
    }
}





?>
<?php require 'header.php';?>
<h1>Mot de pass oublié</h1>


<form action="" method="post">
   
<div class='form-group'>
    
    <label for="">Email</label>    
        <input type="email" name="email" class='form-control'/>
        </div>


<button type="submit" class="btn btn-primary">Réinitialiser le mot de passe</button>
    
    </form>
    
    
    <?php require 'footer.php';?>