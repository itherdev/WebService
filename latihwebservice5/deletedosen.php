<?php

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('dosen.json');
    $jsonfile = json_decode($all, true);
    $jsonfile = $all["dosen"];
    $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["dosen"][$id]);
        $all["dosen"] = array_values($all["dosen"]);
        file_put_contents("dosen.json", json_encode($all));
    }
    header("Location: dosen.php");
}
