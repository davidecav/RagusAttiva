<?php
require_once "header.php";
/*
session_start();
$_SESSION['coso']="sucaaaa";
echo $_SESSION['coso'];
*/

?>

<div class="container">


<div>

    <h1 class = "titolo">IN PROGRAMMA</h1>
</div>
</div>




<div class="row" >
    

        
        <div class= "col-sm-5">
<b></b>
        <h3 class = "titoloabbellito"> <b>#Riattiviamo</b></h3>
           <div class = titoloabbellito>
               <h3 class = "sottotitolo" ><img src="RagusAttivaHeader/bandierina.png"  class = "bandierina" ></h3>

               
               <h3 class = "sottotitolo2" ><b><?= eventoinprogramma()["nomenuovoevento"]?></b></h3>

</div>


            <h5 class = "sottotitolo"><?= controlladataeventoinprogramma();?></h5>
            </br>
            <p class = "paragrafo"><?= eventoinprogramma()["descrizionenuovoevento"]?></p>


        </div>

<div class= "col-sm-5">
    
<h3 class = "titoloabbellito"><b>#Riattiviamo</b></h3>
<div class="titoloabbellito">

    <h3 class = "sottotitolo"><img src="RagusAttivaHeader/bandierina.png"  class = "bandierina" ></h3>

    <h3 class = "sottotitolo2"><b><?= ultimoEvento()["nome"]; ?> </b></h3>
</div>
<br>
<div class="titoloabbellito">

    <h5 class = "sottotitolo"><img src="RagusAttivaHeader/orologio.png"  class = "orologio" ><?= convertidataultimoevento() ?></h5>
</div>
<br>
<p class = "paragrafo">
<?= ultimoEvento()["descrizione"]; ?>
</p>

</div>
<!--

<div class= "col-sm-4">
<h3>Sostieni RagusAttiva</h3>
Aiutaci anche solo con un euro

PayPal link:

</div>-->

</div>







<?php

function eventoinprogramma(){

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

        $descrizioneProgetto = $PDOconn->query("SELECT datanuovoevento, nomenuovoevento, descrizionenuovoevento FROM nuovoevento ORDER BY IDNUOVOEVENTO DESC LIMIT 1;");
        //insert into `nuovoevento` (datanuovoevento, descrizionenuovoevento,nomenuovoevento) values()
        $result = $descrizioneProgetto->fetch(PDO::FETCH_ASSOC);

        return $result;

    }catch(PDOException $e){
        
        $e->getMessage();
    }
}



function controlladataeventoinprogramma(){

    $eventoinprogramma = eventoinprogramma();
    $giorno = 60*60*24;


    $eventoprogr =  date('d/m/Y', $eventoinprogramma["datanuovoevento"]);
    //$oggi =  date('d/m/Y', time());

    if(($eventoinprogramma["datanuovoevento"]-time())>0){

        
        
        if(($eventoinprogramma["datanuovoevento"]-time()) < ($giorno) ){
            
            echo '<div class = "titoloabbellito2">';
            echo "La nostra prossima Attivazione sta avendo luogo oggi: ";
            echo '</div>';
            echo "</br>";
            echo '<div class = "titoloabbellito">';
            echo '<img src="RagusAttivaHeader/orologio.png"  class = "orologio" >';
            echo $eventoprogr;
            echo '</div>';
            
            //evento in programma 
        }else if(($eventoinprogramma["datanuovoevento"] - time()) < ($giorno * 7) ){
            //evento in programma questa settimana
            echo '<div class = "titoloabbellito2">';
            echo "L'Attivazione della settimana: ";
            echo '</div>';
            echo "</br>";
            echo '<div class = "titoloabbellito">';
            echo '<img src="RagusAttivaHeader/orologio.png"  class = "orologio" >';
            echo $eventoprogr;
            echo '</div>';
        }else{

            echo '<div class = "titoloabbellito2">';
            echo "La nostra prossima Attivazione in programma: ";
            echo '</div>';
            echo "</br>";
            echo '<div class = "titoloabbellito">';
            echo '<img src="RagusAttivaHeader/orologio.png"  class = "orologio" >';
            echo $eventoprogr;
            echo '</div>';
        }

    }else {
        //evento avvenuto
        echo '<div class = "titoloabbellito2">';
        
       
        echo "La nostra ultima Attivazione: ";
        echo '</div>';
        echo "</br>";
        echo '<div class = "titoloabbellito">';
        echo '<img src="RagusAttivaHeader/orologio.png"  class = "orologio" >';
        echo $eventoprogr;
        echo '</div>';
    }

}





function ultimoEvento(){

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

        $descrizioneultimoevento = $PDOconn->query("SELECT nome, descrizione, dataevento FROM evento ORDER BY dataevento DESC LIMIT 1;");
        
        $result = $descrizioneultimoevento->fetch(PDO::FETCH_ASSOC);

        return $result;

    }catch(PDOException $e){
        
        $e->getMessage();
    }
}


function convertidataultimoevento(){


    $dataconvertita = date('d/m/Y', ultimoevento()["dataevento"]);

    return $dataconvertita;
}











require_once "carousel.html";
require_once "footer.html";
require_once "ending.html";
?>