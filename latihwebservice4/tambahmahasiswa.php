<?php
if (!empty($_POST)) {
    //post values
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tglllhr = date("Y-m-d", strtotime($_POST['tglllhr']));
    $jkelamin = $_POST['jkelamin'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    //membaca semua data yang ada di file mahasiswa.json
    //dalam bentuk string
    $file = file_get_contents('mahasiswa.json');
    //menerjemahkan string JSON. Dengan kata lain,
    //mengubah string JSON menjadi variable PHP.
    $data = json_decode($file, true);
    //digunakan untuk membuat file target menjadi kosong saat menghapus kontentnya
    //membatalkan inisialisasi variable PHP, sehingga membuat nya kosong.
    unset($_POST["add"]);
    //mengembalikan fungsi array yang berisi semua nilai-nilai array.
    $data["mahasiswa"] = array_values($data["mahasiswa"]);
    //menambah 1 atau beberapa elemen pada array
    array_push($data["mahasiswa"], $_POST);
    //fungsi json_encode untuk mengubah format data Array menjadi JSON
    file_put_contents("mahasiswa.json", json_encode($data));
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
        <div class="row">
            <div class="col-sm-5 col-sm-offset-3">
                <h3>Tambah Data Mahasiswa</h3>
            </div>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="inputnim">Nomor Induk Mahasiswa</label>
                    <input type="text" class="form-control" required="required" id="inputnim" name="nim" placeholder="Nomor Induk Mahasiswa">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputnama">Nama Mahasiswa</label>
                    <input type="text" class="form-control" required="required" id="inputnama" name="nama" placeholder="Nama Lengkap Mahasiswa">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputtglllhr">Tanggal Lahir</label>
                    <input type="date" class="form-control" required="required" id="inputtglllhr" name="tglllhr" placeholder="yyy/mm/dd">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputjkelamin">Jenis Kelamin</label>
                    <select class="form-control" required="required" id="inputjkelamin" name="jkelamin">
                        <option>Please Select</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputjurusan">Jurusan</label>
                    <select class="form-control" required="required" id="inputjurusan" name="jurusan">
                        <option>Please Select</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        <option value="Manajemen Informatika">Manajemen Informatika</option>
                        <option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
                    </select>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputalamat">Alamat Lengkap</label>
                    <input type="text" class="form-control" required="required" id="inputalamat" name="alamat" placeholder="Ketikan Alamat Lengkap">
                    <span class="help-block"></span>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">T A M B A H</button>
                    <a href="mahasiswa.php" class="btn btn btn-default">B A C K</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>