<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    /* Lomakkeen sisältö:
    nimi = title (s)
    kuvaus = description (s)
    vuosi = release_year (i)
    kieli = language_id (i)
    vuokra = rental_duration (i)
    hinta = rental_rate (d)
    pituus = length (i)
    korvaus = replacement_cost (d)
    ikaraja = rating (s)
    extra = special_features (s)
*/

    try {
        $kysely = "INSERT INTO film (title, description, release_year, language_id, rental_duration, rental_rate, length, replacement_cost, rating, special_features)
           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $lisays = $yhteys->prepare($kysely);
        $lisays->bind_param("ssiiididss", $_POST['nimi'], $_POST['kuvaus'], $_POST['vuosi'], $_POST['kieli'], $_POST['vuokra'], $_POST['hinta'], $_POST['pituus'], $_POST['korvaus'], $_POST['ikaraja'], $_POST['extra']);
        $lisays->execute();
        $lisays->close();

        echo "Uusi elokuva lisätty. Voit palata edelliselle sivulle.";
    } catch (\Throwable $th) {
        echo "Hups! Jokin meni pieleen: $th";
    }
} else {
    echo "Lomake puuttuu";
}
