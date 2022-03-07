<?php
  
       
$locations=array(); // creating array to store 

$uname="root"; //Username of a database.

$pass="";  //Password of database.

$servername="localhost"; //Database servername.

$dbname="ubus";  // Your database name.

$db=new mysqli($servername,$uname,$pass,$dbname); // This line is connecting to database using mysqli method.

$query =  $db->query("SELECT * FROM routes "); //Retriving the value database.
        //$number_of_rows = mysql_num_rows($db);  
        //echo $number_of_rows;
while( $row = $query->fetch_assoc() ){ //fetching row and column from location table.
$name = $row['source']; 
$longitude = $row['source_long'];                              
$latitude = $row['source_lat'];
$link=$row['destination'];
            /* Each row is added as a new array */
$locations[]=array( 'source'=>$name, 'source_lat'=>$latitude, 'source_long'=>$longitude , 'destination'=>$link );

}
        //echo $locations[0]['name'].": In stock: ".$locations[0]['lat'].", sold: ".$locations[0]['lng'].".<br>";
        //echo $locations[1]['name'].": In stock: ".$locations[1]['lat'].", sold: ".$locations[1]['lng'].".<br>";
?>

<html>
<body>
    <head>
        <title>Google Map Using PHP and MySql.</title>
        <style>
        #map{
            height:100%;
            weight:100px;
        }
        </style>
    
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDrMTfBa9NXyO3izpTE1hrR96YGxmMin4g"></script> 
    <script type="text/javascript">
    var map;
    var Markers = {};
    var infowindow;
    var locations = [
        <?php for($i=0;$i<sizeof($locations);$i++){ $j=$i+1;?>
        [
            'AMC Service',
            '<p>.....<a href="<?php echo $locations[0]['destination'];?>"></a></p>',
            <?php echo $locations[$i]['source_lat'];?>,
            <?php echo $locations[$i]['source_long'];?>,
            0
        ]<?php if($j!=sizeof($locations))echo ","; }?>
    ];
	
	  //Loop through markers
      // for(var i = 0;i < locations.length;i++){
       // Add marker
        // addMarker(locations[$i]['lat']);
		// addMarker(locations[$i]['lng']);
      // }
	
    var origin = new google.maps.LatLng(locations[0][2], locations[0][3]);
    function initialize() {
      var mapOptions = {
        zoom: 12,
        center: origin
      };
      map = new google.maps.Map(document.getElementById('map'), mapOptions);
        infowindow = new google.maps.InfoWindow();
        for(i=0; i<locations.length; i++) {
            var position = new google.maps.LatLng(locations[i][2], locations[i][3]);
            var marker = new google.maps.Marker({
                position: position,
                map: map,
            });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][1]);
                    infowindow.setOptions({maxWidth: 200});
                    infowindow.open(map, marker);
                }
            }) (marker, i));
            Markers[locations[i][4]] = marker;
        }
        locate(0);
		//add traffic layer
		var trafficLayer = new google.maps.TrafficLayer();
        trafficLayer.setMap(map);
    }
    function locate(marker_id) {
        var myMarker = Markers[marker_id];
        var markerPosition = myMarker.getPosition();
        map.setCenter(markerPosition);
        google.maps.event.trigger(myMarker, 'click');
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>

<div id="map"></div>

</body>
</html>