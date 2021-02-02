<?php
//membaca semua data yang ada di fle people.json
//dalam bentuk string
$getfile = file_get_contents('people.json');
//menerjemahka string JSON dengan kata lain,
//mengubah string JSON menjadi variable PHP. 
$jsonfile = json_decode($getfile);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Web Service 3 : CRUD PHP Data JSON Tanpa Database</title>
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
                        <a href="tampil.php">Home</a>
                    </li>
                    <li class="clr">
                        <a href="">JSON</a>
                    </li>
                    <li class="clr">
                        <a href="">XML</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br>

    <div class="container">
        <div class="jumbotron">
            <h3>Latihan Web Service - Pertemuan 3</h3>
            <p>Create, Read, Update and Delete Data from JSON</p>
        </div>
    </div>
    <div class="container">
        <div class="btn-toolbar">
            <a href="insert.php" class="btn btn-primary">
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
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>Usia</th>
                        <th>Jesis Kelamin</th>
                        <th>Action</th>
                    </tr>
                    <?php $no = 0;
                    foreach ($jsonfile->records as $index => $obj) : $no++;
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $obj->fname; ?></td>
                            <td><?php echo $obj->lname; ?></td>
                            <td><?php echo $obj->age; ?></td>
                            <td><?php echo $obj->gender; ?></td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="update.php?id=<?php echo $index; ?>">Edit</a>
                                <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $index; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

</body>

</html>