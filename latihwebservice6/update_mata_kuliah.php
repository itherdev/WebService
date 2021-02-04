<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('mata_kuliah.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["mata_kuliah"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('mata_kuliah.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["mata_kuliah"];
    $jsonfile = $jsonfile[$id];

    $post["kode_mk"] = isset($_POST["kode_mk"]) ? $_POST["kode_mk"] : "";
    $post["nama_mk"] = isset($_POST["nama_mk"]) ? $_POST["nama_mk"] : "";
    $post["jurusan"] = isset($_POST["jurusan"]) ? $_POST["jurusan"] : "";
    $post["jenis"] = isset($_POST["jenis"]) ? $_POST["jenis"] : "";
    $post["sks"] = isset($_POST["sks"]) ? $_POST["sks"] : "";

    if ($jsonfile) {
        unset($all["mata_kuliah"][$id]);
        $all["mata_kuliah"][$id] = $post;
        $all["mata_kuliah"] = array_values($all["mata_kuliah"]);
        file_put_contents("mata_kuliah.json", json_encode($all));
    }
    header("Location: mata_kuliah.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="JSON-PHP-CRUD-Bootstrap, initial-scale=1.0">
    <title>Latihan Web Service 6 : CRUD PHP Data JSON Tanpa Database [UPDATE]</title>
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
                <h3>UBAH Mata Kuliah</h3>
            </div>

            <?php if (isset($_GET["id"])) : ?>
                <form method="POST" action="updatemata_kuliah.php">
                    <div class="col-md-6">
                        <input type="hidden" value="<?php echo $id ?>" name="id" />
                        <div class="form-group">
                            <label for="inputkode_mk">Kode Mata Kuliah</label>
                            <input type="text" class="form-control" required="required" id="inputkode_mk" value="<?php echo $jsonfile["kode_mk"] ?>" name="kode_mk" placeholder="Kode Mata Kuliah">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputnama_mk">Nama Mata Kuliah</label>
                            <input type="text" class="form-control" required="required" id="inputnama_mk" value="<?php echo $jsonfile["nama_mk"] ?>" name="nama_mk" placeholder="Nama Mata Kuliah">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputjurusan">Jurusan</label>
                            <select class="form-control" required="required" id="inputjurusan" name="jurusan">
                                <option>Please Select</option>
                                <option value="1" <?php echo $jsonfile["jurusan"] == '1' ? 'selected' : ''; ?>>Teknik Informatika / S-1</option>
                                <option value="2" <?php echo $jsonfile["jurusan"] == '2' ? 'selected' : ''; ?>>Rekayasa Perangkat Lunak / S-1</option>
                                <option value="3" <?php echo $jsonfile["jurusan"] == '3' ? 'selected' : ''; ?>>Teknik Komputer Jaringan / S-1</option>
                                <option value="4" <?php echo $jsonfile["jurusan"] == '4' ? 'selected' : ''; ?>>Manajemen Informatika / D-4</option>
                                <option value="5" <?php echo $jsonfile["jurusan"] == '5' ? 'selected' : ''; ?>>Komputerisasi Akuntansi / D-4</option>
                            </select>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputjenis">Jenis Mata Kuliah</label>
                            <select class="form-control" required="required" id="inputjenis" name="jenis">
                                <option>Please Select</option>
                                <option value="1" <?php echo $jsonfile["jenis"] == '1' ? 'selected' : ''; ?>>M K D U</option>
                                <option value="2" <?php echo $jsonfile["jenis"] == '2' ? 'selected' : ''; ?>>M K D K</option>
                                <option value="2" <?php echo $jsonfile["jenis"] == '3' ? 'selected' : ''; ?>>M K K</option>
                            </select>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputsks">Bobot SKS</label>
                            <input type="text" class="form-control" required="required" id="inputsks" value="<?php echo $jsonfile["sks"] ?>" name="sks" placeholder="Bobot SKS">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">UBAH DATA</button>
                            <a href="mata_kuliah.php" class="btn btn btn-default">KEMBALI</a>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>