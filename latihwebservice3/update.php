<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('people.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["records"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('people.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["records"];
    $jsonfile = $jsonfile[$id];

    $post["fname"] = isset($_POST["fname"]) ? $_POST["fname"] : "";
    $post["lname"] = isset($_POST["lname"]) ? $_POST["lname"] : "";
    $post["age"] = isset($_POST["age"]) ? $_POST["age"] : "";
    $post["gender"] = isset($_POST["gender"]) ? $_POST["gender"] : "";

    if ($jsonfile) {
        unset($all["records"][$id]);
        $all["records"][$id] = $post;
        $all["records"] = array_values($all["records"]);
        file_put_contents("people.json", json_encode($all));
    }
    header("Location:tampil.php");
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
    <nav class="navbar navbar-default navbar-fixed-top">
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
            <div class="row">
                <h3>UBAH PENGGUNA</h3>
            </div>

            <?php if (isset($_GET["id"])) : ?>
                <form method="POST" action="update.php">
                    <div class="col-md-6">
                        <input type="hidden" value="<?php echo $id ?>" name="id" />
                        <div class="form-group">
                            <label for="inputFName">Nama Depan</label>
                            <input type="text" class="form-control" required="required" id="inputFName" value="<?php echo $jsonfile["fname"] ?>" name="fname" placeholder="First Name">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputLName">Nama Belakang</label>
                            <input type="text" class="form-control" required="required" id="inputLName" value="<?php echo $jsonfile["lname"] ?>" name="lname" placeholder="Last Name">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputAge">Usia</label>
                            <input type="number" class="form-control" required="required" id="inputAge" name="age" value="<?php echo $jsonfile["age"] ?>" name="age" placeholder="Age">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputGender">Jenis Kelamin</label>
                            <select class="form-control" required="required" id="inputGender" name="gender">
                                <option>Please Select</option>
                                <option value="Male" <?php echo $jsonfile["gender"] == 'Male' ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo $jsonfile["gender"] == 'Famale' ? 'selected' : ''; ?>>>Female</option>
                            </select>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">UBAH DATA</button>
                            <a href="tampil.php" class="btn btn btn-default">KEMBALI</a>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>