<?php
//membaca semua data yang ada di fle dosen.json
//dalam bentuk string
$getfile = file_get_contents('dosen.json');
//menerjemahka string JSON dengan kata lain,
//mengubah string JSON menjadi variable PHP. 
$jsonfile = json_decode($getfile);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Web Service 5 : CRUD PHP Data JSON Tanpa Database</title>
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
                <a href="dosen.php" class="navbar-brand">STMIK IKMI CIREBON</a>
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

                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br>

    <div class="container">
        <div class="jumbotron">
            <h3>Latihan Web Service - Pertemuan 5</h3>
            <p>Create, Read, Update and Delete Data from JSON</p>
        </div>
    </div>
    <div class="container">
        <div class="btn-toolbar">
            <a href="tambahdosen.php" class="btn btn-primary">
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
                        <th>NIDN</th>
                        <th>Nama dosen</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Home Base</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Action</th>
                    </tr>
                    <?php $no = 0;
                    foreach ($jsonfile->dosen as $index => $obj) : $no++;
                        $Tgl = date("d/m/Y", strtotime($obj->tgl_lahir));

                        $j_kelamin = ($obj->j_kel);
                        if ($j_kelamin == 1) {
                            $j_kelamin = "Pria";
                        } else {
                            $j_kelamin = "Wanita";
                        }

                        $homebase = ($obj->home_base);
                        if ($homebase == 1) {
                            $homebase = "TEKNIK INFORMATIKA / S-1";
                        } elseif ($homebase == 2) {
                            $homebase = "REKAYASA PERANGKAT LUNAK / S-1";
                        } elseif ($homebase == 3) {
                            $homebase = "TEKNIK KOMPUTER JARINGAN / S-1";
                        } elseif ($homebase == 4) {
                            $homebase = "MANAJEMEN INFORMATIKA / D-4";
                        } else {
                            $homebase = "KOMPUTE AKUNTANSI / D-4";
                        }

                        $pendidikan = ($obj->pend_akhir);
                        if ($pendidikan == 1) {
                            $pendidikan = "SARJANA / S-1";
                        } elseif ($pendidikan == 2) {
                            $pendidikan = "FASCA SARJANA / S-2";
                        } else {
                            $pendidikan = "DOKTOR / S-3";
                        }

                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $obj->nidn; ?></td>
                            <td><?php echo $obj->nm_dosen; ?></td>
                            <td><?php echo $Tgl; ?></td>
                            <td><?php echo $j_kelamin; ?></td>
                            <td><?php echo $homebase; ?></td>
                            <td><?php echo $pendidikan; ?></td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="updatedosen.php?id=<?php echo $index; ?>">Edit</a>
                                <a class="btn btn-xs btn-danger" href="deletedosen.php?id=<?php echo $index; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

</body>

</html>