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
         
     $_POST['ville'] = $_POST['city']; 
    echo $_POST['ville'];
         
         
     }
     if(empty($_POST['latitude'])){
         $errors['latitude'] ="pas de lat";
     }else{
         
      
       
         
         
     }
      if(empty($_POST['longitude'])){
         $errors['longitude'] ="pas de long";
     }else{
         
      
      
         
         
     }
      if(empty($_POST['city'])){
         $errors['city'] ="pas de loc";
         echo $_POST['city'];
         
     }else{
         
      
      
         
         
     }
   
    if(empty($errors)){
    $req = $pdo->prepare("INSERT INTO users SET username =?, password = ?, email = ?, ville = ?, latitude=?, longitude=?, confirmation_token =?");
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $token = str_random(60);
    debug($token);
    
    $req->execute([$_POST['username'], $password, $_POST['email'],$_POST['ville'],$_POST['longitude'],$_POST['latitude'],$token]);
    $user_id = $pdo->lastInsertID();
   
    mail($_POST['email'], 'Confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://localhost/lastspeedjob/confirm.php?id=$user_id&token=$token");
   $_SESSION['flash']['success'] = 'Un email de confirmation vous a été envoyé pour confirmer votre compte';
//    header('location:http://localhost/lastspeedjob/connexion.php');
    die('Le compte a bien été créé');
      
    }
     
}



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
    <div class='form-group' >
    
    <label for="">ville</label>    
        <select id="location" name="ville" class='form-control' data-placeholder=""></select>
</div>
     <div  class='form-group' >
    
    <label for="">Latitude</label>    
          <input type="text" id='latitude'  name="latitude" class='form-control'/>
</div>
         <div  class='form-group' >
    
    <label for="">Longitude</label>    
          <input type="text" id='longitude'  name="longitude" class='form-control'/>
</div>
  <div  class='form-group' >
    
      
          <input type="hidden" id='cityhidden'  name="city" class='form-control'/>
</div>
  

    
    <button type="submit"  class="btn btn-primary">M'inscrire</button>
   
    </form>

 <script>
//    function setValue(){
//    document.location.ville.value = 100;
//    document.forms["ville"].submit();
//}
            
var options = {
  minimumInputLength: 1,
  ajax: {
    url: 'https://autocomplete.geocoder.cit.api.here.com/6.2/suggest.json',
    delay: 250,
    dataType: 'json',
    data: function (params) {
      return {
          type: 'POST',
        query: params.term,
        app_id: 'GFqbwrojInIhqhNFuFWw',
        app_code: 'laYEl1TgAffv7-r7qDnXlA',
        
        
        searchtext: params.term
        
      };
    },

    processResults: function (data) {
      return {
        results: $.map(data.suggestions, function (obj) {
         return { id: obj.locationId, text: obj.label.split(', ').reverse().join(', ') };
    //    return { id: obj.label, text: obj.label, idi :obj.locationId };
//         return { id: obj.locationId, text: obj.label.split(', ').reverse().join(', ')};
          
        })
      };
    }
  },
  escapeMarkup: function (markup) { return markup; }
  
  
  
  
  
  
  
  
  
};

 
$('#location').select2(options).on('select2:select', function (e) {
  $.getJSON('https://geocoder.cit.api.here.com/6.2/geocode.json', {
    app_id: 'GFqbwrojInIhqhNFuFWw',
    app_code: 'laYEl1TgAffv7-r7qDnXlA',
    type: 'POST',
    locationId: e.params.data.id,
    Label: e.params.data.text,
  }).done(function (data) {
      
    var locn = data.Response.View[0].Result[0].Location;

//    alert(JSON.stringify(data.Response.View[0].Result[0].Location.Address.Label, null, 4));
    var city = JSON.stringify(data.Response.View[0].Result[0].Location.Address.Label, true, 4);
    var lat = JSON.stringify(data.Response.View[0].Result[0].Location.DisplayPosition.Latitude);
    var long = JSON.stringify(data.Response.View[0].Result[0].Location.DisplayPosition.Longitude);
     
//  window.location.href = "index.php?ville=" + ville; 




    $.ajax({
       url : '',
       type : 'POST',
       data : 'lat=' + lat + '&long=' + long + '&city=' + city,
       dataType : 'html',
       success : function(){
//            alert('good');
//           console.log(e.params.data.id);
//            console.log(JSON.stringify(data.Response.View[0].Result[0].Location.Address.Label, true, 4));
//            console.log(JSON.stringify(data.Response.View[0].Result[0].Location.DisplayPosition.Longitude, true, 4));
//            console.log(JSON.stringify(data.Response.View[0].Result[0].Location.DisplayPosition.Latitude, true, 4));
//            console.log(e.params.data.text);
//            console.log(JSON.stringify(data, true, 4));
console.log(city);
        document.getElementById("cityhidden").value = city;
        document.getElementById("latitude").value = lat;
        document.getElementById("longitude").value = long;
        
//           $('#test').html(city);
//           $('#test').html(lat);
       },

       error : function(resultat, statut, erreur){
//            alert('Nogood');
//            console.log(JSON.stringify(data.Response.View[0].Result[0].Location.Address.Label, true, 4));
//            console.log(JSON.stringify(data.Response.View[0].Result[0].Location.DisplayPosition.Longitude, true, 4));
//            console.log(JSON.stringify(data.Response.View[0].Result[0].Location.DisplayPosition.Latitude, true, 4));
            
           $('#location').html(city);
                 
           
       },

       complete : function(resultat, statut){
// alert('complete');
       }

    });
   


  });




//        var vll = document.getElementsByName("ville")[0];     
          
//        HTMLInputElementObject.addEventListener('input', function () {
//        geo()(this.value);
//        });


});


     
//    $.ajax({
//       url : 'index.php',
//       type : 'POST', // Le type de la requête HTTP, ici devenu POST
//       data : ville, // On fait passer nos variables, exactement comme en GET, au script more_com.php
//       dataType : 'html',
//       success : function(){ // code_html contient le HTML renvoyé
//           alert('good');
//       }
//    });
   


</script>
 


