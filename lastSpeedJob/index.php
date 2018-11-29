<?php

// On d�marre la session AVANT d'�crire du code HTML
require 'header.php';
require 'functions.php';
//require 'map.php';
//logged_only();

 ?>








<!DOCTYPE html> 
<html lang="fr"> 
 
 
	<body>
<a href="SQLtoXML.php">gÃ©nÃ©ration du fichier XML (Ã  partir de la BDD)</a> -
<a href="xml/point.xml"> lecture du fichier XML</a><br />
            
		<div id="header"></div>
		<?php	require('id_connexion.php');
                
                ?>

		<section id="content">
			<h1>SpeedJob</h1>
			<div id="map" style="width: 100%; height: 400px; background: grey" />
  <script  type="text/javascript" charset="UTF-8" >
    
/**
 * Moves the map to display over Berlin
 *
 * @param  {H.Map} map      A HERE Map instance within the application
 */

/**
 * Adds markers to the map highlighting the locations of the captials of
 * France, Italy, Germany, Spain and the United Kingdom.
 *
 * @param  {H.Map} map      A HERE Map instance within the application
 */




/**
 * Boilerplate map initialization code starts below:
 */

//Step 1: initialize communication with the platform
var platform = new H.service.Platform({
  app_id: 'GFqbwrojInIhqhNFuFWw',
  app_code: 'laYEl1TgAffv7-r7qDnXlA',
  useHTTPS: true
});
var pixelRatio = window.devicePixelRatio || 1;
var defaultLayers = platform.createDefaultLayers({
  tileSize: pixelRatio === 1 ? 256 : 512,
  ppi: pixelRatio === 1 ? undefined : 320
});

//Step 2: initialize a map - this map is centered over Europe
var map = new H.Map(document.getElementById('map'),
  defaultLayers.normal.map,{
  center: {lat:50, lng:5},
  zoom: 4,
  pixelRatio: pixelRatio
});

//Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

// Create the default UI components
var ui = H.ui.UI.createDefault(map, defaultLayers);

// Now use the map as required...
//addMarkersToMap(map);

  </script>
	
                <section>
                    <div>
                     <?php
                     
                        $reponse = $bdd->query('SELECT * FROM users');
                    
                       while ($donnees = $reponse->fetch())
{
?>

 
                        <strong>Liste</strong> : <div name='id_com' class='users'><?php echo $donnees['username']; ?></div><?php print_r($donnees);?><br />
    VILLE : <?php echo $donnees['ville']; ?><br />POSTE<?php echo $donnees['id']; ?> <br />
   <br />MAIL <?php echo $donnees['email']; ?> 
    <?php
  $utilisateur = $donnees['username'];
    $latitude = $donnees['latitude'] ?>
    <?php $longitude = $donnees['longitude'] ;
    
    ?>
   
  
        <INPUT type='hidden' SIZE='30'  class='lattitu' id='latitudeAll' name='lattitu' VALUE="<?php echo $latitude; ?>"/>
        <INPUT type='hidden' SIZE='30'  class='longit' id='longitudeAll' name='longit' VALUE="<?php echo $longitude; ?>"/>
        <?php
      
//            echo $latitude;
//            echo $latitude;
//            echo $longitude;
            ?>
 <?php

}



?>
   <script>
       var i =0;
for(i=0;i<3;i++){
    
 var val1 = document.getElementsByName("lattitu")[i].value;
 var val2 = document.getElementsByName("longit")[i].value;

 var user = document.getElementsByClassName("users")[i].innerHTML;

var marker = new H.map.Marker({lat:val2, lng:val1});
//var marker1 = new H.map.Marker({lat:val2, lng:val1});
 map.addObject(marker);
//marker.addEventListener('tap', function (evt) {
//  
//    var bubble =  new H.ui.InfoBubble(evt.target.getPosition(), {
//      
//      content: evt.target.getData()
//    });
// 
//    ui.addBubble(bubble);
//  }, false);
 
   function addMarkerToGroup(group, coordinate, html) {
  var marker = new H.map.Marker(coordinate);        
  // add custom data to the marker
  marker.setData(html);
  group.addObject(marker);

}


/**
 * Add two markers showing the position of Liverpool and Manchester City football clubs.
 * Clicking on a marker opens an infobubble which holds HTML content related to the marker.
 * @param  {H.Map} map      A HERE Map instance within the application
 */
function addInfoBubble(map) {
    

  
  var marker = new H.map.Group();

  map.addObject(marker);

  // add 'tap' event listener, that opens info bubble, to the group
 marker.addEventListener('pointermove', function (evt) {
    // event target is the marker itself, group is a parent event target
    // for all objects that it contains
    var bubble =  new H.ui.InfoBubble(evt.target.getPosition(), {
        
      // read custom data
      content: evt.target.getData()
      
    });
    ui.getBubbles().forEach(bub => ui.removeBubble(bub));
    // show info bubble
    ui.addBubble(bubble);
     
  }, false);


  console.log(val1, val2, user);
  
addMarkerToGroup(marker, {lat:val2, lng:val1},
  
    '<p "><img style="height:50px;" src="image/avatar.jpg"></p><div style="background:white;height: 50px;"><a href="profile.php?user=' + user + '">'+ user +'</a></div>');
//    document.getElementsByClassName(H_ui)=val1;

}


function addDraggableMarker(map, behavior){

//  var marker = new H.map.Marker({lat:val2, lng:val1});
//  // Ensure that the marker can receive drag events
//  marker.draggable = true;
//  map.addObject(marker);

  // disable the default draggability of the underlying map
  // when starting to drag a marker object:
  map.addEventListener('dragstart', function(ev) {
      console.log('xxxxx');
    var target = ev.target;
    
    if (target instanceof H.map.Marker) {
      behavior.disable();
    }
  }, false);


  // re-enable the default draggability of the underlying map
  // when dragging has completed
  map.addEventListener('dragend', function(ev) {
    var target = ev.target;
    if (target instanceof mapsjs.map.Marker) {
      behavior.enable();
    }
  }, false);

  // Listen to the drag event and move the position of the marker
  // as necessary
   map.addEventListener('drag', function(ev) {
    var target = ev.target,
        pointer = ev.currentPointer;
    if (target instanceof mapsjs.map.Marker) {
      target.setPosition(map.screenToGeo(pointer.viewportX, pointer.viewportY));
    }
  }, false);
} 
addInfoBubble(map);
addDraggableMarker(map, behavior);
}


// map.addObject(marker1);



   </script>

                   </div>
                    <form action="recherche.php" method="post">
<p>
    
     <p>recherche</p>
        <input type="search" name="recherche" />     
        <input type="submit" value="Valider" />
</p>

</form>

                   
                    
                </section>

	</body>
	
</html>
