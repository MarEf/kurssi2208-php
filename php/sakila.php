<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Sakila hakulomake</title>
</head>

<body>
    <h1>Sakila Demo</h1>
    <div class="lomake" id="hae-elokuvaa">
        <h2>Hae elokuvia</h2>
        <form action="hae.php" method="post">
            <label for="elokuva">
                <input type="text" name="elokuva" id="elokuva">
            </label>
            <label for="genre">
                <select name="genre" id="genre">
                    <option value="">Valitse genre</option>
                    <?php list_data('category') ?>
                </select>
            </label>
            <button type="submit">Hae Elokuvia</button>
        </form>
    </div>

    <div class="lomake" id="uusi-elokuva">
        <h2>Lisää uusi elokuva</h2>
        <form action="uusi.php" method="post">
            <label for="nimi"> Elokuvan nimi
                <input type="text" name="nimi" required>
            </label>
            <label for="kuvaus"> Kuvaus
                <textarea name="kuvaus" id="kuvaus" required></textarea>
            </label> Julkaisuvuosi
            <label for="julkaistu">
                <input type="number" name="vuosi" id="vuosi" minlength="4" maxlength="4" required>
            </label>
            <label for="kieli"> Kieli
                <select name="kieli" id="kieli" required>
                    <option value="">Valitse kieli</option>
                    <?php list_data('language') ?>
                </select>
            </label>
            <label for="vuokra-aika"> Vuokra-aika (viikkoina, 1-7)
                <input type="number" name="vuokra" id="vuokra" min="1" , max="7" required>
            </label>
            <label for="hinta"> Vuokran hinta (euroina)
                <input type="number" name="hinta" id="hinta" step=".01" required>
            </label>
            <label for="pituus"> Pituus (minuutteina)
                <input type="number" name="pituus" id="pituus" required>
            </label>
            <label for="korvaus">Korvaushinta
                <input type="number" name="korvaus" id="korvaus" step=".01" required>
            </label>
            <label for="ikaraja">Ikäraja
                <select name="ikaraja" id="ikaraja" required>
                    <option value="">Valitse elokuvan ikäraja</option>
                    <option value="G">G - General Audience</option>
                    <option value="PG">PG - Parental Guidance Suggested</option>
                    <option value="PG-13">PG-13 - Parents Strongly Cautioned</option>
                    <option value="R">R - Restricted</option>
                    <option value="NC-17">NC-17 - Adults Only</option>
                </select>
            </label>
            <label for="extra"> Special features
                <input type="text" name="extra" id="extra">
            </label>
            <button type="submit">Lisää elokuva</button>
        </form>
    </div>
</body>

</html>

<?php


function fetch_data($table)
{
    $palvelin = "localhost";
    $kayttaja = "root";
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

    //Haetaan dataa tietokannasta
    $kysely = "SELECT $table" . "_id, name FROM $table";
    $tulos = $yhteys->query($kysely);

    return $tulos;
}

//Listataan haettava data hakuluetteloon
function list_data($table)
{
    //Hae näytettävä data
    $array = fetch_data($table);
    while ($row = $array->fetch_assoc()) {
        #title, description, release_year, rating
        echo "<option value='{$row["$table" . "_id"]}'>{$row['name']}</option>";
    }
}
?>