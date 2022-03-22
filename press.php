
<?php
    require_once "header.php";

    $articolo = ricercaarticolisql();
?>


<div class="container">
    <div >

        <h1 class = "titolo">PARLANO DI NOI...</h1>
    </div>
<div class="press" style="margin-left: 20px">
    
    <?php
foreach ($articolo as $key => $value) {
    
    
    //    for($i = 0 ; $i < sizeof($articolo); $i++){
        
        ?>


<div class="articolo">
    <h3 class="sottotitolo">
        <?php echo $value["titolo"];
            ?>
        </h3>
        
        <div class="container">
            <h5 class="sottotitolo">
                <?php  
            
            echo date('d/m/Y', $value["articolodata"]);
            ?>
        </h5>
        <p class="paragrafo">
            <?php echo $value["testoarticolo"];
            ?>
        </p>
        <div class = "continuaaleggere" >
        <a href=" <?php echo $value["link"];?>" target = "_blank"> Continua a leggere... </a>
        </div>
        
        <br><br>
    </div>
</div>

<?php
    }
    
    // var_dump($articolo)
    ?>





</div>





</div>





<!--
    <div class="container">
        <h1 style ="padding-top: 20px; padding-bottom:20px;">Come nasce RagusAttiva</h1> <p>RagusAttiva non si ferma qui. Abbiamo un calendario fitto di impegni e di interventi di PULIZIA E RIPIANTUMAZIONE, in quanto il nostro sguardo è rivolto verso la riqualificazione dell’ambiente e del territorio e la sensibilizzazione sociale al tema ambientale.</p>
    </div>
-->


<?php








function ricercaarticolisql(){
    
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
        
        $sth = $PDOconn->query("SELECT titolo , articolodata, link, testoarticolo FROM articoli ORDER by articolodata desc;");
        
        $articoli = [];
        $ii=0;
        
        
        foreach ($sth as $row ) {
            
            $articoli[$ii]=$row;
            $ii++;
            
        }
        
        
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        
        
        return $articoli;
        
    }catch(PDOException $e){
        
        $e->getMessage();
    }
}























        require_once "footer.html";
        require_once "ending.html";
    ?>