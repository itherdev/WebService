<?php
if (!empty($_POST)) {
    //post values
    $nidn = $_POST['nidn'];
    $nm_dosen = $_POST['nm_dosen'];
    $tgl_lahir = date("Y-m-d", strtotime($_POST['tgl_lahir']));
    $j_kel = $_POST['j_kel'];
    $home_base = $_POST['home_base'];
    $pend_akhir = $_POST['pend_akhir'];

    //membaca semua data yang ada di file dosen.json
    //dalam bentuk string
    $file = file_get_contents('dosen.json');
    //menerjemahkan string JSON. Dengan kata lain,
    //mengubah string JSON menjadi variable PHP.
    $data = json_decode($file, true);
    //digunakan untuk membuat file target menjadi kosong saat menghapus kontentnya
    //membatalkan inisialisasi variable PHP, sehingga membuat nya kosong.
    unset($_POST["add"]);
    //mengembalikan fungsi array yang berisi semua nilai-nilai array.
    $data["dosen"] = array_values($data["dosen"]);
    //menambah 1 atau beberapa elemen pada array
    array_push($data["dosen"], $_POST);
    //fungsi json_encode untuk mengubah format data Array menjadi JSON
    file_put_contents("dosen.json", json_encode($data));
    header("Location: dosen.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="JSON-PHP-CRUD-Bootstrap, initial-scale=1.0">
    <title>Latihan Web Service 5 : CRUD PHP Data JSON Tanpa Database</title>
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

            <h3>Tambah Data Dosen</h3>

        </div>
        <br><br><br>
        <div class="row">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="inputnidn">Nomor Induk Dosen</label>
                    <input type="text" class="form-control" required="required" id="inputnidn" name="nidn" placeholder="Nomor Induk Dosen">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputnama">Nama dosen</label>
                    <input type="text" class="form-control" required="required" id="inputnamadosen" name="nm_dosen" placeholder="Nama Lengkap dosen">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputtgllahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" required="required" id="inputtgllahir" name="tgl_lahir" placeholder="mm / dd / yyyy">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputjkelamin">Jenis Kelamin</label>
                    <select class="form-control" required="required" id="inputjkelamin" name="j_kel">
                        <option>Please Select</option>
                        <option value="1">Pria</option>
                        <option value="2">Wanita</option>
                    </select>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputhomebase">Home Base</label>
                    <select class="form-control" required="required" id="inputhomebase" name="home_base">
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
                    <label for="inputpendididkanakhir">Pendidikan Terakhir</label>
                    <select class="form-control" required="required" id="inputpendididkanakhir" name="pend_akhir">
                        <option>Please Select</option>
                        <option value="1">SARJANA / S-1</option>
                        <option value="2">PASCA SARJANA / S-2</option>
                        <option value="3">DOKTOR / S-3</option>
                    </select>
                    <span class="help-block"></span>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">T A M B A H</button>
                    <a href="dosen.php" class="btn btn btn-default">B A C K</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>