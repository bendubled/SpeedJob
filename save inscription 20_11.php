<?php 
require 'header.php';
require_once 'db.php';
require 'functions.php';

if(!empty($_POST)){
     
    $errors =array();
    if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
        $errors['username'] = "Votre pseudo n'est pas valide (alphanumérique)";
    }else{
        $req =$pdo->prepare('SELECT id FROM users WHERE username = ?');
        $req->execute([$_POST['username']]);
        $user = $req->fetch();
        if($user){
            $errors['username'] = 'Ce pseudo est déjà pris';
        }
        
    }
   
    
    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Votre mail n'est pas valide";
    }else{
        $req =$pdo->prepare('SELECT id FROM users WHERE email = ?');
        $req->execute([$_POST['email']]);
        $user = $req->fetch();
        if($user){
            $errors['email'] = 'Cet email est déjà utilisé pour un autre compte';
    }}
   
    if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
        $errors['password'] ="Vous devez rentrer un mot de passe valide";
    }
    
    if(empty($_POST['ville'])){
         $errors['ville'] ="Veuillez entrer une ville";
     }else{
         
      
         
         
         
         
     }
    
   
    if(empty($errors)){
    $req = $pdo->prepare("INSERT INTO users SET username =?, password = ?, email = ?, ville = ?, confirmation_token =?");
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $token = str_random(60);
    debug($token);
    debug($_POST['ville']);
    $req->execute([$_POST['username'], $password, $_POST['email'],$_POST['ville'] ,$token]);
    $user_id = $pdo->lastInsertID();
   
    mail($_POST['email'], 'Confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://localhost/lastspeedjob/confirm.php?id=$user_id&token=$token");
   $_SESSION['flash']['success'] = 'Un email de confirmation vous a été envoyé pour confirmer votre compte';
//    header('location:http://localhost/lastspeedjob/connexion.php');
    die('Le compte a bien été créé');
      
    }
     
}


$variable1 = (isset($_POST["lat"])) ? $_POST["lat"] : NULL;

echo $variable1;
?>

<h1>S'inscrire</h1>
<?php if(!empty($errors)):?>
    <div class='alert alert-danger'>
        <p>Vous n'avez pas rempli le formulaire correctement</p>
        <ul>
        <?php foreach($errors as $error): ?>
        <li><?= $error; ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

<form action="" method="post">
   
<div class='form-group'>
    
    <label for="">Pseudo</label>    
        <input type="text" name="username" class='form-control'/>
        </div>
<div class='form-group'>
    
    <label for="">Email</label>    
        <input type="text" name="email" class='form-control'/>
</div>
<div class='form-group'>
    
    <label for="">Mot de passe</label>    
        <input type="password" name="password" class='form-control'/>
</div>    
<div class='form-group'>
    
    <label for="">Confirmez votre mot de passe</label>    
        <input type="password" name="password_confirm" class='form-control'/>
</div>    
    <div class='form-group'>
    
    <label for="">ville</label>    
        <input type="text" id="adress" name="ville" onclick=geo() class='form-control'/>
</div>
  
    
    <button type="submit"  class="btn btn-primary">M'inscrire</button>
     <button onclick=geo()>sdqsdqsfqsfsqfsqdsd</button>
    </form>

 <script>
    
 function geo{
  $.ajax({
  url: 'https://geocoder.api.here.com/6.2/geocode.json',
  type: 'GET',
  dataType: 'jsonp',
  jsonp: 'jsoncallback',
  data: {
    searchtext: '<?php $_POST['ville']?>',
    app_id: 'GFqbwrojInIhqhNFuFWw',
    app_code: 'laYEl1TgAffv7-r7qDnXlA',
    gen: '9'
  },
  success: function (data) {
      var lat = JSON.stringify(data.Response.View[0].Result[0].Location.DisplayPosition.Latitude);
      var long = JSON.stringify(data.Response.View[0].Result[0].Location.DisplayPosition.Longitude);
      
    alert(JSON.stringify(data.Response.View[0].Result[0].Location.DisplayPosition.Longitude));
    
  }
});
};
  </script>    
 


