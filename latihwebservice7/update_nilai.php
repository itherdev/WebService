<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('nilai.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["nilai"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('nilai.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["nilai"];
    $jsonfile = $jsonfile[$id];

    $post["id_nilai"] = isset($_POST["id_nilai"]) ? $_POST["id_nilai"] : "";
    $post["nim"] = isset($_POST["nim"]) ? $_POST["nim"] : "";
    $post["nm_mahasiswa"] = isset($_POST["nm_mahasiswa"]) ? $_POST["nm_mahasiswa"] : "";
    $post["nm_mata_kuliah"] = isset($_POST["nm_mata_kuliah"]) ? $_POST["nm_mata_kuliah"] : "";
    $post["nilai_absensi"] = isset($_POST["nilai_absensi"]) ? $_POST["nilai_absensi"] : "";
    $post["nilai_tugas"] = isset($_POST["nilai_tugas"]) ? $_POST["nilai_tugas"] : "";
    $post["nilai_uts"] = isset($_POST["nilai_uts"]) ? $_POST["nilai_uts"] : "";
    $post["nilai_uas"] = isset($_POST["nilai_uas"]) ? $_POST["nilai_uas"] : "";

    if ($jsonfile) {
        unset($all["nilai"][$id]);
        $all["nilai"][$id] = $post;
        $all["nilai"] = array_values($all["nilai"]);
        file_put_contents("nilai.json", json_encode($all));
    }
    header("Location: nilai.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="JSON-PHP-CRUD-Bootstrap, initial-scale=1.0">
    <title>Latihan Web Service 7 : CRUD PHP Data JSON Tanpa Database [UPDATE]</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style type="text/css">
        .navbar-default {
            background-color: #3b5998;
            font-size: 18px;
            color: #fff;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h4>STMIK IKMI CIREBON</h4>
            </div>
            <div class="navbar-collapse collapse" id="myNavbar">
            </div>
        </div>
    </nav>
    <!-- /.navbar -->

    <div class="container">
        <div class="row">
            <div class="row">
                <h3>UBAH DATA NILAI </h3>
            </div>

            <?php if (isset($_GET["id"])) : ?>
                <form method="POST" action="updatenilai.php">
                    <div class="col-md-6">
                        <input type="hidden" value="<?php echo $id ?>" name="id" />
                        <div class="form-group">
                            <label for="id_nilai">ID Nilai</label>
                            <input type="text" class="form-control" required="required" id="id_nilai" value="<?php echo $jsonfile["id_nilai"] ?>" name="id_nilai" placeholder="ID Nilai">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputnim">NIM</label>
                            <input type="text" class="form-control" required="required" id="inputnim" value="<?php echo $jsonfile["nim"] ?>" name="nim" placeholder="NIM">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputnm_mahasiswa">Nama Mahasiswa</label>
                            <input type="text" class="form-control" required="required" id="inputnm_mahasiswa" value="<?php echo $jsonfile["nm_mahasiswa"] ?>" name="nm_mahasiswa" placeholder="Nama Mahasiswa">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputnm_mata_kuliah">Nama Mata Kuliah</label>
                            <input type="text" class="form-control" required="required" id="inputnm_mata_kuliah" value="<?php echo $jsonfile["nm_mata_kuliah"] ?>" name="nm_mata_kuliah" placeholder="Nama Mata Kuliah">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputnilai_absensi">Nilai Absensi</label>
                            <input type="text" class="form-control" required="required" id="inputnilai_absensi" value="<?php echo $jsonfile["nilai_absensi"] ?>" name="nilai_absensi" placeholder="Nilai Absensi">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputnilai_tugas">Nilai Tugas</label>
                            <input type="text" class="form-control" required="required" id="inputnilai_tugas" value="<?php echo $jsonfile["nilai_tugas"] ?>" name="nilai_tugas" placeholder="Nilai tugas">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputnilai_uts">Nilai UTS</label>
                            <input type="text" class="form-control" required="required" id="inputnilai_uts" value="<?php echo $jsonfile["nilai_uts"] ?>" name="nilai_uts" placeholder="Nilai uts">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputnilai_uas">Nilai UAS</label>
                            <input type="text" class="form-control" required="required" id="inputnilai_uas" value="<?php echo $jsonfile["nilai_uas"] ?>" name="nilai_uas" placeholder="Nilai uas">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">UBAH DATA</button>
                            <a href="nilai.php" class="btn btn btn-default">KEMBALI</a>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>