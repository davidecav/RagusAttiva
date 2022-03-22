<?php

////////////////////////////////////////////////INSERISCI CARTELLA//////////////////////////////////////////////////////////
function inserisciCartella(){
    
    $status=[
        "send" => false,
        "error" => false,
        "message" => "",
        "messageUpload" => ""

    ];



if(isset($_POST["inseriscimodulo"])){

    $status["send"] = true;

   

    $nomeEvento = filter_input( INPUT_POST,"nomeEvento", FILTER_SANITIZE_STRING);
    if(strlen($nomeEvento)==0){
        $status["error"] = true;
        $status["message"] .= "*devi inserire un nome</br>";
    }

    $dataevento = filter_input( INPUT_POST,"dataevento", FILTER_SANITIZE_STRING);

    $descrizione = filter_input( INPUT_POST,"descrizione", FILTER_SANITIZE_STRING);
    if(strlen($descrizione)==0){
        $status["error"] = true;
        $status["message"] .= "*devi inserire una descrizione</br>";
    }

    $posizioneEv = filter_input( INPUT_POST,"posizioneEvento", FILTER_SANITIZE_STRING);
    

    $luogolat = filter_input( INPUT_POST,"luogoLat", FILTER_SANITIZE_STRING);
    if(strlen($luogolat)==0){
        $status["error"] = true;
        $status["message"] .= "*devi inserire la latitudine</br>";
    }

    $luogoLon = filter_input( INPUT_POST,"luogoLon", FILTER_SANITIZE_STRING);
    if(strlen($luogoLon)==0){
        $status["error"] = true;
        $status["message"] .= "*devi inserire la longitudine</br>";
    }


    //////////////////////////inserimento della cartella vero e proprio
    
    
    
    
    
    if(($status["send"]) &&($status["error"])){
        

        $status["messageUpload"];

        $status["message"] = '<p style ="background-color : rgba(200,40,40,0.7); padding : 10px; color : white; border-radius:4px; margin-top:10px;">' . $status["message"] . '</p>';
   
    }else if(($status["send"]) &&(!$status["error"])){
        
        uploadCartella($status);
        
        inseriscieventoSql();
        
        $status["message"] = '<p style ="background-color : rgba(30,180,30,0.7); padding : 10px; color : white; border-radius:4px; margin-top:10px;">dati inviati con successo</p>';
       
        $status["messageUpload"];

    }
    
    return $status;
}
}





    




function inseriscieventoSql(){
    /////////////////////////////INSERIMENTO EVENTO SQL///////////////////////////////////////////////////////
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $db = "ragusattiva";
    
    $nomeEvento = filter_input( INPUT_POST,"nomeEvento", FILTER_SANITIZE_STRING);


    $date = new DateTime($_POST["dataevento"]);
    

    $dataevento =  $date->getTimestamp();

    $descrizione = filter_input( INPUT_POST,"descrizione", FILTER_SANITIZE_STRING);
    $iframe = $_POST["iframeplace"];
    $luogoLat = filter_input( INPUT_POST,"luogoLat", FILTER_SANITIZE_STRING);
    $luogoLon = filter_input( INPUT_POST,"luogoLon", FILTER_SANITIZE_STRING);

    
    
   
            
    try{
                $PDOconn = new PDO ("mysql:host=$hostname;dbname=$db", $user, $password); 
                
            }catch(PDOException $e){
                echo $e->getMessage();
                
            }
            
            try{
                $PDOconn->beginTransaction();
                
                $creazione = time();
                
                
                $preparedstatement = $PDOconn->prepare(
                    "insert into evento( Nome, Descrizione,	DataCreazione,
                    	luogolatitudine, luogolongitudine, dataevento, iframe) 
                    values (:nomepl, :descrizionepl, :datacreazionepl,  
                    :luogolatpl, :luogolonpl, :dataeventopl, :iframepl)"); 
                
                
                    $preparedstatement->bindParam(":nomepl", $nomeEvento, PDO::PARAM_STR);
                    $preparedstatement->bindParam(":dataeventopl", $dataevento, PDO::PARAM_STR);
                $preparedstatement->bindParam(":descrizionepl", $descrizione, PDO::PARAM_STR);
                $preparedstatement->bindParam(":datacreazionepl", $creazione, PDO::PARAM_STR);
                $preparedstatement->bindParam(":luogolatpl", $luogoLat, PDO::PARAM_STR);
                $preparedstatement->bindParam(":luogolonpl", $luogoLon, PDO::PARAM_STR);
                $preparedstatement->bindParam(":iframepl", $iframe, PDO::PARAM_STR);
                
                
                $preparedstatement->execute();
                $PDOconn->commit();
                
            }catch(PDOException $e){
                
                $PDOconn->rollBack();
                $e->getMessage();
            }
            
            
            
            
        }
        
        

        ////////////////////////////////////UPLOAD CARTELLA/////////////////////////////////////////

        function uploadCartella($status){
            
            $target_dir = "./Immagini_Galleria//";
            
            
            
            if(isset($_POST['inseriscimodulo']))
            {

                $foldername  = $target_dir . (filter_input( INPUT_POST,"nomeEvento", FILTER_SANITIZE_STRING));
                $thumbnailfolder = $foldername."/thumbnail";
                    
                if(!is_dir($foldername)) mkdir($foldername);
                if(!is_dir($thumbnailfolder)) mkdir($thumbnailfolder);
                    
                foreach($_FILES['cartellaEvento']['name'] as $i => $key)
                    {
                        // echo " $i => $key  ";
                        if(strlen($_FILES['cartellaEvento']['name'][$i]) > 1){ 
                            
                            resizeImage($_FILES['cartellaEvento']['tmp_name'][$i], $foldername."/".$key, 900, 600);
                            resizeImage($_FILES['cartellaEvento']['tmp_name'][$i], $thumbnailfolder."/".$key, 90, 60);



                            //non cambia la dimensione
                            //move_uploaded_file($_FILES['cartellaEvento']['tmp_name'][$i], $foldername."/".$key);
                            //copy($foldername."/".$key,$thumbnailfolder."/".$key);

                      



  		    }
        }
        $status["messageUpload"] = "il file e' stato caricato";
    }
    else{
        
        $status["messageUpload"] = "il file e' stato caricato";
    }


}
////////////////////////////////////////////FUNCTION THUMBNAIL/////////////////////////////////////////////////////////////

function resizeImage($filename, $output, $max_width, $max_height)
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
    
    $resized = imagecreatetruecolor($width, $height);

    $original = imagecreatefromjpeg($filename);
    
  imagecopyresampled($resized, $original, 0, 0, 0, 0,
                                   $width, $height, $orig_width, $orig_height);

  imagejpeg($resized, $output);

                                   
                                  // return $image_p;
}












/*
function resizejpeg($address, $thumbnailAddress){

  

    $original = imagecreatefromjpeg($address);
  
    $resized = imagecreatetruecolor(90, 60);
  
    imagecopyresampled(
      $resized, $original, 0, 0, 0, 0, 90, 60, 900, 600
    );
  
    imagejpeg($resized, "$thumbnailAddress");
  
  
  }
function makeThumbnails($updir, $img)
{
    $thumbnail_width = 134;
    $thumbnail_height = 189;
    $thumb_beforeword = "thumb";
    $arr_image_details = getimagesize("$updir" . "$img"); // pass id to thumb name
    $original_width = $arr_image_details[0];
    $original_height = $arr_image_details[1];
    if ($original_width > $original_height) {////////////orizzontale
        $new_width = $thumbnail_width;
        $new_height = intval($original_height * $new_width / $original_width);
    } else {////////////////////////verticale
        $new_height = $thumbnail_height;
        $new_width = intval($original_width * $new_height / $original_height);
    }
    $dest_x = intval(($thumbnail_width - $new_width) / 2);
    $dest_y = intval(($thumbnail_height - $new_height) / 2);
    if ($arr_image_details[2] == IMAGETYPE_GIF) {
        $imgt = "ImageGIF";
        $imgcreatefrom = "ImageCreateFromGIF";
    }
    if ($arr_image_details[2] == IMAGETYPE_JPEG) {
        $imgt = "ImageJPEG";
        $imgcreatefrom = "ImageCreateFromJPEG";
    }
    if ($arr_image_details[2] == IMAGETYPE_PNG) {
        $imgt = "ImagePNG";
        $imgcreatefrom = "ImageCreateFromPNG";
    }
    if ($imgt) {
        $old_image = $imgcreatefrom("$updir"  . "$img");
        
        $new_image = imagecreatetruecolor($thumbnail_width, $thumbnail_height);
        imagecopyresized($new_image, $old_image, $dest_x, $dest_y, 0, 0, $new_width, $new_height, $original_width, $original_height);
        $imgt($new_image, "$updir"  . '//thumbnail/' . "$thumb_beforeword" . "$img");
    }
}
*/


/*
//////////////////////////////////invia singoli file
function upload($status){

           // var_dump(__FILE__); 

            $target_dir = "./Immagini_Galleria//";
            $nomeFile = $_FILES["cartellaEvento"]["name"];
            $stmpPath = $_FILES["cartellaEvento"]["tmp_name"];
            $errorCode = $_FILES["cartellaEvento"]["error"];

            if($errorCode === UPLOAD_ERR_OK){
        
    
                if(move_uploaded_file($stmpPath, $target_dir . $nomeFile)){
                    
                    $status["messageUpload"] = "il file e' stato caricato";
                }else{
                    $status["messageUpload"] = "il file non e' stato caricato";
                }

                return;            
            }
            /// 4 significa che il file non e stato selezionato
            if($errorCode==4){

                $status["messageUpload"] = "il file non e' stato selezionato";   
            }
        }
        */




////////////////////////////////////////// CANCELLA CARTELLA ////////////////////////////////////////////////////


            function deletedir($filedaeliminare) {
                $target_dir = "./Immagini_Galleria/". $filedaeliminare ."/";


                if (! is_dir($target_dir)) {
                    throw new InvalidArgumentException("$target_dir must be a directory");
                }
                if (substr($target_dir, strlen($target_dir) - 1, 1) != '/') {
                    $target_dir .= '/';
                }
                
                $files = glob($target_dir . '*', GLOB_MARK);
                foreach ($files as $file) {
                 /*   if (is_dir($file)) {/////////////////////se c'e' una dir dentro si dovrebbe fare ricorsivamente
                        self::deletedir($file);
                    } else {
                    }*/
                    unlink($file);
                }
                rmdir($target_dir);
            }


            function rrmdir($target_dir) { 
             //   $target_dir = "./Immagini_Galleria/". $filedaeliminare ."/";
                if (is_dir($target_dir)) { 
                  $objects = scandir($target_dir);
                  foreach ($objects as $object) { 
                    if ($object != "." && $object != "..") { 
                      if (is_dir($target_dir. DIRECTORY_SEPARATOR .$object))
                        rrmdir($target_dir. DIRECTORY_SEPARATOR .$object);
                      else
                        unlink($target_dir. DIRECTORY_SEPARATOR .$object); 
                    } 
                  }
                  rmdir($target_dir); 
                } else{
                    $newdir = "./Immagini_Galleria/". $target_dir ."/";
                    
                   
                        rrmdir($newdir);
                    
                }
              }
/*
              function recurseRmdir($filedaeliminare) {
                $dir = "./Immagini_Galleria/". $filedaeliminare ."/";

                $files = array_diff(scandir($dir), array('.','..'));
                foreach ($files as $file) {
                  (is_dir("$dir/$file")) ? recurseRmdir("$dir/$file") : unlink("$dir/$file");
                }
                return rmdir($dir);
              }
*/
            
            
            ///////////////////////////// CANCELLA DIR SQL ///////////////////////////////////////////////////////
function deletedirsql($filedaeliminare){
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $db = "ragusattiva";
    
            
    try{
                $PDOconn = new PDO ("mysql:host=$hostname;dbname=$db", $user, $password); 
                
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            try{
                $PDOconn->beginTransaction();
                $preparedstatement = $PDOconn->prepare(
                    "DELETE FROM evento WHERE nome = \"$filedaeliminare\""); 

                $preparedstatement->execute();
                $PDOconn->commit();
                
            }catch(PDOException $e){
                
                $PDOconn->rollBack();
                $e->getMessage();
            }
        }
            



        
        ////////////////////////////////////////// NUOVO EVENTO IN PROGRAMMA ////////////////////////////////////////
        function eventoinprogramma(){
            
            $hostname = "localhost";
    $user = "root";
    $password = "";
    $db = "ragusattiva";


    
    $nomenuovoevento = filter_input( INPUT_POST,"nomenuovoevento", FILTER_SANITIZE_STRING);
    $descrizionenuovoevento = filter_input( INPUT_POST,"descrizionenuovoevento", FILTER_SANITIZE_STRING);
    
    
    
    
    $date = new DateTime($_POST["datanuovoevento"]);
    
    
    $datanuovoevento =  $date->getTimestamp();
    //  $datanuovoevento = filter_input( INPUT_POST,"datanuovoevento", FILTER_SANITIZE_STRING);
    
    
    
    
    
    try{
        $PDOconn = new PDO ("mysql:host=$hostname;dbname=$db", $user, $password); 
        
    }catch(PDOException $e){
        echo $e->getMessage();
        
    }
    
    try{
        
        $preparedstatement = $PDOconn->prepare("INSERT INTO `nuovoevento` (nomenuovoevento, descrizionenuovoevento, datanuovoevento) values( :nomenuovoeventopl, :descrizionenuovoeventopl,:datanuovoeventopl );");
        
        $preparedstatement->bindParam(":nomenuovoeventopl", $nomenuovoevento, PDO::PARAM_STR);
        $preparedstatement->bindParam(":descrizionenuovoeventopl", $descrizionenuovoevento, PDO::PARAM_STR);
        $preparedstatement->bindParam(":datanuovoeventopl", $datanuovoevento, PDO::PARAM_STR);
        
        $preparedstatement->execute();
        $PDOconn->commit();
        
    }catch(PDOException $e){
        
        //  $PDOconn->rollBack();
        $e->getMessage();
    }
}


/////////////////////////////////////////////////// PRESS ///////////////////////////////////////////////////



function inserisciarticolisql(){
    
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $db = "ragusattiva";
    
    $titolo = filter_input( INPUT_POST,"titoloarticolo", FILTER_SANITIZE_STRING);
    $testoarticolo = filter_input( INPUT_POST,"testoarticolo", FILTER_SANITIZE_STRING);
    $link = filter_input( INPUT_POST,"linkarticolo", FILTER_SANITIZE_STRING);
    
    $date = new DateTime($_POST["articolodata"]);
    $articolodata =  $date->getTimestamp();
    
    
    
    try{
        $PDOconn = new PDO ("mysql:host=$hostname;dbname=$db", $user, $password); 
        
    }catch(PDOException $e){
        echo $e->getMessage();
        
    }
    
    try{
        $PDOconn->beginTransaction();
        
        $preparedstatement = $PDOconn->prepare(
            "insert into `articoli` ( titolo , articolodata, link, testoarticolo)values(:titolopl, :articolodatapl, :linkpl, :testoarticolopl )"); 
            
            
            $preparedstatement->bindParam(":titolopl", $titolo, PDO::PARAM_STR);
            $preparedstatement->bindParam(":articolodatapl", $articolodata, PDO::PARAM_STR);
            $preparedstatement->bindParam(":linkpl", $link, PDO::PARAM_STR);
            $preparedstatement->bindParam(":testoarticolopl", $testoarticolo, PDO::PARAM_STR);
            
            
            
            
            $preparedstatement->execute();
            $PDOconn->commit();
            
        }catch(PDOException $e){
            
            $PDOconn->rollBack();
            $e->getMessage();
        }
        
        
        
        
    }
    
    
    
    
    
    
        /////////////////////////////////////INVIO DELLA MAIL////////////////////////////////////////////

        function inviamail(){
            
            if(isset($_POST["inviamail"])){
                
                if($_POST["areamail"]!=""){
                    
                    
                    $subject = $_POST["soggettomail"];
                    $message = $_POST["areamail"];
                    //$ii=0;
                    
                    
                    if(isset($_POST["soloadottakm"])){
                        
                        $mailtemp = ricercaUtentiadottakm();
                        
                        
                    }else{
                    
                        $mailtemp = ricercaUtentiSql();
                        
                    }
                    
                    foreach ($mailtemp as $to =>$val) {
                        
                        mail($val["email"], $subject, $message);
                        
                        
                        echo "email inviata a" . $val["email"] ."</br>";
                
                        
                        
                    }
                }
            }
        }

        
        //////////////////////////////////////////////RICERCA UTENTI SQL/////////////////////////////////////////
        
        
        function ricercaUtentiSql(){
            
            $hostname = "localhost";
            $user = "root";
            $password = "";
            $db = "ragusattiva";
            try{
                $PDOconn = new PDO ("mysql:host=$hostname;dbname=$db", $user, $password); 
                
            }catch(PDOException $e){
                echo $e->getMessage();
                
            }
            
            try{
                
                $sth = $PDOconn->query("SELECT email FROM utenti;");
                
                $email = [];
                $ii=0;
                
                
                foreach ($sth as $row ) {

                    $email[$ii]=$row;
                    $ii++;
                    
                }
                
                
                $result = $sth->fetch(PDO::FETCH_ASSOC);
                
                
                return $email;
                
            }catch(PDOException $e){
                
                $e->getMessage();
            }
        }
        
        
        
/////////////////////////////////////////RICERCA UTENTI SQL ADOTTAKM/////////////////////////////////////////////

function ricercaUtentiadottakm(){
    
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $db = "ragusattiva";
    try{
        $PDOconn = new PDO ("mysql:host=$hostname;dbname=$db", $user, $password); 
        
    }catch(PDOException $e){
        echo $e->getMessage();
        
    }
    
    try{
        
        $sth = $PDOconn->query("SELECT email FROM utenti WHERE adottakm;");
        
        $email = [];
        $ii=0;
        
        
        foreach ($sth as $row ) {
            
            $email[$ii]=$row;
            $ii++;
            
        }
        
        
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        
        
        return $email;
        
    }catch(PDOException $e){
        
        $e->getMessage();
    }
}
////////////////////////////////////////////////INSERISCI VIDEO IFRAME/////////////////////////////////////////////////////////

function inviavideo(){



$hostname = "localhost";
$user = "root";
$password = "";
$db = "ragusattiva";

$iframevideoname = filter_input( INPUT_POST,"nomeeventovideo", FILTER_SANITIZE_STRING);
$iframevideo = filter_input( INPUT_POST,"iframevideo", FILTER_SANITIZE_STRING);




try{
    $PDOconn = new PDO ("mysql:host=$hostname;dbname=$db", $user, $password); 
    
}catch(PDOException $e){
    echo $e->getMessage();
    
}

try{
    $appendquery = $PDOconn->query("SELECT iframe FROM `evento` WHERE Nome = '$iframevideoname'");
  
  
    $result = $appendquery->fetch(PDO::FETCH_ASSOC);

 

   // echo $result["iframe"];
    $iframevideo = $result["iframe"] . $iframevideo ;


   


}catch(PDOException $e){

    echo $e->getMessage();

}



try{
   // $PDOconn->beginTransaction();
    
    //$preparedstatement = $PDOconn->prepare(
      $PDOconn->query(
          "UPDATE `evento`  SET iframe = '$iframevideo' WHERE Nome = '$iframevideoname'");
        
      //  $preparedstatement->bindParam("nomevideopl", $iframevideoname, PDO::PARAM_STR);
       // $preparedstatement->bindParam("iframevideopl", $iframevideo, PDO::PARAM_STR);
        
        
        
        
 //       $preparedstatement->execute();
  //      $PDOconn->commit();

        $status["messageUpload"] = "iframe inserito su $iframevideoname";
        
    }catch(PDOException $e){
        
      //  $PDOconn->rollBack();
        $e->getMessage();
    }
    
    
}


////////////////////////////////////////////////INSERIMENTO DEL PROGETTO SQL///////////////////////////////////////////////


function inserisciProgettoSql(){
    
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $db = "ragusattiva";
    
    $nomeProgetto = filter_input( INPUT_POST,"nomeprogetto", FILTER_SANITIZE_STRING);
    $descrizioneProgetto = filter_input( INPUT_POST,"descrizioneprogetto", FILTER_SANITIZE_STRING);
    
    
    try{
        $PDOconn = new PDO ("mysql:host=$hostname;dbname=$db", $user, $password); 
        
    }catch(PDOException $e){
        echo $e->getMessage();
        
    }
    
    try{
        $PDOconn->beginTransaction();
        
        $creazioneprogetto = time();
        
        $preparedstatement = $PDOconn->prepare(
            "insert into progetti( NomeProgetto, descrizioneProgetto, dataCreazioneProgetto) 
            values (:nomepl, :descrizionepl, :datacreazionepl )"); 
            
            
            $preparedstatement->bindParam(":nomepl", $nomeProgetto, PDO::PARAM_STR);
            $preparedstatement->bindParam(":descrizionepl", $descrizioneProgetto, PDO::PARAM_STR);
            $preparedstatement->bindParam(":datacreazionepl", $creazioneprogetto, PDO::PARAM_STR);
            
            
            
            $preparedstatement->execute();
            $PDOconn->commit();

            $status["messageUpload"]= " progetto $nomeProgetto inserito";
            
        }catch(PDOException $e){
            
            $PDOconn->rollBack();
            $e->getMessage();
        }
        
        
        
        
        }
        
        
        /////////////////////////////////////////RICERCA ULTIMI EVENTI///////////////////////////////////////
        
        
        function ricercaprogettisql(){
            
            $hostname = "localhost";
            $user = "root";
            $password = "";
            $db = "ragusattiva";
            try{
                $PDOconn = new PDO ("mysql:host=$hostname;dbname=$db", $user, $password); 
                
            }catch(PDOException $e){
                echo $e->getMessage();
                
            }
            
            try{
                
                $sth = $PDOconn->query("SELECT * FROM progetti;");
                
                $progetti = [];
                $ii=0;
                
                
                foreach ($sth as $row ) {
                    
                    $progetti[$ii]=$row;
                    $ii++;
                    
                }
                
                
                $result = $sth->fetch(PDO::FETCH_ASSOC);
                
                
                return $progetti;
                
            }catch(PDOException $e){
                
                $e->getMessage();
            }
        }
        
        
        
        if(isset($_POST["invianuovoevento"])){
            if($_POST["nomenuovoevento"]!==""){
                if($_POST["descrizionenuovoevento"]!==""){
                    if($_POST["datanuovoevento"]!==""){
                        
                        eventoinprogramma();

                        
                    }
                }
            }
            
        }
        
        
        
        if(isset($_POST["inviaarticolo"])){
            if($_POST["titoloarticolo"]!==""){
                if($_POST["testoarticolo"]!==""){
                    if($_POST["articolodata"]!=="" ){
                        
                        inserisciarticolisql();

                        
                        
                    }                
                }
            }
            
        }
        
        
        
        if(isset($_POST["inviaprogetto"])){
            if($_POST["nomeprogetto"]!==""){
                if($_POST["descrizioneprogetto"]!==""){
                    inserisciProgettoSql();
                    
                }
            }
            
        }



        /////////////////////////video

        if(isset($_POST["inviavideoiframe"])){
            if($_POST["nomeeventovideo"]!==""){
                if($_POST["iframevideo"]!==""){
              
                    inviavideo();
                    
                }
            }
            
        }


        if(isset($_POST["eliminacartella"])){
        
            $filedaeliminare = $_POST["deletecartella"];
        
            rrmdir($filedaeliminare);
            deletedirsql($filedaeliminare);
        
            echo "<h1 style=\"background-color:red;\">Il file $filedaeliminare e' stato eliminato </h1>";
        
        
        
        }
        
        
        ?>