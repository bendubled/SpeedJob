<?php require 'header.php'; ?>
<?php 
 
if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    require_once 'db.php';
    require_once 'functions.php';
    
    $req = $pdo->prepare("SELECT * FROM users WHERE (username = :username OR email = :username) AND confirmed_at IS NOT NULL");
    $req->execute(['username' => $_POST['username']]);
    $user = $req->fetch();
    if(password_verify($_POST['password'], $user->password)){
        session_start();
        $_SESSION['auth'] = $user;
        $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
        header('location: account.php');
        exit();
        
        
    }else{
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
        header('location: connexion.php');
        exit();
        
    }
    debug($user->password);
    
    
    
}













?>

<h1>Se connecter</h1>


<form action="" method="post">
   
<div class='form-group'>
    
    <label for="">Pseudo</label>    
        <input type="text" name="username" class='form-control'/>
        </div>

<div class='form-group'>
    
    <label for="">Mot de passe <a href="forget.php">(J'ai oublié mon mot de passe)</a></label>    
        <input type="password" name="password" class='form-control'/>
</div>    
<button type="submit" class="btn btn-primary">Se connecter</button>
    
    </form>
    
    
    <?php require 'footer.php';?>