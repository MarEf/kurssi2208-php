<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    # Tarkista, että kaikki kenttien arvot on annettu ja, että ne ovat oikeassa muodossa.
    doSafetyCheck();

    if (isset($_POST['extra'])) {
        $extras = $_POST['extra'];
        $extra = str_replace("'", "", implode(",", $extras));
    } else {
        $extra = "";
    }

    $yhteys = connectToServer();
    # Yhdistä palvelimeen

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

    # Valmista lausekkeet ja suorita haku
    try {
        $kysely = "INSERT INTO film (title, description, release_year, language_id, rental_duration, rental_rate, length, replacement_cost, rating, special_features)
           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $lisays = $yhteys->prepare($kysely);
        $lisays->bind_param("ssiiididss", $_POST['nimi'], $_POST['kuvaus'], $_POST['vuosi'], $_POST['kieli'], $_POST['vuokra'], $_POST['hinta'], $_POST['pituus'], $_POST['korvaus'], $_POST['ikaraja'], $extra);
        $lisays->execute();
        $lisays->close();

        echo "Uusi elokuva lisätty. Voit palata edelliselle sivulle.";
    } catch (\Throwable $th) {
        echo "Hups! Jokin meni pieleen: $th";
    }
} else {
    echo "Lomake puuttuu";
}


function doSafetyCheck()
{
}
