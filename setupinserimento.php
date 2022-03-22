
<?=  
    session_start();
    
    if (!isset($_SESSION['accesso'])){      /////////// se non esiste la session accesso muore 
       
           echo "tu non puoi accedere!";die;
        
    }
    if ($_SESSION["accesso"]!="accedipartesegreta"){      /////////// se non esiste la session accesso muore 
       
        echo "tu non accedi!";die;
     
 }
    
    require_once "setupinserimentofunction.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RagusAttiva inserisci altre foto</title>
</head>
<body>

<form action="<?php $_SERVER['SCRIPT_NAME']?>" style= " border: 5px solid #2a4b80; margin-left: 10px" method ="post" enctype="multipart/form-data">


<h1 style="text-align :center">Inserimento foto evento</h1>
<table>

    <tr><td><h3>Nome Evento</h3></td><td><input type="text" name ="nomeEvento"></td></tr>
  <!--  <tr><td>Descrizione</td><td><input type="text" name ="descrizione"></td></tr>-->
  <tr><td><h3>Data evento</h3></td><td><input type="date" name ="dataevento"></td></tr>

    <tr><td><h3>descrizione</h3></td>
    <td>
    <textarea rows="20" cols="50" name="descrizione"></textarea>
    </td></tr>
    
   <!-- <tr><td>DataCreazione</td><td>< ?=  time(); ?></td></tr>-->

    <tr><td><h3>Posizione Evento su google</h3></td><td> <textarea rows="20" cols="50" name ="iframeplace" placeholder = "inserisci iframe da google"></textarea> </td></tr>
    <tr><td><h3>Luogo latitudine</h3></td><td><input type="text" name ="luogoLat"></td></tr>
    <tr><td><h3>Luogo longitudine</h3></td><td><input type="text" name ="luogoLon"></td></tr>
    

    <tr><td><h3>Inserisci la cartella con le foto dell'evento</h3></td>
    <td><input type="file" webkitdirectory="" moxdirectory="" name="cartellaEvento[]" id="cartellaEvento">
    </td></tr>

    <tr><td><input type="submit" value="invia file" name = "inseriscimodulo">
    </td>
    </tr>



</table>

</form>



<form action="<?php $_SERVER['SCRIPT_NAME']?>" style= " border: 5px solid #444444; margin-left: 10px" method ="post" enctype="multipart/form-data">
<table>
    <h1 style="text-align :center">inserisci un progetto</h1>
    <tr><td>
        <h3>nome progetto</h3></td><td><input type="text" name= "nomeprogetto"></td></tr>
    <tr><td><h3>descrizione progetto</h3></td>
    <td><textarea name="descrizioneprogetto" id="descrizioneprog" cols="50" rows="20"></textarea></td></tr>


    <tr><td><input type="submit" value="inserisci progetto" name = "inviaprogetto"></td></tr>


</table>

</form>



<form action="<?php $_SERVER['SCRIPT_NAME']?>" style= " border: 5px solid #2aab80; margin-left: 10px" method ="post" enctype="multipart/form-data">
<table>
    <h1 style="text-align :center">inserisci il prossimo evento</h1>
    <tr><td>
        <h3>nome evento</h3></td><td><input type="text" name= "nomenuovoevento"></td></tr>
        <tr><td>
        <h3>data</h3></td><td><input type="date" name= "datanuovoevento"></td></tr>
    <tr><td><h3>descrizione nuovo evento</h3></td>
    <td><textarea name="descrizionenuovoevento" id="descrizionenuovoevento" cols="50" rows="20"></textarea></td></tr>
    


    <tr><td><input type="submit" value="inserisci nuovo evento" name = "invianuovoevento"></td></tr>


</table>

</form>



<form action="<?php $_SERVER['SCRIPT_NAME']?>" style= " border: 5px solid #444444; margin-left: 10px" method ="post" enctype="multipart/form-data">
<table>
    <h1 style="text-align :center">inserisci l'articolo di giornale</h1>
    <tr><td>
        <h3>Fonte dell' articolo</h3></td><td><input type="text" name= "titoloarticolo"></td></tr>
        <tr><td>
        <h3>data articolo</h3></td><td><input type="date" name= "articolodata"></td></tr>
    <tr><td><h3>parte dell'articolo</h3></td>
    <td><textarea name="testoarticolo" id="testoarticolo" cols="50" rows="20"></textarea></td></tr>
    <td>
    <h3>link articolo</h3></td><td><input type="text" name= "linkarticolo"></td></tr>
    


    <tr><td><input type="submit" value="inserisci articolo" name = "inviaarticolo"></td></tr>


</table>

</form>








<form action="<?php $_SERVER['SCRIPT_NAME']?>" style= " border: 5px solid #2a4b80; margin-left: 10px" method ="post" enctype="multipart/form-data">

<table>
    <h1 style="text-align :center">Invia Mail a tutti</h1>
<tr><td><h3>soggetto della mail</h3></td>
<td><input type="text" name = "soggettomail" placeholder = "inserisci il soggetto della mail"></td></tr>
<tr><td><textarea name="areamail" id="" cols="50" rows="20" placeholder = "Caro utente di RagusAttiva"></textarea></td>
<tr style= "border: 1px solid red">
    <td >
        solo per chi ha adottato un chilometro
    </td>
    <td><input type="checkbox" name = "soloadottakm" id = "soloadottakm"></td></tr>

<td><input type="submit" value="invia mail" name = "inviamail"></td></tr>

</table>

</form>


<form action="<?php $_SERVER['SCRIPT_NAME']?>" style= " border: 5px solid #444444; margin-left: 10px" method ="post" enctype="multipart/form-data">
<table>
    <h1 style="text-align :center">Inserisci video iframe </h1>
    <tr><td>
        <h3>Nome evento corrispondente</h3></td><td><input type="text" name= "nomeeventovideo"></td></tr>
       
  
    <td>
    <h3>Iframe da aggiungere</h3></td><td>
    <textarea name="iframevideo" id="iframevideo" cols="50" rows="20"></textarea>
    </td></tr>
    


    <tr><td><input type="submit" value="inserisci iframe video" name = "inviavideoiframe"></td></tr>


</table>

</form>





<form action="<?php $_SERVER['SCRIPT_NAME']?>" style= " border: 5px solid #a55; margin-left: 10px" method ="post" enctype="multipart/form-data">

<table>
    <h1 style="text-align :center">Cancella Cartella</h1>
<tr><td><h3>Nome cartella immagini da cancellare</h3></td>
<td><input type="text" name = "deletecartella"></td></tr>


<td><input type="submit" value="elimina" name = "eliminacartella"></td></tr>

</table>

</form>


<!-- IDEvento, Nome, Descrizione, DataCreazione, PosizioneEvento, luogolatitudine, luogolongitudine -->

<?php

    $variabileform =inserisciCartella();
    echo $variabileform["message"];
    echo $variabileform["messageUpload"];

    inviamail();

?>

</body>
</html>