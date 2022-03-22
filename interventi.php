
<?php
    require_once "header.php";

?>

<div class="container">

<div class = "titolo">
  <h1>I luoghi riattivati da RagusAttiva</h1> 

</div>
    
    <div class="sottotitolo" >

      
      <p class = "paragrafo">RagusAttiva è un collettivo nato da giovani stanchi di vedere la propria terra deturpata dall'immondizia, trascurata e privata della sua bellezza.
        </br>
        Il gruppo è stato creato per pulire, curare e arricchire il territorio. Siete tutti benvenuti!</p>
      </div>
      
    </div>




    <div class="center">

<?php
$numero = intervento();

  for($i=0; $i < sizeof($numero); $i++ ){


   // echo $numero[$i]['Nome'];
 //   echo "-----------------$i</br>";

    ?>


      <h1 class="sottotitolo">Evento: <?= intervento()[$i]["Nome"];?> </h1>
      <h6 class="paragrafo">geolocalizzato in coordinate: </h6>
      <h4 class="paragrafo">Latitudine: <?= intervento()[$i]["luogolatitudine"];?></h4>
      <h4 class="paragrafo">Longitudine: <?= intervento()[$i]["luogolongitudine"];?></h4>
      <h6 class="paragrafo"> Data dell'evento:</h6>
      
      <h4 class="paragrafo"><?= date('d/m/Y', intervento()[$i]["dataevento"]);?></h4>
      <!--aggiungere anche la posizione dell'evento-->
      <?= intervento()[$i]["iframe"];
    }

    ?>
    
      </div>





<!--
<!DOCTYPE html>
<html>
  <head>
    <title>Custom Map Projections</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      #coords {
        background-color: black;
        color: white;
        padding: 5px;
      }
    </style>
    <script>
      // This example defines an image map type using the Gall-Peters
      // projection.
      // https://en.wikipedia.org/wiki/Gall%E2%80%93Peters_projection
      function initMap() {
        // Create a map. Use the Gall-Peters map type.
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 0,
          center: { lat: 0, lng: 0 },
          mapTypeControl: false,
        });
        initGallPeters();
        map.mapTypes.set("gallPeters", gallPetersMapType);
        map.setMapTypeId("gallPeters");
        // Show the lat and lng under the mouse cursor.
        const coordsDiv = document.getElementById("coords");
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(coordsDiv);
        map.addListener("mousemove", (event) => {
          coordsDiv.textContent =
            "lat: " +
            Math.round(event.latLng.lat()) +
            ", " +
            "lng: " +
            Math.round(event.latLng.lng());
        });
        // Add some markers to the map.
        map.data.setStyle((feature) => {
          return {
            title: feature.getProperty("name"),
            optimized: false,
          };
        });
        map.data.addGeoJson(cities);
      }
      let gallPetersMapType;

      function initGallPeters() {
        const GALL_PETERS_RANGE_X = 800;
        const GALL_PETERS_RANGE_Y = 512;
        // Fetch Gall-Peters tiles stored locally on our server.
        gallPetersMapType = new google.maps.ImageMapType({
          getTileUrl: function (coord, zoom) {
            const scale = 1 << zoom;
            // Wrap tiles horizontally.
            const x = ((coord.x % scale) + scale) % scale;
            // Don't wrap tiles vertically.
            const y = coord.y;

            if (y < 0 || y >= scale) return "";
            return (
              "https://developers.google.com/maps/documentation/" +
              "javascript/examples/full/images/gall-peters_" +
              zoom +
              "_" +
              x +
              "_" +
              y +
              ".png"
            );
          },
          tileSize: new google.maps.Size(
            GALL_PETERS_RANGE_X,
            GALL_PETERS_RANGE_Y
          ),
          minZoom: 0,
          maxZoom: 1,
          name: "Gall-Peters",
        });
        // Describe the Gall-Peters projection used by these tiles.
        gallPetersMapType.projection = {
          fromLatLngToPoint: function (latLng) {
            const latRadians = (latLng.lat() * Math.PI) / 180;
            return new google.maps.Point(
              GALL_PETERS_RANGE_X * (0.5 + latLng.lng() / 360),
              GALL_PETERS_RANGE_Y * (0.5 - 0.5 * Math.sin(latRadians))
            );
          },
          fromPointToLatLng: function (point, noWrap) {
            const x = point.x / GALL_PETERS_RANGE_X;
            const y = Math.max(0, Math.min(1, point.y / GALL_PETERS_RANGE_Y));
            return new google.maps.LatLng(
              (Math.asin(1 - 2 * y) * 180) / Math.PI,
              -180 + 360 * x,
              noWrap
            );
          },
        };
      }
      // GeoJSON, describing the locations and names of some cities.
      const cities = {
        type: "FeatureCollection",
        features: [
          {
            type: "Feature",
            geometry: { type: "Point", coordinates: [36.97584183143102, 14.774736748275672] },
            properties: { name: "Diga di Santa Rosalia" },
          },
          {
            type: "Feature",
            geometry: { type: "Point", coordinates: [36.89617797048633, 14.693179125015249] },
            properties: { name: "Contrada Fortugno" },
          },
        
          
        ],
      };
    </script>
  </head>
  <body>
    <div id="map"></div>
    <div id="coords"></div>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBt8c2zqr0Eqd92el1_vuHqFL-clt9kk1k&callback=initMap&libraries=&v=weekly"
      async
    ></script>

      </body>
</html>

-->

</div>

    <?php

  function intervento(){

    
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $db = "ragusattiva";
    try{
        $PDOconn = new PDO ("mysql:host=$hostname;dbname=$db", $user, $password); 

        $sth = $PDOconn->query("SELECT * FROM evento order by dataevento DESC ;");
        
        $tutto = [];
        $ii=0;


        foreach ($sth as $row ) {
            $tutto[$ii]=$row;
            $ii++;
        }


        $result = $sth->fetch(PDO::FETCH_ASSOC);
        
       
        return $tutto;

    }catch(PDOException $e){
        
        $e->getMessage();
    }

  }

  




        require_once "footer.html";


        require_once "ending.html";
    ?>

    