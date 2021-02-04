<?php
if (!empty($_POST)) {
    //post values
    $id_nilai = $_POST['id_nilai'];
    $nim = $_POST['nim'];
    $nm_mahasiswa = $_POST['nm_mahasiswa'];
    $nm_mata_kuliah = $_POST['nm_mata_kuliah'];
    $nilai_absensi = $_POST['nilai_absensi'];
    $nilai_tugas = $_POST['nilai_tugas'];
    $nilai_uts = $_POST['nilai_uts'];
    $nilai_uas = $_POST['nilai_uas'];

    //membaca semua data yang ada di file nilai.json
    //dalam bentuk string
    $file = file_get_contents('nilai.json');
    //menerjemahkan string JSON. Dengan kata lain,
    //mengubah string JSON menjadi variable PHP.
    $data = json_decode($file, true);
    //digunakan untuk membuat file target menjadi kosong saat menghapus kontentnya
    //membatalkan inisialisasi variable PHP, sehingga membuat nya kosong.
    unset($_POST["add"]);
    //mengembalikan fungsi array yang berisi semua nilai-nilai array.
    $data["nilai"] = array_values($data["nilai"]);
    //menambah 1 atau beberapa elemen pada array
    array_push($data["nilai"], $_POST);
    //fungsi json_encode untuk mengubah format data Array menjadi JSON
    file_put_contents("nilai.json", json_encode($data));
    header("Location: nilai.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="JSON-PHP-CRUD-Bootstrap, initial-scale=1.0">
    <title>Latihan Web Service 7 : CRUD PHP Data JSON Tanpa Database</title>
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
                    <label for="id_nilai">ID Nilai</label>
                    <input type="text" class="form-control" required="required" id="id_nilai" name="id_nilai" placeholder="ID Nilai">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputnim">NIM</label>
                    <input type="text" class="form-control" required="required" id="inputnim" name="nim" placeholder="NIM">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputnm_mahasiswa">Nama Mahasiswa</label>
                    <input type="text" class="form-control" required="required" id="inputnm_mahasiswa" name="nm_mahasiswa" placeholder="Nama Mahasiswa">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputnm_mata_kuliah">Nama Mata Kuliah</label>
                    <input type="text" class="form-control" required="required" id="inputnm_mata_kuliah" name="nm_mata_kuliah" placeholder="Nama Mata Kuliah">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputnilai_absensi">Nilai Absensi</label>
                    <input type="text" class="form-control" required="required" id="inputnilai_absensi" name="nilai_absensi" placeholder="Nilai Absensi">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputnilai_tugas">Nilai Tugas</label>
                    <input type="text" class="form-control" required="required" id="inputnilai_tugas" name="nilai_tugas" placeholder="Nilai Tugas">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputnilai_uts">Nilai UTS</label>
                    <input type="text" class="form-control" required="required" id="inputnilai_uts" name="nilai_uts" placeholder="Nilai UTS">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputnilai_uas">Nilai UAS</label>
                    <input type="text" class="form-control" required="required" id="inputnilai_uas" name="nilai_uas" placeholder="Nilai UAS">
                    <span class="help-block"></span>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">T A M B A H</button>
                    <a href="nilai.php" class="btn btn btn-default">B A C K</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>