
<?php
    require_once "header.php";
    require_once "setupinserimentofunction.php";

?>

<div class="container">
<div >
    <h1 class = "titolo">PROGETTI </h1> 

</div>

    
    
    
    <div class="paragrafo">
        <p>RagusAttiva non si occupa solo della rimozione dei rifiuti. La nostra intenzione e' anche quella di instaurare un rapporto piu' stretto con l'ambiente anche grazie a diversi progetti:</p>
    
    <?php $progetto = ricercaprogettisql(); 

foreach ($progetto as $key => $value) {
    
    
    
    ?>


<h2 class="sottotitolo"><?php 

echo $value["NomeProgetto"];
//echo $progetto[0]["NomeProgetto"]; ?></h2>




<h6 class="paragrafo"><?php 
echo $value["descrizioneProgetto"];

//echo $progetto[0]["descrizioneProgetto"]; ?></h6>


<?php 

} 




?>

</div>

</div>

<?php
        require_once "footer.html";
        require_once "ending.html";
        ?>