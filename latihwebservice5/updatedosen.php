<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('dosen.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["dosen"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('dosen.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["dosen"];
    $jsonfile = $jsonfile[$id];

    $post["nidn"] = isset($_POST["nidn"]) ? $_POST["nidn"] : "";
    $post["nm_dosen"] = isset($_POST["nm_dosen"]) ? $_POST["nm_dosen"] : "";
    $post["tgl_lahir"] = isset($_POST["tgl_lahir"]) ? $_POST["tgl_lahir"] : "";
    $post["j_kel"] = isset($_POST["j_kel"]) ? $_POST["j_kel"] : "";
    $post["home_base"] = isset($_POST["home_base"]) ? $_POST["home_base"] : "";
    $post["pend_akhir"] = isset($_POST["pend_akhir"]) ? $_POST["pend_akhir"] : "";

    if ($jsonfile) {
        unset($all["dosen"][$id]);
        $all["dosen"][$id] = $post;
        $all["dosen"] = array_values($all["dosen"]);
        file_put_contents("dosen.json", json_encode($all));
    }
    header("Location: dosen.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="JSON-PHP-CRUD-Bootstrap, initial-scale=1.0">
    <title>Latihan Web Service 5 : CRUD PHP Data JSON Tanpa Database [UPDATE]</title>
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
                <h3>UBAH DOSEN</h3>
            </div>

            <?php if (isset($_GET["id"])) : ?>
                <form method="POST" action="updatedosen.php">
                    <div class="col-md-6">
                        <input type="hidden" value="<?php echo $id ?>" name="id" />
                        <div class="form-group">
                            <label for="inputnidn">Nomor Induk Dosen Nasional</label>
                            <input type="text" class="form-control" required="required" id="inputnidn" value="<?php echo $jsonfile["nidn"] ?>" name="nidn" placeholder="Nomor Induk Dosen Nasional">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputnama">Nama Dosen</label>
                            <input type="text" class="form-control" required="required" id="inputnama" value="<?php echo $jsonfile["nm_dosen"] ?>" name="nm_dosen" placeholder="Nama Lengkap Dosen">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputtgllahir">Tanggal Lahir</label>
                            <input class="form-control" required="required" id="inputtgllahir" value="<?php echo $jsonfile["tgl_lahir"] ?>" type="date" name="tgl_lahir">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputjkelamin">Jenis Kelamin</label>
                            <select class="form-control" required="required" id="inputjkelamin" name="j_kel">
                                <option>Please Select</option>
                                <option value="1" <?php echo $jsonfile["j_kel"] == '1' ? 'selected' : ''; ?>>Pria</option>
                                <option value="2" <?php echo $jsonfile["j_kel"] == '2' ? 'selected' : ''; ?>>Wanita</option>
                            </select>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputhomebase">Home Base</label>
                            <select class="form-control" required="required" id="inputhomebase" name="home_base">
                                <option>Please Select</option>
                                <option value="1" <?php echo $jsonfile["home_base"] == '1' ? 'selected' : ''; ?>>Teknik Informatika / S-1</option>
                                <option value="2" <?php echo $jsonfile["home_base"] == '2' ? 'selected' : ''; ?>>Rekayasa Perangkat Lunak / S-1</option>
                                <option value="3" <?php echo $jsonfile["home_base"] == '3' ? 'selected' : ''; ?>>Teknik Komputer Jaringan / S-1</option>
                                <option value="4" <?php echo $jsonfile["home_base"] == '4' ? 'selected' : ''; ?>>Manajemen Informatika / D-4</option>
                                <option value="5" <?php echo $jsonfile["home_base"] == '5' ? 'selected' : ''; ?>>Komputerisasi Akuntansi / D-4</option>
                            </select>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputpendidikanakhir">Pendidikan Terakhir</label>
                            <select class="form-control" required="required" id="inputpendidikanakhir" name="pend_akhir">
                                <option>Please Select</option>
                                <option value="1" <?php echo $jsonfile["pend_akhir"] == '1' ? 'selected' : ''; ?>>SARJANA / S-1</option>
                                <option value="2" <?php echo $jsonfile["pend_akhir"] == '2' ? 'selected' : ''; ?>>PASCA SARJANA / S-2</option>
                                <option value="3" <?php echo $jsonfile["pend_akhir"] == '3' ? 'selected' : ''; ?>>DOKTOR / S-3</option>
                            </select>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">UBAH DATA</button>
                            <a href="dosen.php" class="btn btn btn-default">KEMBALI</a>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>