<?php
    function tulostaTyylit() {
        echo "<style>
        .valkoinen {background-color: white; width: 30px; height: 30px;}
        .musta {background-color: black; width: 30px; height: 30px;}
    </style>
    ";
    }

    function tervehdi($nimi) {
        echo "Hei, $nimi!";
    }

    function kerto($luku1, $luku2) {
        return $luku1*$luku2;
    }

    function potenssi($kantaluku, $eksponentti) {
        $x = $kantaluku;
        for ($i=1; $i < $eksponentti; $i++) { 
            $x = $x*$kantaluku;
        }
        return $x;
    }

    function shakkilauta() {
        echo "<table style>";
            for($rivi = 0; $rivi < 8; $rivi++) {
                echo "<tr></tr>" ;
                for($sarake = 0; $sarake < 8; $sarake++) {
                    if($rivi%2 == 0 && $sarake%2 == 0 || $rivi%2 != 0 && $sarake%2 != 0) {
                        echo "<td class='valkoinen'></td>";
                    } else {
                        echo "<td class='musta'></td>";
                    }
                }
            }
            echo "</table>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Funktiot</title>
    <?php
        #Tehtävä 1
        tulostaTyylit();
    ?>

</head>
<body>
    <div>
        <?php
            #Tehtävä 2
            tervehdi("Maria");
        ?>
    </div>
    <div>
        <?php
            #Tehtävä 3
            echo kerto(12, 3);
        ?>
    </div>
    <div>
        <?php
            #Tehtävä 4
            echo potenssi(5, 4);
        ?>
    </div>

    <div>
        <?php
            shakkilauta();
        ?>
    </div>
</body>
</html>