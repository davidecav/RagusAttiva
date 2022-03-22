<?php

require_once "header.php";


?>


<form action="<?php $_SERVER["SCRIPT_NAME"] ?>">

<?php
//resocontocartello();

?>


<div class="tabellacart">

    
    <table>
        <tr><td>Nome</td><td><input type="text"></td></tr>
        <tr><td>Cognome</td><td><input type="text"></td></tr>
        <tr><td>Numero di telefono</td><td><input type="text"></td></tr>
        <tr><td>Email</td><td><input type="text"></td></tr>
        <tr><td>Città</td><td><input type="text"></td></tr>
        <tr><td>Indirizzo</td><td><input type="text"></td></tr>
        <tr><td>CAP</td><td><input type="text"></td></tr>
        
        
        
    </table>
</div>





</form>




<?php

require_once "carousel.html";
require_once "footer.html";
require_once "ending.html";
?>