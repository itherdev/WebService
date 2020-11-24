<?php

//tipe datanya pke json, bisa juga pke xml
header('Content-Type: application/json');

require_once "koneksi.php";
require_once "mhs.php"; //load class MhsWebService

$hasil = array();

$s_name = $_GET['name'];
$s_umur = $_GET['umur'];
$s_API = $_GET['API'];

$mhs = new MhsWebService();

if ($mhs->validateAPI($s_API)) {
    //Kirim params"nya
    $mhs->setName($s_name);
    $mhs->setUmur($s_umur);

    $data = $mhs->getMhs();
    //print_r($data);
    reset($data);
    $i = 0;
    //Memakai While, bisa juga foreach
    while (list(, $r) = each($data)){
        $hasil[$i]['nmmhs'] = $r->nmmhs;
        $hasil[$i]['usiamhs'] = $r->usiamhs;
        $hasil[$i]['almmhs'] = $r->almmhs;
        ++$i;
    }
    //hanya utk flag saja
    $hasil['status'] = true;
} else {
    $hasil['stutus'] = false;
}

echo json_encode($hasil);
