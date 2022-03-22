<pre>
<?php


    $stringanome = "cici";
    $stringacognome = "dsds";
    $stringamail= "sdjasodjsa@cdsd";


    $hostname = "localhost";
    $user = "root";
    $password = "";
    $db = "databasediprova";



    
    /////////////////collegamento database tramite obj
    try{
        $PDOconn = new PDO ("mysql:host=$hostname;dbname=$db", $user, $password); 
    //    $mysqlconn = new mysqli("localhost", $user, $password , $db) or die("impossibile connettersi");
        
        /*
     
    //oggetto di connessione $indirizzo,"username", "password"
    $PDOconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
*/


    }catch(PDOException $e){
        echo $e->getMessage();

    }



    /////////////////query
    //$PDOconn->query("insert into utente (nome, cognome, email) values ( '$stringanome', '$stringacognome', '$stringamail')");
    //array 
    //$PDOconn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    //object 
    //$PDOconn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    
    ////////////////preparedstatement
    //////////////inserire begintransaction, commit e rollback per fare in modo che la transazione sia eseguita anche con rischi di mancata connessione
    try{
    $PDOconn->beginTransaction();
    $preparedstatement = $PDOconn->prepare("insert into utente(nome, cognome, email) values (:nomepl, :cognomepl, :emailpl)"); 
    $preparedstatement->bindParam(":nomepl", $stringanome, PDO::PARAM_STR);
    $preparedstatement->bindParam(":cognomepl", $stringacognome, PDO::PARAM_STR);
    $preparedstatement->bindParam(":emailpl", $stringamail, PDO::PARAM_STR);

    $preparedstatement->execute();
    $PDOconn->commit();
    }catch(PDOException $e){

        $PDOconn->rollBack();
        $e->getMessage();
    }



    //$st = $PDOconn->query("select * from utente");
   // $preparedstatement = $PDOconn->prepare("select * from utente where nome = ? and cognome = ?");
    //$preparedstatement->execute([$stringanome, $stringacognome]);
    

    //$record = $st->fetchAll());

    //var_dump($record);
var_dump($preparedstatement->fetchAll());

?>
</pre>