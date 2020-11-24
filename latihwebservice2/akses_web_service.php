<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latian Web Service 2</title>
    <style>
        body {
            width: 600px;
        }
    </style>
</head>

<body>
    <h2>
        Latihan Pertemuan 2 : Menampilkan Tabel Mahasiswa Dengan JSON
    </h2>
    <hr>
    <h2>
        NIM : 41180184 | NAMA : Istiharoh
    </h2>
    <form action="" method="GET">
        Name : <input type="text" name="name" /><br>
        Umur : <input type="text" name="umur" /><br>
        <button type="submit">Search</button>
    </form>

    <?php
    if ($_GET) {
        $s_name = isset($_GET['name']) ? $_GET['name'] : '';
        $s_umur = isset($_GET['umur']) ? $_GET['umur'] : '';

        $url  = "http://" . $_SERVER['HTTP_HOST'] . "/LatihwebService/latihwebservice2/web_service.php?API=khss8363621&name={$s_name}&umur={$s_umur}";

        $fields = array(
            'name' => $s_name,
            'umur' => $s_umur
        );

        $data = http_build_query($fields);

        $context = stream_context_create(array(
            'http' =>  array(
                'method'  => 'GET',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $data,
            )
        ));

        $result = file_get_contents($url, false, $context);
        //decode json nya ke array
        $vr = json_decode($result, true);

        echo "<pre>";
        print_r($vr);
        echo "</pre>";
    }
    ?>
</body>

</html>