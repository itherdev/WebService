<?php
//membaca semua data yang ada di fle mahasiswa.json
//dalam bentuk string
$getfile = file_get_contents('mahasiswa.json');
//menerjemahka string JSON dengan kata lain,
//mengubah string JSON menjadi variable PHP. 
$jsonfile = json_decode($getfile);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Web Service 4 : CRUD PHP Data JSON Tanpa Database</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/latwebservice4.css">
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="mahasiswa.php" class="navbar-brand">STMIK IKMI CIREBON</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="clr1 active">
                        <a href="tampil.php">Home</a>
                    </li>
                    <li class="clr2">
                        <a href="mahasiswa.php">Mahasiswa</a>
                    </li>
                    <li class="clr3">
                        <a href="">XML</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br>

    <div class="container">
        <div class="jumbotron">
            <h3>Latihan Web Service - Pertemuan 4</h3>
            <p>Create, Read, Update and Delete Data from JSON</p>
        </div>
    </div>
    <div class="container">
        <div class="btn-toolbar">
            <a href="tambahmahasiswa.php" class="btn btn-primary">
                <i class="icon-plus"></i>Tambah Data
            </a>
            <div class="btn-group"></div>
        </div>
    </div>
    <br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>No.</th>
                        <th>Nim</th>
                        <th>Nama Mahasiswa</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Jurusan</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                    <?php $no = 0;
                    foreach ($jsonfile->mahasiswa as $index => $obj) : $no++;
                        $Tgl = date("d/m/Y", strtotime($obj->tglllhr));
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $obj->nim; ?></td>
                            <td><?php echo $obj->nama; ?></td>
                            <td><?php echo $Tgl; ?></td>
                            <td><?php echo $obj->jkelamin; ?></td>
                            <td><?php echo $obj->jurusan; ?></td>
                            <td><?php echo $obj->alamat; ?></td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="updatemahasiswa.php?id=<?php echo $index; ?>">Edit</a>
                                <a class="btn btn-xs btn-danger" href="deletemahasiswa.php?id=<?php echo $index; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

</body>

</html>