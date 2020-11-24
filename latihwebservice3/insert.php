<?php
if (!empty($_POST)) {
    //post values
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    //membaca semua data yang ada di file people.json
    //dalam bentuk string
    $file = file_get_contents('people.json');
    //menerjemahkan string JSON. Dengan kata lain,
    //mengubah string JSON menjadi variable PHP.
    $data = json_decode($file, true);
    //digunakan untuk membuat file target menjadi kosong saat menghapus kontentnya
    //membatalkan inisialisasi variable PHP, sehingga membuat nya kosong.
    unset($_POST["add"]);
    //mengembalikan fungsi array yang berisi semua nilai-nilai array.
    $data["records"] = array_values($data["records"]);
    //menambah 1 atau beberapa elemen pada array
    array_push($data["records"], $_POST);
    //fungsi json_encode untuk mengubah format data Array menjadi JSON
    file_put_contents("people.json", json_encode($data));
    header("Location: tampil.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="JSON-PHP-CRUD-Bootstrap, initial-scale=1.0">
    <title>Latihan Web Service 3 : CRUD PHP Data JSON Tanpa Database</title>
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
                <h3>Tambah Pengguna Baru</h3>
            </div>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="inputFName">Nama Depan</label>
                    <input type="text" class="form-control" required="required" id="inputFName" name="fname" placeholder="First Name">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputLName">Nama Belakang</label>
                    <input type="text" class="form-control" required="required" id="inputLName" name="lname" placeholder="Last Name">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputAge">Usia</label>
                    <input type="number" class="form-control" required="required" id="inputAge" name="age" placeholder="Age">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="inputGender">Jenis Kelamin</label>
                    <select class="form-control" required="required" id="inputGender" name="gender">
                        <option>Please Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <span class="help-block"></span>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">T A M B A H</button>
                    <a href="tampil.php" class="btn btn btn-default">B A C K</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>