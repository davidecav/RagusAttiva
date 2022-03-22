<?php

require_once "header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=
  , initial-scale=1.0">
  <title>Prova</title>
 

  <link rel="stylesheet" href="./lightbox/lightbox.min.css" type = "text/css">
  <script src="./lightbox/lightbox-plus-jquery.min.js"></script>

</head>
<body>


<div class="container">


    <h1 class = "titolo">GALLERIA IMMAGINI</h1> 
    </div>


  
</body>
</html>



<?php

function elencaimmagini($indirizzothumbnail , $foldername){
  //elencacartelleselezionate
  
  $numeroidfoto=0;
echo "<div class = 'center'>";

$thumb = "//thumbnail";

$indirizzopervideo = str_replace($thumb , "" , $indirizzothumbnail);

foreach (glob("$indirizzothumbnail*.jpg") as $filename) {

  $numeroidfoto++;

  



   $indirizzo = str_replace($thumb , "" , $filename);

  ?>    


<a href="<?php echo $indirizzo;?>" class = "gallerimg" data-title ="<?php echo $foldername;?>" data-lightbox = "mygallery" >

<img src="<?php echo $filename;?>" alt="" class = "gallerimgthumb" id="<?php echo $numeroidfoto?>" >
  </a>
  
  
  
  <?php



}//echo $indirizzoimmagine;


echo "</div>";
echo "<div class=\"video\">";


  ///////
  foreach (glob("$indirizzopervideo*.mp4") as $filename) {

  
  
    ?>    
  
  
    <video controls class ="videoclass">
      
      <source src="<?php echo $filename;?>" type="video/mp4">
    
    </video>
  
          
          <?php
  
    
  
    }//echo $indirizzoimmagine;
  
  ////
  echo "</div>";
  

}




function scegliCartelle(){
  
  $directoryGalleria ="./Immagini_Galleria";
  
  $arraydicartelle = [];
  $arraydithumbnail = [];
  
  $valoreArray=0;

      if ($handle = opendir($directoryGalleria)) {

          while (false !== ($entry = readdir($handle))) {

              if ($entry != "." && $entry != "..") {
                  
                //  $arraydicartelle[$valoreArray] = $directoryGalleria ."//". $entry."//";
                  $arraydithumbnail[$valoreArray] = $directoryGalleria ."//". $entry."//thumbnail/";



             
                  ?>

<a href='galleria.php?<?php echo $valoreArray;?>=true'>

<div >
<button class = "bottonegalleria"><h4><?php echo $entry; ?></h4></button></div></a>

              <?php

              ////rivedere il settaggio del get
                          if (isset($_GET[$valoreArray])) {

                              elencaimmagini($arraydithumbnail[$valoreArray] , $entry);

                              sqlconnection($valoreArray);

                            }
                            //echo $entry;
                            $valoreArray++;
                        }
                      }
closedir($handle);
}
 
}

function sqlconnection($posizione){
  

  $hostname = "localhost";
  $user = "root";
  $password = "";
  $db = "ragusattiva";
  

///////	IDEvento	Nome	Descrizione	DataCreazione	PosizioneEvento	luogolatitudine	luogolongitudin
 

  try{
      $PDOconn = new PDO ("mysql:host=$hostname;dbname=$db", $user, $password); 
      $PDOconn->beginTransaction();

    $dataiscr = time();



    $simplequery = $PDOconn->query("select * from evento order by nome");

    
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

        case "iframe":
          $iframe = $value;
          break;

        case "dataevento":
          $dataEvento = $value;
          break;

        case "Descrizione":
        $descrizione = $value;
        break;

        case "DataCreazione":

         //$dataCreazione= date('d-m-Y', $value);
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
<div class="video">
<?php 


echo $iframe;



?>
</div>


    <div class="container">

      <h3 class = "sottotitolo">nome evento:</h3>
      <p class = "paragrafo"><?=$nomeEvento?></h4><p>


      <?php
      if($dataEvento){
        echo "<h3 class = 'sottotitolo'>data evento:</h3>";

        $newdata = date('d/m/Y', $dataEvento);
        echo "<p class = 'paragrafo'>  $newdata</p>";

      }
      ?>
 

      <h3 class = "sottotitolo">descrizione evento:</h3>
      <p class = "paragrafo"><?=$descrizione?></p>
    </div>
      
    
    
    <?php


}catch(PDOException $e){

      $e->getMessage();
  }

}



echo "<div class= elementogalleria>";
scegliCartelle();
echo "</div>";









require_once "footer.html";

require_once "ending.html"




?>