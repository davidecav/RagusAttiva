
<?php
    require_once "functionNewsletter.php";

    require_once "header.php";

?>

<div class="container">

<div>
    <h1 class = "titolo">POSSO PARTECIPARE?</h1>

</div>

<div class="container">

    <p class="paragrafo">Certamente, tutti sono invitati agli eventi! La provincia di Ragusa beneficerà del tuo intervento da singolo cittadino.
        
        </br>Tuttavia dal momento che non fai parte dell'associazione chiediamo gentilmente di firmare una liberatoria per motivi assicurativi.
    </br>Se vuoi saperne di piu', puoi iscriverti alla nostra newsletter in modo tale da poter ricevere messaggi riguardanti i prossimi eventi e progetti.
</p>







<form action="<?php $_SERVER['SCRIPT_NAME']?>" method="post" style="margin-top: 20px;margin-bottom: 20px">
    
    <h3 class="sottotitolo">Iscriviti alla newsletter</h3>

    <p class="paragrafo">Se sei interessato a partecipare agli interventi di RagusAttiva puoi iscriverti alla nostra newsletter. Non è nostro interesse inviare spam pubblicitario, ma unicamente le date degli eventi.</p>    
    
    <table >
        <tr><td>nome</td><td><input type="text" name = "nome"></td></tr>
        <tr><td>cognome</td><td><input type="text" name = "cognome"></td></tr>
        <tr><td>email</td><td><input type="text" name = "email" method = "post"></td></tr>
        
        
        <tr><td>numero di telefono</td><td><input type="tel" minlength = "10" maxlength = "10" name = "numeroditelefono"></td></tr>
        
        
    </td></tr>
    <tr><td>Aderisci ad "adotta un chilometro" </td><td><a href="adottaunchilometro.php"> Cosa significa?</a></td>
    <td><input type="checkbox" onclick="adottaunkmfunction()" name="adottakm" id="adottakm"></td></tr>
    
    <tr id="kmdaadottare"><td>Kilometro o zona da adottare</td><td><input type="text"  name  = "kmdaadottare" ></td></tr>

    
    
    
<tr>

    <td>Ho letto l'
        <a href="<?php $_SERVER["SCRIPT_NAME"] ?>?informativa">
            informativa per la privacy
        </a>
        
    </td>
    <!--
<td>Ho letto l'informativa sulla privacy</td>
-->


<td><input type="checkbox" name="informativa" id="informativa"></td></tr>
<tr><td>
    <input type="submit" value="iscriviti alla newsletter" name = "modulo" class= "newsletter">
</td></tr>
<tr><br></tr>

</table>


</form>



<div class="informativa" >
    
    <?php

//richiamo la function form della functionNewsletter
$variabile= form();
echo $variabile["message"];

?>
</div>


</div>
</div>


<?php


if(isset($_GET["informativa"])){
    $message = "Privacy Policy
    INFORMATIVA SUL TRATTAMENTO DEI DATI PERSONALI AI SENSI DEGLI ARTT. 13-14 DEL REGOLAMENTO UE 2016/679 </br>
    </br></br></br>
     
    
    PLASTIC FREE ODV ONLUS, con sede legale in VIA DEI PALISSANDRI 8 – 86039 TERMOLI (CB), codice fiscale 91055390701 (in seguito, Titolare o PlasticFree) La informa ai sensi dell’art. 13 D.Lgs. 30/06/2003 n. 196 (in seguito, “Codice Privacy”), modificato dal DL 101/2018, e degli artt. 13 e 14 del Regolamento UE n. 2016/679 (in seguito, GDPR) che i Suoi dati saranno trattati con le modalità e per le finalità di seguito specificate. </br>
    </br>
    I Suoi dati personali saranno trattati in conformità alle disposizioni di legge delle norme sopra citate e degli obblighi di riservatezza ivi previsti. Tutti i trattamenti saranno improntati ai principi di correttezza, liceità e trasparenza. </br>
    </br></br></br>
     
    
    OGGETTO, FINALITÀ E BASE GIURIDICA DEL TRATTAMENTO </br>
    Il Titolare tratterà i Suoi dati personali, per le seguenti finalità connesse all’attuazione di adempimenti relativi ad obblighi legislativi, ovvero adempimenti obbligatori per previsione di legge in campo fiscale e contabile, assicurativo (in caso di sinistri) qualora sia socio di PlasticFree. </br>
    </br></br>
     
    
    I Suoi dati saranno, inoltre, trattati per le finalità relative alla esecuzione di misure connesse ad obblighi associativi o preassociativi, di seguito indicate: </br>
    </br></br></br>
     
    
    Gestione del rapporto associativo: ad es. iscrizione/donazione, procedure amministrative interne, invio della corrispondenza;</br>
    Comunicazione dei Suoi Dati ai Referenti al fine di essere informato sulle iniziative promosse da Plastic Free nel Suo territorio;</br>
    Partecipazione a corsi, iniziative e relativa organizzazione</br>
    Adempiere agli obblighi previsti dalla legge, da un regolamento, dalla normativa comunitaria o da un ordine dell’Autorità (come ad esempio in materia di antiriciclaggio);</br>
    Qualora abbia dato la Sua adesione e prestato il Suo consenso, pubblicare le foto di gruppo sui profili social di Plastic Free;</br>
    </br></br>
    
    previo Suo specifico consenso per le seguenti finalità:</br>
    
    </br></br></br>
    
    inviarLe via e-mail, posta e/o sms e/o contatti telefonici, newsletter, comunicazioni commerciali e/o materiale pubblicitario su prodotti o servizi offerti dal Titolare e rilevazione del grado di soddisfazione sulla qualità dei servizi;</br>
    inviarLe via e-mail, posta e/o sms e/o contatti telefonici comunicazioni commerciali e/o promozionali di soggetti terzi;</br>
    </br></br>

    Il conferimento dei dati con riguardo alle ultime due finalità indicate è facoltativo. Un eventuale rifiuto al trattamento non compromette la prosecuzione del rapporto e non implica nessuna conseguenza sulla congruità del trattamento.</br>
    </br></br>
     
    
    MODALITÀ DI TRATTAMENTO</br>
    Il trattamento dei Suoi dati personali è realizzato nel rispetto del quadro normativo, italiano ed europeo, a tutela dei dati personali.</br>
    </br>    
    I Suoi dati sono trattati sia in formato cartaceo che elettronico.</br></br>
    
    PlasticFree tratterà i suoi dati personali per il tempo necessario per adempiere alle finalità di cui sopra e comunque non oltre 10 anni dalla data di iscrizione a socio (il termine indicato ridecorre da ciascun rinnovo annuale), oppure sino al momento in cui lei decidesse di esercitare il diritto di revocare la sua iscrizione all’Associazione e chiedere la cancellazione dei dati stessi, salvo naturalmente che un obbligo previsto dalla legge, da un regolamento o dalla normativa comunitaria, non ne imponga la conservazione (in quest’ultimo caso si intende che il trattamento dei dati avverrà solo al fine di assolvere l’obbligo di legge e non più per le finalità di cui alla presente informativa) ovvero l’esercizio di un diritto (o comunque un legittimo interesse) dell’Associazione stessa non ne richieda la conservazione
    </br></br></br> 
     
    
    ACCESSO AI DATI</br>
    I Suoi dati potranno essere resi accessibili, per le finalità elencate, a soggetti giuridicamente autonomi rispetto al Titolare, a soggetti nominati Responsabili oppure a soggetti incaricati o comunque autorizzati, sempre nel rispetto del principio di finalità.
    </br></br>
    Sempre nel rispetto dei principi del trattamento e per le finalità indicate, i Suoi dati potranno essere comunicati a i seguenti soggetti che operano all’interno dell’Unione Europea:
    </br></br>
    soggetti esterni all’Associazione che svolgono servizi di inserimento dati, allestimento, stampa, call center, intermediazione bancaria e finanziaria, trasporto e smistamento delle comunicazioni al pubblico, servizi di e-mailing, archiviazione della documentazione, consulenza, assicurazione, promozione e raccolta fondi, organizzazioni territoriali “aggregate” che attuano localmente il programma dell’Associazione.</br>
    a soggetti individuati per i quali la comunicazione si renda necessaria per adempiere ad un obbligo previsto dalla legge, da un regolamento o dalla normativa comunitaria.</br>
    I Suoi dati non saranno altrimenti diffusi.</br>
    </br></br></br>
     
    
    COMUNICAZIONE DEI DATI</br>
    Senza la necessità di un espresso consenso (ex art. 24 lett. a), b), d) Codice Privacy e art. 6 lett. b) e c) GDPR), il Titolare potrà comunicare i Suoi dati per le finalità di cui all’art. 2.A) a Organismi di vigilanza, Autorità giudiziarie, nonché a quei soggetti ai quali la comunicazione sia obbligatoria per legge per l’espletamento delle finalità dette. Detti soggetti tratteranno i dati nella loro qualità di autonomi titolari del trattamento. I Suoi dati non saranno diffusi.
    </br></br></br>
     
    
    LUOGO DI CONSERVAZIONE DEI DATI</br>
    I dati personali sono conservati presso la sede del Titolare, all’interno dell’Unione Europea e/o su cloud server di fornitori terzi in conformità a quanto prescritto dal GDPR.
    </br></br></br>
     
    
    DIRITTI DELL’INTERESSATO</br>
    Nella Sua qualità di interessato, Lei, in qualità di interessato ha facoltà di esercitare i diritti di cui all’art. 7 Codice Privacy e art. 15 GDPR e precisamente i diritti di:
    </br></br></br>
     
    
    ottenere la conferma dell’esistenza o meno di dati personali che La riguardano, anche se non ancora registrati, e la loro comunicazione in forma intelligibile;</br>
    ottenere l’indicazione dell’origine dei dati personali, delle finalità e modalità del trattamento e della logica applicata in caso di trattamento effettuato con l’ausilio di strumenti elettronici nonché degli estremi identificativi del titolare, dei responsabili e del rappresentante designato ai sensi dell’art. 5, comma 2 Codice Privacy e art. 3, comma 1, GDPR;</br>
    ottenere l’aggiornamento, la rettificazione ovvero, quando vi ha interesse, l’integrazione dei dati; la cancellazione, la trasformazione in forma anonima o il blocco dei dati trattati in violazione di legge, compresi quelli di cui non è necessaria la conservazione in relazione agli scopi per i quali i dati sono stati raccolti o successivamente trattati;</br>
    ove applicabili, ha altresì i diritti di cui agli art. 16-21 GDPR (Diritto di rettifica, diritto all’oblio, diritto di limitazione di trattamento, diritto alla portabilità dei dati, diritto di opposizione), nonché il diritto di reclamo all’Autorità Garante.</br>
    il periodo di conservazione dei Suoi dati personali</br>
    di chiedere al titolare del trattamento l’accesso ai dati personali e la rettifica o la cancellazione degli stessi o la limitazione del trattamento che La riguardano o di opporsi al loro trattamento, oltre al diritto alla portabilità dei dati;</br>
    di proporre reclamo a un’autorità di controllo;</br>
    di conoscere la fonte da cui hanno origine i Suoi dati personali e, se del caso, l’eventualità che i dati provengano da fonti accessibili al pubblico;</br>
    di sapere se esiste un processo decisionale automatizzato, compresa la profilazione di cui all’articolo 22, paragrafi 1 e 4 GDPR, e, almeno in tali casi, informazioni significative sulla logica utilizzata, nonché l’importanza e le conseguenze previste di tale trattamento per la sua persona.
    </br></br></br> 
    
    TITOLARE, RESPONSABILI E INCARICATI</br>
    Il Titolare del trattamento è PLASTIC FREE ODV ONLUS, VIA DEI PALISSANDRI 8 – 86039 TERMOLI (CB). L’elenco aggiornato dei responsabili e degli incaricati al trattamento è custodito presso la sede legale del Titolare del trattamento.
    </br></br></br>
     
    
    MODALITÀ DI ESERCIZIO DEI DIRITTI</br>
    Potrà in qualsiasi momento esercitare i Suoi diritti, come sopra espressamente individuatim in qualunque momento, inviando alternativamente:
    </br></br></br>
     
    
    una raccomandata A.R. a: PLASTIC FREE ODV ONLUS – VIA DEI PALISSANDRI 8 – 86039 TERMOLI (CB)</br>
    oppure</br>
    </br></br></br>
                                                 
    
    una e-mail all’indirizzo: associazione@plasticfreeonlus.it";
    
    
    echo "<p class= 'informativa' id = 'privacy'  \">$message</p>";

}



        require_once "carousel.html";
        require_once "footer.html";
        require_once "ending.html";
        if(!isset($_POST["email"])){
            $_POST["email"]="";

        }else{

        if ($_POST["email"]=="ciccionamente63@tizio.com"){    ////////se la mail e' settata con la password che decido io la session e' settata e quindi
            $_SESSION['accesso']="accedipartesegreta";
         //   header("location:setupinserimento.php");
          
          
          }
        }
          
    ?>


