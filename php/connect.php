<?php

function connectToServer()
{
    $palvelin = "localhost";
    $kayttaja = "root"; // tämä on tietokannan käyttäjä, ei tekemäsi järjestelmän
    $salasana = "";
    $tietokanta = "sakila";

    // luo yhteys
    $yhteys = new mysqli($palvelin, $kayttaja, $salasana, $tietokanta);

    // jos yhteyden muodostaminen ei onnistunut, keskeytä
    if ($yhteys->connect_error) {
        die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
    }
    // aseta merkistökoodaus (muuten ääkköset sekoavat)
    $yhteys->set_charset("utf8");

    return $yhteys;
}
