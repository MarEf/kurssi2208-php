<link rel="stylesheet" href="styles.css">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $palvelin = "localhost";
    $kayttaja = "root";  // tämä on tietokannan käyttäjä, ei tekemäsi järjestelmän
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

    $elokuva = "%{$_POST['elokuva']}%";
    $genre = "{$_POST['genre']}";

    if ($genre) {
        $kysely = "SELECT film.film_id, film.title, film.description, film.release_year, film.rating, film_category.film_id, film_category.category_id
         FROM film
         RIGHT JOIN film_category ON film.film_id = film_category.film_id
         WHERE film.title LIKE ? AND film_category.category_id = ?";
    } else {
        $kysely = "SELECT title, description, release_year, rating
         FROM film
         WHERE title LIKE ?";
    }



    try {
        # Valmistellaan haku suojautuen injektioilta
        $haku = $yhteys->prepare($kysely);
        if ($genre) {
            $haku->bind_param("si", $elokuva, $genre);
        } else {
            $haku->bind_param("s", $elokuva);
        }
        $haku->execute();

        #Noudetaand data
        $tulos = $haku->get_result();
        if ($tulos->num_rows === 0) {
            echo "Hakua vastaavaa elokuvaa ei löytynyt";
        } else {
            echo "Löytyi " . $tulos->num_rows . " elokuvaa. <br>";
            tulosta_tulokset($tulos);
        }
        $haku->close();
    } catch (\Throwable $th) {
        echo "Hups! Jokin meni pieleen: $th";
    }
} else {
    echo "Lomake puuttuu";
}

function tulosta_tulokset($taulu)
{
    echo "<table>";
    echo "<tr>
            <th>Elokuva</th>
            <th>Kuvaus</th>
            <th>Julkaisuvuosi</th>
            <th>Ikäraja</th>
          </tr>";
    while ($rivi = $taulu->fetch_assoc()) {
        #title, description, release_year, rating
        echo "<tr>
                <td>{$rivi['title']}</td>
                <td>{$rivi['description']}</td>
                <td>{$rivi['release_year']}</td>
                <td>{$rivi['rating']}</td>
              </tr>";
    }
    echo "<table>";
}
