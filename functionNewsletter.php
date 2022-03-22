<?php

///////////////////////form
function form(){
    
    $status=[
        "send" => false,
        "error" => false,
        "message" => ""

    ];



if(isset($_POST["modulo"])){

    $status["send"] = true;

    $nome = filter_input( INPUT_POST,"nome", FILTER_SANITIZE_STRING);
    if(strlen($nome)==0){
        $status["error"] = true;
        $status["message"] .= "*devi inserire un nome</br>";
        
    }

    $cognome = filter_input( INPUT_POST,"cognome", FILTER_SANITIZE_STRING);
    if(strlen($cognome)==0){
        $status["error"] = true;
        $status["message"] .= "*devi inserire un cognome</br>";
    }

    $numerotelefono = filter_input( INPUT_POST,"numeroditelefono", FILTER_SANITIZE_NUMBER_INT);
    if(($numerotelefono)==''){
        $status["error"] = true;
        $status["message"] .= "*devi inserire un numero di telefono</br>";

    }




    if(!filter_input( INPUT_POST,"email", FILTER_VALIDATE_EMAIL)){
        $status["error"] = true;

        $status["message"] .= "*devi inserire un email valida</br>";
    }else{
        $email = filter_input( INPUT_POST,"email", FILTER_VALIDATE_EMAIL);
    }




    if(filter_has_var(INPUT_POST,"informativa")){

        $informativa =true;

    }else{
        $informativa =false;

        $status["error"] = true;
        $status["message"] .= "*devi aver letto le condizioni dell'informativa sulla privacy prima</br>";
    }

    if(($status["send"]) &&($status["error"])){

        $status["message"] = '<p style ="background-color : rgba(200,40,40,0.7); padding : 10px; color : white; border-radius:4px; margin-top:10px;">' . $status["message"] . '</p>';
    }else if(($status["send"]) &&(!$status["error"])){
        
        
        $status["message"] = '<p style ="background-color : rgba(30,180,30,0.7); padding : 10px; color : white; border-radius:4px; margin-top:10px;">dati inviati con successo</p>';
    
        if($_POST["email"]!="ciccionamente63@tizio.com"){

            sqlinserisciutente();
        }


    }

    return $status;
}
}



function sqlinserisciutente(){
            /////////////////////////////sql
            $hostname = "localhost";
            $user = "root";
            $password = "";
            $db = "ragusattiva";
            
            $nome = filter_input( INPUT_POST,"nome", FILTER_SANITIZE_STRING);
            $cognome = filter_input( INPUT_POST,"cognome", FILTER_SANITIZE_STRING);
            $numerotelefono = filter_input( INPUT_POST,"numeroditelefono", FILTER_SANITIZE_NUMBER_INT);
            $email = filter_input( INPUT_POST,"email", FILTER_VALIDATE_EMAIL);



            

            if(filter_has_var(INPUT_POST,"adottakm")){

                $booleankm =true;
                $kmdaadottare = filter_input( INPUT_POST,"kmdaadottare", FILTER_SANITIZE_STRING);

        
            }else{
                $booleankm =false;
              //  $kmdaadottare = "";
            }




            if(filter_has_var(INPUT_POST,"informativa")){

                $informativa =true;
        
            }else{
                $informativa =false;
            }

    

            
    
            try{
                $PDOconn = new PDO ("mysql:host=$hostname;dbname=$db", $user, $password); 
    
            }catch(PDOException $e){
                echo $e->getMessage();
    
            }
    
    
    
                try{
            $PDOconn->beginTransaction();

            $dataiscr = time();

            $preparedstatement = $PDOconn->prepare("insert into utenti(nome, cognome, numeroditelefono, email, dataiscrizione, adottakm, kmdaadottare) values (:nomepl, :cognomepl, :telefonopl, :emailpl, :dataiscrizionepl, :adottakmpl, :kmdaadottarepl)"); 
            
            $preparedstatement->bindParam(":nomepl", $nome, PDO::PARAM_STR);
            $preparedstatement->bindParam(":cognomepl", $cognome, PDO::PARAM_STR);
            $preparedstatement->bindParam(":telefonopl", $numerotelefono, PDO::PARAM_STR);
            $preparedstatement->bindParam(":emailpl", $email, PDO::PARAM_STR);
            $preparedstatement->bindParam(":dataiscrizionepl", $dataiscr, PDO::PARAM_STR);
            $preparedstatement->bindParam(":adottakmpl", $booleankm, PDO::PARAM_STR);
            $preparedstatement->bindParam(":kmdaadottarepl", $kmdaadottare, PDO::PARAM_STR);



            //$preparedstatement->bindParam(":informativapl",$inviamailsoloinzona,PDO::PARAM_BOOL);
    
            $preparedstatement->execute();
            $PDOconn->commit();

            //////////////////////manda la email di iscrizione
            if($informativa){
                $messaggioDellaMail = "Ciao $nome  $cognome, /r/n/r/n Complimenti, ti sei iscritto su RagusAttiva.//r/n Siamo lieti che tu faccia parte della nostra newsletter./r/n ti invieremo gli inviti ai nostri eventi.";
            }

         //   mail($email, "Iscrizione di RagusAttiva", $messaggioDellaMail );

            }catch(PDOException $e){
    
                $PDOconn->rollBack();
                $e->getMessage();
            }




}



?>