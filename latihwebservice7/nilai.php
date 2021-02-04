<?php
//membaca semua data yang ada di fle nilai.json
//dalam bentuk string
$getfile = file_get_contents('nilai.json');
//menerjemahka string JSON dengan kata lain,
//mengubah string JSON menjadi variable PHP. 
$jsonfile = json_decode($getfile);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Web Service 7 : CRUD PHP Data JSON Tanpa Database</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/latwebservice3.css">
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
                <a href="tampil.php" class="navbar-brand">STMIK IKMI CIREBON</a>
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
                        <a href="../latihwebservice6/nilai.php">Mata Kuliah</a>
                    </li>
                    <li class="clr5">
                        <a href="../latihwebservice7/nilai.php">Nilai Mata Kuliah</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br>

    <div class="container">
        <div class="jumbotron">
            <h3>Latihan Web Service - Pertemuan 7</h3>
            <p>Create, Read, Update and Delete Data from JSON</p>
        </div>
    </div>
    <div class="container">
        <div class="btn-toolbar">
            <a href="tambah_nilai.php" class="btn btn-primary">
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
                        <th>
                            <div align="center">No.</div>
                        </th>
                        <th>
                            <div align="center">ID Nilai</div>
                        </th>
                        <th>
                            <div align="center">NIM</div>
                        </th>
                        <th>
                            <div align="center">Nama Mahasiswa</div>
                        </th>
                        <th>
                            <div align="center">Nama Mata Kuliah</div>
                        </th>
                        <th>
                            <div align="center">Nilai Absensi</div>
                        </th>
                        <th>
                            <div align="center">Nilai Tugas</div>
                        </th>
                        <th>
                            <div align="center">Nilai UTS</div>
                        </th>
                        <th>
                            <div align="center">Nilai UAS</div>
                        </th>
                        <th>
                            <div align="center">Nilai Akhir</div>
                        </th>
                        <th>
                            <div align="center">Action</div>
                        </th>
                        <?php $no = 0;
                        foreach ($jsonfile->nilai as $index => $obj) : $no++;
                            $Nilai_Akhir = ((($obj->nilai_absensi) * 0.1) + (($obj->nilai_tugas) * 0.15) + (($obj->nilai_uts) * 0.25) + (($obj->nilai_uas) * 0.5));
                        ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $obj->id_nilai; ?></td>
                        <td><?php echo $obj->nim; ?></td>
                        <td><?php echo $obj->nm_mahasiswa; ?></td>
                        <td><?php echo $obj->nm_mata_kuliah; ?></td>
                        <td><?php echo $obj->nilai_absensi; ?></td>
                        <td><?php echo $obj->nilai_tugas; ?></td>
                        <td><?php echo $obj->nilai_uts; ?></td>
                        <td><?php echo $obj->nilai_uas; ?></td>
                        <td><?php echo $Nilai_Akhir ?></td>
                        <td>
                            <a class="btn btn-xs btn-primary" href="update_nilai.php?id=<?php echo $index; ?>">Edit</a>
                            <a class="btn btn-xs btn-danger" href="delete_nilai.php?id=<?php echo $index; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

</body>

</html>