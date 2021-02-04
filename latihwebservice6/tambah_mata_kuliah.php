<?php
if (!empty($_POST)) {
    //post values
    $kode_mk = $_POST['kode_mk'];
    $nama_mk = $_POST['nama_mk'];
    $jurusan = $_POST['jurusan'];
    $jenis = $_POST['jenis'];
    $sks = $_POST['sks'];

    //membaca semua data yang ada di file mata_kuliah.json
    //dalam bentuk string
    $file = file_get_contents('mata_kuliah.json');
    //menerjemahkan string JSON. Dengan kata lain,
    //mengubah string JSON menjadi variable PHP.
    $data = json_decode($file, true);
    //digunakan untuk membuat file target menjadi kosong saat menghapus kontentnya
    //membatalkan inisialisasi variable PHP, sehingga membuat nya kosong.
    unset($_POST["add"]);
    //mengembalikan fungsi array yang berisi semua nilai-nilai array.
    $data["mata_kuliah"] = array_values($data["mata_kuliah"]);
    //menambah 1 atau beberapa elemen pada array
    array_push($data["mata_kuliah"], $_POST);
    //fungsi json_encode untuk mengubah format data Array menjadi JSON
    file_put_contents("mata_kuliah.json", json_encode($data));
    header("Location: mata_kuliah.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="JSON-PHP-CRUD-Bootstrap, initial-scale=1.0">
    <title>Latihan Web Service 6 : CRUD PHP Data JSON Tanpa Database</title>
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
    <nav class="navbar navbar-default">
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
        <div class="row col-sm-5 col-sm-offset-3 ">

            <h3>Tambah Data Mata Kuliah</h3>

        </div>
        <br><br><br>
        <div class="row">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="inputkode_mk">Kode Mata Kuliah</label>
                    <input type="text" class="form-control" required="required" id="inputkode_mk" name="kode_mk" placeholder="Kode Mata Kuliah">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputnama_mk">Nama Mata Kuliah</label>
                    <input type="text" class="form-control" required="required" id="inputnama_mk" name="nama_mk" placeholder="Nama Mata Kuliah">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputjurusan">Jurusan</label>
                    <select class="form-control" required="required" id="inputjurusan" name="jurusan">
                        <option>Please Select</option>
                        <option value="1">Teknik Informatika / S-1</option>
                        <option value="2">Rekayasa Perangkat Lunak / S-1</option>
                        <option value="3">Teknik KomputerJaringan / S-1</option>
                        <option value="4">Manajemen Informatika / D-4</option>
                        <option value="5">Komputerisasi Akuntansi / D-4</option>
                    </select>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputjenis">Jenis Mata Kuliah</label>
                    <select class="form-control" required="required" id="inputjenis" name="jjenis">
                        <option>Please Select</option>
                        <option value="1">M K D U</option>
                        <option value="2">M K D K</option>
                        <option value="3">M K K</option>
                    </select>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputsks">Bobot SKS</label>
                    <input type="text" class="form-control" required="required" id="inputsks" name="sks" placeholder="Bobot SKS">
                    <span class="help-block"></span>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">T A M B A H</button>
                    <a href="mata_kuliah.php" class="btn btn btn-default">B A C K</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>