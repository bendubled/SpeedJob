//function getXMLHttpRequest() {
//   
//	var xhr = null;
//	
//	if (window.XMLHttpRequest || window.ActiveXObject) {
//		if (window.ActiveXObject) {
//			try {
//				xhr = new ActiveXObject("Msxml2.XMLHTTP");
//			} catch(e) {
//				xhr = new ActiveXObject("Microsoft.XMLHTTP");
//			}
//		} else {
//			xhr = new XMLHttpRequest(); 
//		}
//	} else {
//		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
//		return null;
//	}
//	
//	return xhr;
//}
//var xhr = getXMLHttpRequest(); // Voyez la fonction getXMLHttpRequest() définie dans la partie précédente
//
//
//
//xhr.open("POST", "index.php", true);
//xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//xhr.send("lattitude=lat");
//var val = parseInt("<?php echo $latitude ?>");
//alert(val);
//
//
//
//

//  $(function() {
//	   res = Math.random();
//     $.get('test9010b.php?r='+res, function(data2) {
//	   $('#toto').html(data2);			
//     });
//  });






//function reqListener () {
//      console.log(this.responseText);
//    }
//
//    var oReq = new XMLHttpRequest(); //New request object
//    oReq.onload = function() {
//        //This is where you handle what to do with the response.
//        //The actual data is found on this.responseText
//        alert(this.responseText); //Will alert: 42
////        console.log(this.responseText);
//    };
//    oReq.open("post", "index.php", true);
//    //                               ^ Don't block the rest of the execution.
//    //                                 Don't wait until the request finishes to 
//    //                                 continue.
//    oReq.send();



// var test2 = document.getElementById("latitudeAll");
////    var myData = test2.textContent;
//console.log = test2;
//alert(test2)

//function showResult(result) {
// document.getElementById('latitude').value = result.geometry.location.lat();
// document.getElementById('longitude').value = result.geometry.location.lng();
//}
//
//function getLatitudeLongitude(callback, address) {
//    // If adress is not supplied, use default value 'Ferrol, Galicia, Spain'
//    address = address || 'Ferrol, Galicia, Spain';
//    // Initialize the Geocoder
//    geocoder = new google.maps.Geocoder();
//    if (geocoder) {
//        geocoder.geocode({
//            'address': address
//        }, function (results, status) {
//            if (status == google.maps.GeocoderStatus.OK) {
//                callback(results[0]);
//            }
//        });
//    }
//}
//
//var button = document.getElementById('btn');
//
//button.addEventListener("click", function () {
//    var address = document.getElementById('address').value;
//    getLatitudeLongitude(showResult, address)
//});
//
//    $.ajax({
//       url : '',
//       type : 'POST',
//       
//       dataType : 'html',
//       success : function(){
////            alert('good');
////           console.log(e.params.data.id);
////            console.log(JSON.stringify(data.Response.View[0].Result[0].Location.Address.Label, true, 4));
////            console.log(JSON.stringify(data.Response.View[0].Result[0].Location.DisplayPosition.Longitude, true, 4));
////            console.log(JSON.stringify(data.Response.View[0].Result[0].Location.DisplayPosition.Latitude, true, 4));
////            console.log(e.params.data.text);
////            console.log(JSON.stringify(data, true, 4));
////console.log(city);
////        document.getElementById("cityhidden").value = city;
////        document.getElementById("latitude").value = lat;
////        document.getElementById("longitude").value = long;
//        
////           $('#test').html(city);
////           $('#test').html(lat);
//       },
//
//       error : function(resultat, statut, erreur){
////            alert('Nogood');
////            console.log(JSON.stringify(data.Response.View[0].Result[0].Location.Address.Label, true, 4));
////            console.log(JSON.stringify(data.Response.View[0].Result[0].Location.DisplayPosition.Longitude, true, 4));
////            console.log(JSON.stringify(data.Response.View[0].Result[0].Location.DisplayPosition.Latitude, true, 4));
//            
////           $('#location').html(city);
//                 
//           
//       },
//
//       complete : function(resultat, statut){
//// alert('complete');
//       }
//
//    });





function moveMapToBerlin(map){
  map.setCenter({lat:52.5159, lng:13.3777});
  map.setZoom(14);
}

//var val = "<?php echo $latitude ?>";
//alert(val);
// var val =  document.getElementById("latitudeAll").value;
//function addMarkersToMap(map) {

//    console.log(val);
//    alert(val);
//  var parisMarker = new H.map.Marker({lat:52.5159, lng:2.3508});
//  map.addObject(parisMarker);


//}

                