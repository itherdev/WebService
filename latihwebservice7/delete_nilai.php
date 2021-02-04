<?php

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('nilai.json');
    $jsonfile = json_decode($all, true);
    $jsonfile = $all["nilai"];
    $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["nilai"][$id]);
        $all["nilai"] = array_values($all["nilai"]);
        file_put_contents("nilai.json", json_encode($all));
    }
    header("Location: nilai.php");
}
