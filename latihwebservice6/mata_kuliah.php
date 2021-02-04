<?php
//membaca semua data yang ada di fle mata_kuliah.json
//dalam bentuk string
$getfile = file_get_contents('mata_kuliah.json');
//menerjemahka string JSON dengan kata lain,
//mengubah string JSON menjadi variable PHP. 
$jsonfile = json_decode($getfile);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Web Service 6 : CRUD PHP Data JSON Tanpa Database</title>
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
                <a href="mata_kuliah.php" class="navbar-brand">STMIK IKMI CIREBON</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="clr1 active">
                        <a href="../latihwebservice3/tampil.php">Home</a>
                    </li>
                    <li class="clr2">
                        <a href="../latihwebservice4/mahasiswa.php">Mahasiswa</a>
                    </li>
                    <li class="clr3">
                        <a href="../latihwebservice5/dosen.php">Dosen</a>
                    </li>
                    <li class="clr4">
                        <a href="../latihwebservice6/mata_kuliah.php">Mata Kuliah</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br>

    <div class="container">
        <div class="jumbotron">
            <h3>Latihan Web Service - Pertemuan 6</h3>
            <p>Create, Read, Update and Delete Data from JSON</p>
        </div>
    </div>
    <div class="container">
        <div class="btn-toolbar">
            <a href="tambahmata_kuliah.php" class="btn btn-primary">
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
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mata Kuliah</th>
                        <th>Jurusan </th>
                        <th>Jenis Mata Kuliah</th>
                        <th>Bobot SKS</th>
                        <th>Action</th>
                    </tr>
                    <?php $no = 0;
                    foreach ($jsonfile->mata_kuliah as $index => $obj) : $no++;


                        $jurusan = ($obj->jurusan);
                        if ($jurusan == 1) {
                            $jurusan = "TEKNIK INFORMATIKA / S-1";
                        } elseif ($jurusan == 2) {
                            $jurusan = "REKAYASA PERANGKAT LUNAK / S-1";
                        } elseif ($jurusan == 3) {
                            $jurusan = "TEKNIK KOMPUTER JARINGAN / S-1";
                        } elseif ($jurusan == 4) {
                            $jurusan = "MANAJEMEN INFORMATIKA / D-4";
                        } else {
                            $jurusan = "KOMPUTE AKUNTANSI / D-4";
                        }

                        $jenis = ($obj->jenis);
                        if ($jenis == 1) {
                            $jenis = "M K D U";
                        } elseif ($jenis == 2) {
                            $jenis = "M K D K";
                        } else {
                            $jenis = "M K K";
                        }

                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $obj->kode_mk; ?></td>
                            <td><?php echo $obj->nama_mk; ?></td>
                            <td><?php echo $jurusan; ?></td>
                            <td><?php echo $jenis; ?></td>
                            <td><?php echo $obj->sks; ?></td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="update_mata_kuliah.php?id=<?php echo $index; ?>">Edit</a>
                                <a class="btn btn-xs btn-danger" href="delete_mata_kuliah.php?id=<?php echo $index; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

</body>

</html>