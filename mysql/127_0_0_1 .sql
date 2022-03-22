-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 12:08 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ragusattiva`
--
CREATE DATABASE IF NOT EXISTS `ragusattiva` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ragusattiva`;

-- --------------------------------------------------------

--
-- Table structure for table `articoli`
--

CREATE TABLE `articoli` (
  `titolo` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `testoarticolo` text DEFAULT NULL,
  `idarticoli` int(11) NOT NULL,
  `articolodata` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articoli`
--

INSERT INTO `articoli` (`titolo`, `link`, `testoarticolo`, `idarticoli`, `articolodata`) VALUES
('RagusaOggi', 'https://www.ragusaoggi.it/ai-porci-dellambiente-ci-pensa-ragusattiva-volontari-raccolgono-400-sacchi-di-rifiuti-dispersi-in-un-luogo-di-straordinaria-bellezza-ambientale/', 'Ai porci dell&#39;ambiente ci pensa RagusAttiva. Volontari raccolgono 400 sacchi di rifiuti dispersi in un luogo di straordinaria bellezza ambientale', 14, '1612825200'),
('Newssicilia24', 'http://newssicilia24.altervista.org/nasce-l-associazione-ragusattiva-organizzazione-no-profit-aiutare-l-ambiente-la-comunita/', 'Nasce l’ Associazione “RagusAttiva”. Organizzazione no-profit per aiutare l’ ambiente e la comunità.\r\n\r\nNasce RagusAttiva, organizzazione no-profit fondata da Piero Pizzo, Laura (Ant) Buttacavoli, Federico Guida, Marco Spadaro, Giulio Cascone e Gianni Carfì, un gruppo di giovani stanchi di vedere la propria terra deturpata dall’immondizia, trascurata e privata della sua bellezza. Ragusattiva siamo Noi, ma siete anche Voi, nel momento in cui decidete di uscire di casa e aiutare in qualsiasi modo la comunità e l’ambiente.', 15, '1612998000'),
('Novetv.com', 'https://www.novetv.com/nuova-spedizione-ragusattiva-enorme-quantita-rifiuti-raccolti-c-fortunello/', 'NUOVA “SPEDIZIONE” DI RAGUSATTIVA, UNA ENORME QUANTITÀ DI RIFIUTI RACCOLTI IN C.DA FORTUNELLO\r\n\r\nAltro giro, altra corsa. Domenica scorsa si è svolta un’altra spedizione di RagusAttiva, presso il piazzale di contrada Bruscè, direzione contrada Fortunello.\r\n\r\n“Siamo partiti in due la prima volta, poi in dieci e adesso siamo in cento”, il commento a caldo di Piero Pizzo, uno dei fondatori dell’Associazione di volontari. “Tanto stupore ma anche soddisfazione nel vedere nuovi volontari aggregarsi a RagusAttiva, tutti verso un unico obiettivo, ovvero liberare le strade, le campagne, le spiagge dall’immondizia, renderle pulite e...', 16, '1614121200'),
('Ctsnotizie.it', 'http://www.ctsnotizie.it/ragusattiva-ripuliamo-lambiente-prossimo-step-il-7-marzo-presso-la-diga-di-santa-rosalia/', 'RagusAttiva: “Ripuliamo l’ambiente” prossimo step il 7 marzo, presso la Diga di Santa Rosalia\r\n\r\nAltro giro, altra corsa. Domenica scorsa si è svolta un’altra spedizione di RagusAttiva, presso il piazzale di contrada Bruscè, direzione contrada Fortunello.\r\n\r\n“Siamo partiti in due la prima volta, poi in dieci e adesso siamo in cento” il commento a caldo di Piero Pizzo, uno dei fondatori dell’Associazione di volontari. “Tanto stupore ma anche soddisfazione nel vedere nuovi volontari aggregarsi a RagusAttiva, tutti verso un unico obiettivo, ovvero liberare le strade, le campagne, le spiagge dall’immondizia, renderle pulite e vivere in un ambiente meno inquinato.”', 17, '1614121200'),
('Ialmo.it', 'https://www.ialmo.it/news/ialmo-news/ragusattiva-altra-spedizione-raccolti-400-sacchi-di-rifiuti/', 'RagusAttiva, altra spedizione: raccolti 400 sacchi di rifiuti\r\n\r\nAltro giro, altra corsa. Domenica scorsa si è svolta un’altra spedizione di RagusAttiva, presso il piazzale di contrada Bruscè, direzione contrada Fortunello. \r\n\r\n“Siamo partiti in due la prima volta, poi in dieci e adesso siamo in cento” il commento a caldo di Piero Pizzo, uno dei fondatori dell’Associazione di volontari. “Tanto stupore ma anche soddisfazione nel vedere nuovi volontari aggregarsi a RagusAttiva, tutti verso un unico obiettivo, ovvero liberare le strade, le campagne, le spiagge dall’immondizia, renderle pulite e vivere in un ambiente meno inquinato. Domenica scorsa, oltre ai volontari, si sono uniti anche una delegazione di “Legambiente”, una di “Rinascita Verde” e un’altra di “Puliamo Chiaramonte”.', 18, '1614121200'),
('Videomediterraneo', 'http://www.videomediterraneo.it/news/attualita/11610-ragusa-ragusattiva-ripulisce-la-diga-di-s-rosalia-dai-rifiuti.html', 'Ragusa: &#34;Ragusattiva&#34; ripulisce la diga di S. Rosalia dai rifiuti\r\n', 19, '1615158000'),
('La Repubblica, Palermo', 'https://palermo.repubblica.it/cronaca/2021/04/01/foto/i_volontari_di_ragusattiva_ripuliscono_parchi_e_spiagge-294719077/1/', 'I volontari di RagusAttiva ripuliscono parchi e spiagge\r\nDecine di sacchi di immondizia raccolti. È il risultato dell&#39;iniziativa del movimento RagusAttiva, i cui esponenti negli scorsi giorni hanno ripulito alcune aree di campagna intorno la città. In particolare sono state recuperate cartacce e resti del picnic di chissà quale visitatore nella cosiddetta &#34;piazza city&#34; all&#39;interno del parco Giovanni Paolo II. &#34;I luoghi - fanno sapere gli esponenti del movimento - sono stati scelti sulla base di interessi personali così come pubblici: nello slargo del City molti sono i giovani che passano ore spensierate a pattinare, così come le strade di campagna puntualmente ripulite e tenute bene sono le stesse strade che molti di noi percorrono quotidianamente per tornare a casa&#34;. Il prossimo appuntamento sarà l&#39;11 aprile per ripulire la spiaggia Randello-Punta Braccetto.', 20, '1617228000'),
('RagusaOggi.it', 'https://www.ragusaoggi.it/ragusattiva-ripulita-una-zona-di-contrada-castiglione-foto/', 'RagusAttiva ripulita una zona di Contrada Castiglione\r\n\r\nA causa delle restrizioni, la spedizione nella bellissima spiaggia di Randello/ Punta Braccetto è stata ulteriormente spostata a domenica 9 maggio, sperando che, per quella data, non ci siano ulteriori problemi.\r\n\r\n\r\n“La nostra ultima spedizione è stata in contrada Castiglione, zona di campagna a ridosso della periferia ragusana, luogo di passaggio e di ville antiche”- ha affermato Piero Pizzo, co- fondatore di RagusAttiva.', 21, '1619733600'),
('La Repubblica, Palermo', 'https://palermo.repubblica.it/cronaca/2021/05/04/news/la_campagna_del_ragusano_ripulita_dai_rifiuti_dai_volontari-299403803/', 'I volontari ripuliscono la campagna del Ragusano dai rifiuti\r\n\r\nSettanta volontari che hanno raccolto 250 sacchi di immondizia. È il risultato dell&#39;iniziativa del movimento RagusAttiva e Sahara Club, i cui esponenti negli scorsi giorni hanno ripulito contrada Castiglione', 22, '1620079200'),
('La Sicilia', 'https://www.lasicilia.it/sezioni/130/ragusa', 'Tanti giovani e una missione\r\n«Ripulire, educare, respirare»\r\n\r\n“Un gruppo di giovani\r\nstanchi di vedere la propria terra\r\ndeturpata dall’immondizia, trascurata e privata della sua bellezza”. Si\r\ndefiniscono così Piero Pizzo, Laura\r\nButtacavoli, Federico Guida, Marco\r\nSpadaro, Giulio Cascone e Gianni\r\nCarfì, i fondatori di RagusAttiva.\r\nL’organizzazione no-profit è nata\r\ndalla voglia di cambiare, uscire e fare qualcosa per aiutare la comunità\r\ne l’ambiente. “L’ispirazione si trova\r\novunque, in qualsiasi angolo della\r\nstrada, nell’immensa quantità di rifiuti che stanno sommergendo la\r\nnostra provincia e soprattutto le nostre campagne. Si trova anche nei\r\ncambiamenti climatici, nella mancanza di rispetto verso la natura”.\r\nTra le principali campagne avviate, la bonifica di siti deturpati dai rifiuti. “L’associazione è figlia della\r\nrabbia e del disappunto di tutti noi,\r\nverso tutti coloro che fanno i furbi,\r\nad esempio lanciando il sacchetto\r\nsulle strade provinciali o tagliando\r\ngli alberi.\r\n', 23, '1613343600'),
('Corriere di Ragusa', 'https://corrierediragusa.it/attualita/2021/05/11/200-volontari-di-ragusattiva-ripuliscono-la-riserva-di-randello', '200 volontari di RagusAttiva ripuliscono la riserva di Randello\r\n\r\n200 volontari di RagusAttiva hanno ripulito la magnifica riserva di Randello da decine di chili di rifiuti. Si è partiti dai “Canalotti” fino ad arrivare alla Riserva di Randello. “Avevamo molto a cuore questa uscita, sia per le numerose segnalazioni sia per il valore del luogo stesso – ha affermato la cofondatrice di RagusAttiva Laura Buttacavoli – si tratta di un luogo spettacolare, una riserva in cui le tartarughe “Caretta Caretta” si trovano a deporre le loro uova mentre attorno a loro, persone incuranti e incivili abbandonano ciò che resta delle loro giornate di svago”. Hanno collaborato anche i ragazzi della Sea Shepherd, la scuola di surf “Serfatari” e il Sahara Club 4×4 di Ragusa, nonchè alcuni membri del Rotary Club di Ragusa, ragazze e ragazzi del gruppo “Basta ca si fa” di Ragusa e tanti altri. In totale sono stati raccolti circa 300 sacchi di rifiuti di ogni tipo, abbandonati lì da anni o portati dal mare. Oltre ad una quantità incommensurabile di microplastiche, sono state ritrovate moltissime reti da pesca, così come pezzi di finestre e mobilio casalingo, boe fai-da-te e altro ciarpame.', 25, '1620684000'),
('RagusaOggi.it', 'https://www.ragusaoggi.it/e-randello-fu-raccolti-oltre-300-sacchi-di-rifiuti-iniziativa-di-ragusattiva/', 'E Randello fu! Raccolti oltre 300 sacchi Iniziativa di RagusAttiva\r\n\r\nE Randello fu! Dopo due inevitabili rinvii a causa delle disposizioni vigenti per contrastare la pandemia, ieri 9 maggio 2021, si è svolta la tanto attesa spedizione presso lo spiaggione di Randello- Punta Braccetto, partendo dai “Canalotti” fino ad arrivare alla Riserva di Randello.', 29, '1620684000'),
('La Repubblica, Palermo', 'https://palermo.repubblica.it/cronaca/2021/05/11/news/ragusa_200_volantari_ripuliscono_la_spiaggia_di_punta_bracetto-300529359/?ref=fbplpa', 'Ragusa, 200 volantari ripuliscono la spiaggia di Punta Bracetto.\r\n\r\nDuecento volontari per raccogliere 300 sacchi di immondizia, lungo la spiaggia di Randello-Punta Braccetto a Ragusa. Una operazione che negli scorsi giorni hanno portato avanti i volontari dell’associazione RagusAttiva.\r\n\r\n«Avevamo molto a cuore questa uscita, sia per le numerose segnalazioni sia per il valore del luogo stesso - ha affermato la co-fondatrice di RagusAttiva Laura Buttacavoli – perché si tratta di un luogo spettacolare, dove le tartarughe caretta caretta depositano le loro uova nell’indifferenza generale delle persone incuranti e incivili che abbandonano l’immondizia tutti i weekend».\r\n\r\nHanno inoltre partecipato gli esponenti di Sea Shepherd, la scuola di surf “Serfatari”, Sahara Club 4x4 di Ragusa alcuni membri del Rotary Club di Ragusa, ragazze e ragazzi del gruppo “Basta ca si fa” di Ragusa e tanti altri.\r\n\r\nNei 300 sacchi raccolti si trovano anche numerose microplastiche, reti da pesca, pezzi di finestre e mobilio casalingo, boe fai-da-te e un collutorio spagnolo.\r\n\r\nLa prossima spedizione sarà domenica 16 Maggio presso il Parco Agricolo Urbano di Ragusa.', 30, '1620684000');

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

CREATE TABLE `evento` (
  `IDEvento` int(11) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Descrizione` text DEFAULT NULL,
  `DataCreazione` bigint(20) DEFAULT NULL,
  `luogolatitudine` varchar(255) DEFAULT NULL,
  `luogolongitudine` varchar(255) DEFAULT NULL,
  `dataevento` varchar(255) DEFAULT NULL,
  `iframe` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evento`
--

INSERT INTO `evento` (`IDEvento`, `Nome`, `Descrizione`, `DataCreazione`, `luogolatitudine`, `luogolongitudine`, `dataevento`, `iframe`) VALUES
(69, 'Casuzze', 'Casuzze, Provincia di Santa Croce Camarina', 1621094584, '36.79258135628282', '14.522654552496839', '1608332400', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12780.72981328733!2d14.516732235309348!3d36.790175629208214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1311b9021e62c02d%3A0xed5fdb8e5bf6ef31!2s97017%20Casuzze%20RG!5e0!3m2!1sit!2sit!4v1621154590458!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(70, 'C.da Ficazza', 'Contrada Ficazza riprende fiato. \r\n60 leoni e oltre 400 sacchi raccolti in sole 3 ore di lavoro!\r\nRagusAttiva ha un esercito pronto a fare la guerra agli incivili 💪🏼💪🏼💪🏼\r\nGrazie a tutti della bellissima partecipazione!', 1621094751, '36.81886210806439', '14.609523480946423', '1607727600', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3194.15112947689!2d14.606261914594471!3d36.81489827457327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1311bf708501677d%3A0xe8e958124f50e19c!2sVilla%20Rita!5e0!3m2!1sit!2sit!4v1621154676418!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(71, 'C.da Fortugnello', 'Contrada Fortugnello riprende fiato 🌬️\r\n100 Guerrier* per 500 sacchi. L\'amore per questa terra supera ogni cosa ❤️\r\nRingraziamo Legambiente Ragusa , Puliamochiaramonte  e Rinascita Verde  per non aver esitato un attimo ad unirsi a noi.\r\nLa guerra all\'inciviltà è appena cominciata 💪🏼', 1621094901, '36.89013307230591', '14.679447811408716', '1613862000', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2256.3937378005576!2d14.679201766416124!3d36.889806981918696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x131197f448f556af%3A0xd0c04f15a8fbe604!2s97100%20Fortugnello%20RG!5e0!3m2!1sit!2sit!4v1621154716943!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(72, 'C.da Castiglione', '60 Eroi e Eroine per 250 sacchi di pura spazzatura 💪🏼\r\nC.da Castiglione è stata riattivata 🌲🌲🌲\r\nGrazie a tutti quelli che oggi hanno regalato del tempo all\'ambiente e un enorme GRAZIE ai ragazzi del Sahara Club  senza i quali saremmo letteralmente perduti 🚙', 1621095165, '36.951514595452174 ', '14.651226319773869', '1618783200', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6377.012297108736!2d14.647024235492918!3d36.94996680852149!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1311a271195c49c3%3A0x2db5596464973eae!2sCastiglione%20di%20Ragusa!5e0!3m2!1sit!2sit!4v1621154759916!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(73, 'Randello', '\r\nFinalmente Randello!!!\r\n200 volontar* hanno liberato la Riserva Naturale rimuovendo circa 350 sacchi di spazzatura.\r\nGrazie a tutt* quell* che oggi hanno dedicato all\'ambiente qualche ora del proprio tempo 💚💪🏼', 1621095274, '36.83405390697544', '14.460652767387293', '1619906400', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3193.3869390391083!2d14.460856614595073!3d36.83320807354198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1311ba1d39bca321%3A0xc3076c8b1befdae0!2sDemanio%20Forestale%20di%20Randello!5e0!3m2!1sit!2sit!4v1621154628970!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(78, 'Diga di Santa Rosalia', 'Oggi siamo stati 200 eroi ed eroine dell&#39;ambiente!\r\nTra chi è rimasto e chi era già andato via, abbiamo tirato su circa 300 sacchi.\r\nAnche stavolta la nostra spedizione è andata a buon fine.\r\nLa Diga Santa Rosalia ha ripreso a respirare.\r\nGrazie ancora a tutti/e coloro che hanno partecipato e grazie alle varie associazioni che hanno preso parte a questa giornata dandoci un aiuto immenso!\r\nAlla prossima spedizione 💚💪🏼\r\n📷 Gianni La Terra\r\nGruppo scout Ragusa 2\r\nPuliamo Chiaramonte\r\nSahara Club 4x4 Ragusa \r\nLegambiente Ragusa\r\nCollettivo OCRA \r\nRagusa Abbogghia\r\nRinascita Verde', 1621283159, '36.97998642801166,', '14.773515433588887', '1615244400', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25497.590841551602!2d14.757765502043002!3d36.98118631433007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13119c6b34d896db%3A0x4b5dccfd26fe0dc5!2sLago%20Santa%20Rosalia!5e0!3m2!1sit!2sit!4v1621283064329!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `nuovoevento`
--

CREATE TABLE `nuovoevento` (
  `idnuovoevento` int(11) NOT NULL,
  `nomenuovoevento` varchar(255) DEFAULT NULL,
  `datanuovoevento` varchar(255) DEFAULT NULL,
  `descrizionenuovoevento` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nuovoevento`
--

INSERT INTO `nuovoevento` (`idnuovoevento`, `nomenuovoevento`, `datanuovoevento`, `descrizionenuovoevento`) VALUES
(16, 'Spiaggione di Randello', '1620597600', 'Pronti per domenica?\r\nAppuntamento ore 9 presso il piazzale antistante il chiosco \"Calaamari\" in piazza dei Tramonti - Punta Braccetto (Rg).\r\nTutte le info nell\'evento 💪🏼💚'),
(17, 'Spazio agricolo urbano di Ragusa (Spazio 87)', '1621116000', 'Pensavamo fosse facile e invece l&#39;attività di domenica 16 Maggio prevista per il Parco Agricolo Urbano di Ragusa (Spazio 87) sarà tra le più difficili che RagusAttiva e i suoi volontari abbiano mai affrontato.\r\nServe MASSIMA CONDIVISIONE E MASSIMA PARTECIPAZIONE.\r\nCondividete, invitate chiunque, insomma ditelo in giro...ABBIAMO BISOGNO DI VOI 💪🏼💚');

-- --------------------------------------------------------

--
-- Table structure for table `progetti`
--

CREATE TABLE `progetti` (
  `IDPROGETTO` int(11) NOT NULL,
  `NomeProgetto` varchar(255) DEFAULT NULL,
  `descrizioneProgetto` text DEFAULT NULL,
  `dataCreazioneProgetto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `progetti`
--

INSERT INTO `progetti` (`IDPROGETTO`, `NomeProgetto`, `descrizioneProgetto`, `dataCreazioneProgetto`) VALUES
(3, 'Carato', 'Parte ufficialmente per noi la collaborazione con la splendida realtà del Carato, la moneta virtuosa che strizza l\'occhio al Green 💚🌲\r\nVieni in C.da Castiglione e ne saprai di più 💪🏼\r\nInfo evento 👇🏼👇🏼👇🏼\r\nhttps://m.facebook.com/events/489063562232142?tsid=0.8645305999412789&source=result', '1618950326'),
(17, 'Adotta un chilometro', 'Considerati gli ottimi risultati dell\'iniziativa pilota da noi proposta “ADOTTA UN KM”, dove un gruppo selezionato di virtuosissimi cittadini ha adottato la propria strada di residenza per operarne la pulizia, abbiamo deciso in collaborazione con l\'amministrazione comunale che da Venerdi 16 Aprile estenderemo questa iniziativa anche a tutti coloro che vorranno aderirvi.\r\nContattateci in privato per ricevere maggiori informazioni.\r\nUn abbraccio a tutti voi RAGUSANIATTIVI 💚\r\n\r\n\r\nper più informazioni:<a href=\"adottaunchilometro.php\"> Adotta un chilometro</a>', '1620157604'),
(18, 'Merchandising RagusAttiva', 'Finalmente anche RagusAttiva ha le sue magliette. Disponibili a partire dal prossimo evento dell\'11 Aprile a Randello.\r\nNe vuoi una?! 👕\r\nSi ringrazia l\'agenzia di Ragusa Duferco Energia per il supporto nel merch ❤️🙏🏼\r\n\r\nFai parte del nostro team e compra i <a href=\"merchandising.php\"> prodotti di RagusAttiva</a>', '1620160994'),
(19, 'Tesseramento!', '🎖È partita la campagna di tesseramento!🎖\r\nPotete fare il pre tesseramento tramite mail ragusa.attiva@gmail.com, in aggiunta sarete iscritti alla mailing list, per tenervi aggiornati tra info delle spedizioni e eventuali comunicazioni.\r\n\r\nPuoi inoltre aderire alla: <a href=\"possopartecipare.php\">newsletter di RagusAttiva</a>', '1621351169');

-- --------------------------------------------------------

--
-- Table structure for table `utenti`
--

CREATE TABLE `utenti` (
  `IDUtente` int(11) NOT NULL,
  `Cognome` varchar(255) DEFAULT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `DataIscrizione` bigint(20) DEFAULT NULL,
  `adottakm` tinyint(1) DEFAULT NULL,
  `kmdaadottare` varchar(255) DEFAULT NULL,
  `numeroditelefono` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articoli`
--
ALTER TABLE `articoli`
  ADD PRIMARY KEY (`idarticoli`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`IDEvento`);

--
-- Indexes for table `nuovoevento`
--
ALTER TABLE `nuovoevento`
  ADD PRIMARY KEY (`idnuovoevento`);

--
-- Indexes for table `progetti`
--
ALTER TABLE `progetti`
  ADD PRIMARY KEY (`IDPROGETTO`);

--
-- Indexes for table `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`IDUtente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articoli`
--
ALTER TABLE `articoli`
  MODIFY `idarticoli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `IDEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `nuovoevento`
--
ALTER TABLE `nuovoevento`
  MODIFY `idnuovoevento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `progetti`
--
ALTER TABLE `progetti`
  MODIFY `IDPROGETTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `utenti`
--
ALTER TABLE `utenti`
  MODIFY `IDUtente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
