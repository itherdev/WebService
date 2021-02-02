<?php

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('mahasiswa.json');
    $jsonfile = json_decode($all, true);
    $jsonfile = $all["mahasiswa"];
    $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["mahasiswa"][$id]);
        $all["mahasiswa"] = array_values($all["mahasiswa"]);
        file_put_contents("mahasiswa.json", json_encode($all));
    }
    header("Location: mahasiswa.php");
}
