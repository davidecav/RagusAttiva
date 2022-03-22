
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>test</title>

  <link rel="stylesheet" href="provacss.css">
  
</head>
<body>
  
  
  <form method="post" action="test.php">
  <table>
  <tr><td>qualcosa</td><td><input type="date" name = "datasss" id= "datasss"></td></tr>
  
  <tr><td>premere per la data</td><td>
  <button type="submit" >scrividata</button></td></tr>
  <?php
  //var_dump($_POST);
  
  if(isset($_POST["datasss"])){
    echo $_POST["datasss"];
    $date = new DateTime($_POST["datasss"]);
    echo $date->getTimestamp();
  }
  ?>
  
  </table>
  </form>  


<form action="<?php $_SERVER['SCRIPT_NAME'] ; ?>" method="get">

<table>
<tr><td><h3>Inserisci la cartella con le foto dell'evento</h3></td>
    <td><input type="file" name="cartellaProva" id="cartellaProva">
    </td></tr>

    <tr><td><input type="submit" value="invia file">
    </td>
    </tr>
</table>
  


</form>


<div class="idi">
<div class="figlio" >




</div>

</div>





<?php 







function resizejpeg($address){

  $original = imagecreatefromjpeg($address);

  $resized = imagecreatetruecolor(90, 60);

  imagecopyresampled(
    $resized, $original, 0, 0, 0, 0, 90, 60, 900, 600
  );

  imagejpeg($resized, "resized.jpg");


}



function resizeImage($filename, $max_width, $max_height)
{
    list($orig_width, $orig_height) = getimagesize($filename);

    $width = $orig_width;
    $height = $orig_height;

    # taller
    if ($height > $max_height) {
        $width = ($max_height / $height) * $width;
        $height = $max_height;
    }

    # wider
    if ($width > $max_width) {
        $height = ($max_width / $width) * $height;
        $width = $max_width;
    }

    $image_p = imagecreatetruecolor($width, $height);

    $image = imagecreatefromjpeg($filename);

    imagecopyresampled($image_p, $image, 0, 0, 0, 0,
                                     $width, $height, $orig_width, $orig_height);



    return $image_p;
}

function resize($filename){

  

// Content type
header('Content-Type: image/jpeg');

// Get new sizes
list($width, $height) = getimagesize($filename);

if($width>$height){
  $newwidth = 90;
  $newheight = $height * $newwidth / $width;

}else{
  $newheight = 60;
  $newwidth = $width * $newheight / $height;
}


// Load
$thumb = imagecreatetruecolor($newwidth, $newheight);
$source = imagecreatefromjpeg($filename);

// Resize
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

// Output
imagejpeg($thumb);

}



















function elencaimmagini($indirizzoimmagine){
  //elencacartelleselezionate

$numeroidfoto=0;

foreach (glob("$indirizzoimmagine*.jpg") as $filename) {
  echo `<span>`;
  $numeroidfoto++;
  ?>    
        <img src="<?php echo $filename;?>" alt="" style="width:20%; heigth: auto; margin:5%;" class = "oggGalleria" id="<?php echo $numeroidfoto?>" >
        
        <?php
    echo `</span>`;
  }//echo $indirizzoimmagine;
}


function scegliCartelle(){
    
  $directoryGalleria ="./Immagini_Galleria";
        
  $arraydicartelle = [];
  
  $valoreArray=0;

      if ($handle = opendir($directoryGalleria)) {

          while (false !== ($entry = readdir($handle))) {

              if ($entry != "." && $entry != "..") {
                  
                  $arraydicartelle[$valoreArray] = $directoryGalleria ."//". $entry."//";
             
                  ?>

<a href='test.php?<?=$valoreArray;?>=true'>

<span><h4><?= $entry; ?></h4></span></a>

              <?php
                          if (isset($_GET[$valoreArray])) {
                              elencaimmagini($arraydicartelle[$valoreArray]);

                              sqlconnection($valoreArray);

                            }
                            //echo $entry;
                            $valoreArray++;
                        }
                      }
closedir($handle);
}
  //elenca cartelle
  //if($cartellaselezionata){ elencaimmagini();  }
}




//scegliCartelle();






































function apriCartella($numeroCartella){
$directoryGalleria ="./Immagini_Galleria";

$dir=[];

$valoreArray=0;

if ($handle = opendir($directoryGalleria)) {

  while (false !== ($entry = readdir($handle))) {
    
      if ($entry != "." && $entry != "..") {

        //  echo "$entry /n </br>";
          $dir[$valoreArray] = $directoryGalleria ."//". $entry."//";
          $valoreArray++;
      
      }
  }
  closedir($handle);
}



  
  $numeroidfoto=0;
  
  foreach (glob("$dir[$numeroCartella]*.jpg") as $filename) {
    echo `<span>`;
    $numeroidfoto++;
    ?>
        
        
        <img src="<?php echo $filename;?>" alt="" style="width:20%; heigth: auto; margin:5%;" class = "oggGalleria" id="<?php echo $numeroidfoto?>" >
        
        
        
        <?php
    echo `</span>`;
  }
  
  echo "</br>";
  
}


//////////////////////////////////////////////////////////////////////////////
//////////////sql




function sqlconnection($posizione){
  

  $hostname = "localhost";
  $user = "root";
  $password = "";
  $db = "databasediprova";
  

///////	IDEvento	Nome	Descrizione	DataCreazione	PosizioneEvento	luogolatitudine	luogolongitudin
 

  try{
      $PDOconn = new PDO ("mysql:host=$hostname;dbname=$db", $user, $password); 
      $PDOconn->beginTransaction();

    $dataiscr = time();



    $simplequery = $PDOconn->query("select * from evento");

    
    $query = $simplequery->fetchall();

    
    foreach($query[$posizione] as $key=> $value){
      

      //echo "$key   \t\n -----\t\n      $value</br>";
      
      switch($key){
        case "IDEvento":
        $idEvento = $value;
        break;

        case "Nome":
        $nomeEvento = $value;
        break;

        case "Descrizione":
        $descrizione = $value;
        break;

        case "DataCreazione":
        $dataCreazione = $value;
        break;

        case "PosizioneEvento":
        $posizioneEvento = $value;
        break;

        case "luogolongitudine":
        $luogoLongitudine = $value;
        break;
        
        case "luogolatitudine":
        $LuogoLatitudine = $value;
        break;

      }

    }
    ?>
    <div class="container">

      <h4>nome evento: <?=$nomeEvento?></h4>
      <h4>descrizione evento: <?=$descrizione?></h4>
      <h4>posizione evento: <?=$posizione?></h4>
    </div>
      
    
    
    <?php


}catch(PDOException $e){

      $e->getMessage();
  }

}



//sqlconnection(0);


?>




<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

   <script type="text/javascript">



</script>

</body>
</html>


