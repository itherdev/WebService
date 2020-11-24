<?php

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('people.json');
    $jsonfile = json_decode($all, true);
    $jsonfile = $all["records"];
    $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["records"][$id]);
        $all["records"] = array_values($all["records"]);
        file_put_contents("people.json", json_encode($all));
    }
    header("Location: tampil.php");
}
