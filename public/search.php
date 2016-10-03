<?php

    require(__DIR__ . "/../includes/config.php");

    // numerically indexed array of places
    $places = [];

    // TODO: search database for places matching $_GET["geo"], store in $places
    $zip_query = CS50::query("SELECT * FROM places WHERE postal_code LIKE ?", $_GET["geo"] . "%");
    
    $place_query = CS50::query("SELECT * FROM places WHERE place_name LIKE ?", $_GET["geo"] . "%");

    $state_query = CS50::query("SELECT * FROM places WHERE admin_name1 LIKE ?", $_GET["geo"] . "%");
    
    $places = array_merge($zip_query, $place_query, $state_query);
    
    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));

?>