<?php

$palvelin = "localhost";
$kayttaja = "root";
$salasana = "";
$tietokanta = "autokanta";

//luo yhteys
$yhteys = new mysqli($palvelin, $kayttaja, $salasana, $tietokanta);

// jos yhteyden muodostaminen ei onnistunut, keskeytä
if ($yhteys->connect_error) {
   die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
}
// aseta merkistökoodaus (muuten ääkköset sekoavat)
$yhteys->set_charset("utf8");

#Tehtävä 1: Annelle sakko
$sakko = "INSERT INTO sakko(
   auto, henkilo, pvm, summa, syy) 
   VALUES('CES-528', '281182-070W','2012-1-2' ,'50', 'Virheellinen pysäköinti')";
$tulos = $yhteys->query($sakko);

if ($tulos === TRUE) {
   echo "Sakko lisätty.";
} else {
   echo "Virhe: " . $lisayssql . "<br>" . $conn->error;
}

#Tehtävä 2: Poista Tapio. Tämän ei pidä onnistua
$poista = "DELETE FROM henkilo WHERE hetu='120760-093B'";


/*
#TÄMÄ RIVI KAATAA OHJELMAN! ÄLÄ POISTA KOMMENTOINTIA!
$tulos = $yhteys->query($poista);

if ($tulos === TRUE) {
   echo "Tapio lisätty.";
} else {
   echo "Virhe: " . $lisayssql . "<br>" . $conn->error;
}*/

//Syy: Tapiolla on auto, joten häntä ei voi poistaa.


#Tehtävä 3: Vaihda Matin osoite
$muuta = "UPDATE henkilo SET osoite='Mäkelänkatu 15' WHERE hetu='080173-169T'";
$tulos = $yhteys->query($muuta);

if ($tulos === TRUE) {
   echo "Matti on muuttanut.";
} else {
   echo "Virhe: " . $lisayssql . "<br>" . $conn->error;
}


#Tehtävä 4: Siirrä auto Teemulle
$myy = "UPDATE auto SET omistaja='200292-195H' WHERE reksiterinro='HUT-444'";
$tulos = $yhteys->query($myy);

if ($tulos === TRUE) {
   echo "Auto on myyty.";
} else {
   echo "Virhe: " . $lisayssql . "<br>" . $conn->error;
}

$tulos = $yhteys->query($poista);

if ($tulos === TRUE) {
   echo "Tapio poistettu.";
} else {
   echo "Virhe: " . $lisayssql . "<br>" . $conn->error;
}
#Tehtävä 5: Lisää uusi auto ja anna se Matille
$uusiAuto = "INSERT INTO auto(reksiterinro, vari, vuosimalli, omistaja) VALUES('DAU-781', 'musta', '2007', '080173-169T')";
$tulos = $yhteys->query($uusiAuto);

if ($tulos === TRUE) {
   echo "Uusi auto lisätty ja annettu Matille.";
} else {
   echo "Virhe: " . $lisayssql . "<br>" . $conn->error;
}
#Tehtävä 6: Matille sakko
$sakko = "INSERT INTO sakko(
   auto, henkilo, pvm, summa, syy) VALUES(
      'DAU-781', '080173-169T','2012-1-2' ,'50', 'Ajaa Ladalla')";
$tulos = $yhteys->query($sakko);


if ($tulos === TRUE) {
   echo "Sakko annettu.";
} else {
   echo "Virhe: " . $lisayssql . "<br>" . $conn->error;
}
