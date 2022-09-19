<?php
    $ostoslista = array("maitoa","leipää", "jauhelihaa", "riisiä");
    echo print_r($ostoslista) . "<br>";

    array_push($ostoslista, "omenoita");
    echo print_r($ostoslista) . "<br>";

    $ostoslista[0] = "rasvatonta maitoa";
    echo print_r($ostoslista) . "<br>";

    sort($ostoslista);
    echo print_r($ostoslista) . "<br>";
?>