<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Hello PHP</title>
</head>
<body>
    <?php
        # Muuttujat ja kontrollirakenteet
        # Tehtävä 1
        echo "<h1>Hello World</h1>";

        #Tehtävä 2
        $php = "PHP";
        $java = "Java";
        $perl = "Perl";
        $jscript = "Javascript";

        echo "<h2>Ohjelmointikielet</h2>
                <ul>
                    <li>$php</li>
                    <li>$java</li>
                    <li>$perl</li>
                    <li>$jscript</li>
                </ul>";

        #Tehtävä 3
        $luku1 = 123456789;
        $luku2 = 12345;

        echo "<h2>Luku1: $luku1 ja Luku2: $luku2</h2>";
        echo "Summa: " . $luku1+$luku2 . "<br>";
        echo "Erotus: " . $luku1-$luku2  . "<br>";
        echo "Tulo: " . $luku1*$luku2  . "<br>";
        echo "Osamäärä: " . $luku1-$luku2  . "<br>";
        echo "Jakojäännös: " . $luku1%$luku2  . "<br>";

        #Tehtävä 4
        echo "<p>";

        $luku = 8;
        echo "Arvo on nyt $luku <br>";
        $luku = $luku+2;
        echo "Lisää 2. Arvo on nyt $luku <br>";
        $luku = $luku-4;
        echo "Vähennä 4. Arvo on nyt $luku <br>";
        $luku = $luku*5;
        echo "Kerro 5:llä. Arvo on nyt $luku <br>";
        $luku = $luku/3;
        echo "Jaa 3:lla. Arvo on nyt $luku <br>";
        $luku += 1;
        echo "Inkrementoi (lisää) arvoa yhdellä. Arvo on nyt  $luku <br>";
        $luku -= 1;
        echo "Dekrementoi (vähennä) arvoa yhdellä. Arvo on nyt $luku <br>";

        echo "</p>";

        #Tehtävä 5
        $luku = rand(1, 10);
        echo "Satunnaisluku: $luku <br>";
        if ($luku<=5) {
            echo "Pieni!";
        } else {
            echo "Suuri!";
        }

        #Tehtävä 6
        echo "<p> Arvosana: ";
        $arvosana = rand(1, 3);
        if($arvosana == 3) {
            echo "Kiitettävä";
        } elseif($arvosana == 2) {
            echo "Hyvä";
        } else {
            echo "Tyydyttävä";
        }

        echo "</p>";

        #Tehtävä 7
        echo "<p>";
        
        $x = 0;
        while($x<5) {
            echo "Maria<br>";
            $x++;
        }

        echo "</p>";

        #Tehtävä 8
        echo "<p>";
        
        for ($i=0; $i <= 10; $i++) { 
            echo "$i*10 = " . $i*10 . "<br>";
        }

        echo "</p>";

        #Tehtävä 9
        echo "<p>";

        for ($i=0; $i < 10; $i++) { 
            echo "$i-";
        }
        echo "10";

        echo "</p>";

        #Tehtävä 10
        echo "<p>";

        $x = rand(1,10); //Tästä luvusta lasketaan kertoma.
        echo "Luvun $x kertoma on: <br>";
        //Tämä silmukka laskee kertoman
        for ($i=$x-1; $i > 0; $i--) { 
            $x = $x*$i;
        }
        echo $x;

        echo "</p>";

        #Tehtävä 11
        echo "<p>";

        echo "<table style>";
        for ($i=1; $i < 11; $i++) {
            echo "<tr>" ;
            for ($j=1; $j < 11; $j++) { 
                echo "<td>" . $j*$i . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        echo "</p>";
    ?>
</body>
</html>