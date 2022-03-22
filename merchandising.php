
<?php
    require_once "header.php";

?>

<div class="container">

<div >
  <h1 class = "titolo">Le magliette di RagusAttiva!</h1>

</div>
  

  <div class= "sottotitolo" >
<div class="maglietta">

  <h4 >I soldi che spendi per le magliette saranno investiti per la lotta contro l'immondizia!</h4>

<div class="magl">
  <h2>Modello donna</h2>
  <img src="Magliette/0b72210c-829f-4ee9-98e5-66269fb1cf3a.jpg" alt="...">
</div>

<div class="magl">    
    <h2>Modello uomo</h2>
    <img src="Magliette/6d7829ba-1ea5-46f0-b079-bb2a780a981b.jpg" alt="...">  
  </div>
    

</div>
  </div>
  
  <div class="container">

    <form action="<?php $_SERVER['SCRIPT_NAME']?>" method= "post">

      <!--due container uno immagini l'altro il menu, dentro il div-->
      <h6>
        
        <div class="menumaglietta">
          <h5>Richiedi anche tu la maglietta di RagusAttiva </h5>
          
          
          Che taglia prendi?
          
          <select name="menumaglietta" id="menumaglietta">
          <option value="nomaglietta">--</option>
            <option value="magliettaS">taglia S</option>
            <option value="magliettam">taglia M</option>
            <option value="magliettal">taglia L</option>
            <option value="magliettaxl">taglia XL</option>
            
            
            
          </select>
        </div>
        <div class="menumaglietta">
          
          Che modello?
          
          
          <select name="sessomaglietta" id="sessomaglietta">
          <option value="nomaglietta">--</option>
            <option value="magliettamaschile">Uomo</option>
            <option value="magliettafemminile">Donna</option>
            
            
          </select>
          
        </div>
        <div class="menumaglietta">

        <input type="submit" value="Compra" class="bottonegenerico">
          
         
        </div>
        
        
      </h6>
      
    </div>
    
  </form>
    
  </div>
  

    <?php
        



        function compramaglietta(){
          
          echo $_POST["sessomaglietta"];
          echo $_POST["menumaglietta"];
        }







        if( !isset( $_POST["sessomaglietta"])){

          $_POST["sessomaglietta"]="nomaglietta";

        }

         if( !isset( $_POST["menumaglietta"]) ){
          $_POST["menumaglietta"]="nomaglietta";

         }

          if($_POST["sessomaglietta"]!="nomaglietta"){
            if($_POST["menumaglietta"]!="nomaglietta"){
          
              compramaglietta();
              
            }
            
          }
          















        require_once "footer.html";
        require_once "ending.html";
    ?>