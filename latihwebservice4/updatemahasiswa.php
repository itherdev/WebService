<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('mahasiswa.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["mahasiswa"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('mahasiswa.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["mahasiswa"];
    $jsonfile = $jsonfile[$id];

    $post["nim"] = isset($_POST["nim"]) ? $_POST["nim"] : "";
    $post["nama"] = isset($_POST["nama"]) ? $_POST["nama"] : "";
    $post["tglllhr"] = isset($_POST["tglllhr"]) ? $_POST["tglllhr"] : "";
    $post["jkelamin"] = isset($_POST["jkelamin"]) ? $_POST["jkelamin"] : "";
    $post["jurusan"] = isset($_POST["jurusan"]) ? $_POST["jurusan"] : "";
    $post["alamat"] = isset($_POST["alamat"]) ? $_POST["alamat"] : "";

    if ($jsonfile) {
        unset($all["mahasiswa"][$id]);
        $all["mahasiswa"][$id] = $post;
        $all["mahasiswa"] = array_values($all["mahasiswa"]);
        file_put_contents("mahasiswa.json", json_encode($all));
    }
    header("Location: mahasiswa.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="JSON-PHP-CRUD-Bootstrap, initial-scale=1.0">
    <title>Latihan Web Service 4 : CRUD PHP Data JSON Tanpa Database</title>
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
                <h3>UBAH PENGGUNA</h3>
            </div>

            <?php if (isset($_GET["id"])) : ?>
                <form method="POST" action="updatemahasiswa.php">
                    <div class="col-md-6">
                        <input type="hidden" value="<?php echo $id ?>" name="id" />
                        <div class="form-group">
                            <label for="inputnim">Nomor Induk Mahasiswa</label>
                            <input type="text" class="form-control" required="required" id="inputnim" value="<?php echo $jsonfile["nim"] ?>" name="nim" placeholder="Nomor Induk Mahasiswa">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputnama">Nama Mahasiswa</label>
                            <input type="text" class="form-control" required="required" id="inputnama" value="<?php echo $jsonfile["nama"] ?>" name="nama" placeholder="Nama Lengkap Mahasiswa">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputtglllhr">Tanggal Lahir</label>
                            <input class="form-control" required="required" id="inputtglllhr" value="<?php echo $jsonfile["tglllhr"] ?>" type="date" name="tglllhr">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputjkelamin">Jenis Kelamin</label>
                            <select class="form-control" required="required" id="inputjkelamin" value="<?php echo $jsonfile["jkelamin"] ?>" name="jkelamin">
                                <option>Please Select</option>
                                <option value="Pria" <?php echo $jsonfile["jkelamin"] == 'Pria' ? 'selected' : ''; ?>>Pria</option>
                                <option value="Wanita" <?php echo $jsonfile["jkelamin"] == 'Wanita' ? 'selected' : ''; ?>>Wanita</option>
                            </select>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputjurusan">Jurusan</label>
                            <select class="form-control" required="required" id="inputjurusan" value="<?php echo $jsonfile["jurusan"] ?>" name="jurusan">
                                <option>Please Select</option>
                                <option value="Teknik Informatika" <?php echo $jsonfile["jurusan"] == 'Teknik Informatika' ? 'selected' : ''; ?>>Teknik Informatika</option>
                                <option value="Sistem Informasi" <?php echo $jsonfile["jurusan"] == 'Sistem Informasi' ? 'selected' : ''; ?>>Sistem Informasi</option>
                                <option value="Rekayasa Perangkat Lunak" <?php echo $jsonfile["jurusan"] == 'Rekayasa Perangkat Lunak' ? 'selected' : ''; ?>>Rekayasa Perangkat Lunak</option>
                                <option value="Manajemen Informatika" <?php echo $jsonfile["jurusan"] == 'Manajemen Informatika' ? 'selected' : ''; ?>>Manajemen Informatika</option>
                                <option value="Komputerisasi Akuntansi" <?php echo $jsonfile["jurusan"] == 'Komputerisasi Akuntansi' ? 'selected' : ''; ?>>Komputerisasi Akuntansi</option>
                            </select>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputalamat">Alamat Lengkap</label>
                            <input type="text" class="form-control" required="required" id="inputalamat" value="<?php echo $jsonfile["nim"] ?>" name="alamat" placeholder="Ketikan Alamat Lengkap">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">UBAH DATA</button>
                            <a href="mahasiswa.php" class="btn btn btn-default">KEMBALI</a>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>