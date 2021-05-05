<?php 
require_once("config.php");
require_once("auth.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman About</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
            <a class="navbar-brand" href="#">Assessment 2 PABW</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-link" href="about.php">About</a></div>
                <a class="nav-link" href="logout.php">Logout</a></div>
            </div>
        </div>
    </nav> 
<div class="container">
    <br>
    <div class="card">
        <div class="card-body">
            <p><?php echo  "Nama : " . $_SESSION["user"]["nama"] ?></p>
            <p><?php echo "NIM  : " . $_SESSION["user"]["nim"] ?></p>
            <p><?php echo "Kelas : " . $_SESSION["user"]["kelas"] ?></p>
            <img class="img img-responsive" src="img/foto.JPEG" height="200px"/>
        </div>
    </div><br>

<?php

    //Cek apakah ada nilai dari method GET dengan nama id_anggota
    if (isset($_GET['semester'])) {
        $semester= $_GET["semester"];
       
        $sql="delete from ipk where semester='$semester' ";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($semester));
        //Kondisi apakah berhasil atau tidak
            
        }
?>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a><br>
    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>Semester</th>
            <th>IP</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php

        $result = $db->query('SELECT * FROM ipk order by semester');

        while($data = $result->fetch()) {

            ?>
            <tbody>
            <tr>
                <td><?php echo $data["semester"]; ?></td>
                <td><?php echo $data["ip"];   ?></td>
                <td>
                    <a href="update.php?semester=<?php echo htmlspecialchars($data['semester']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?semester=<?php echo $data['semester']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table><br><br>

</div>
</body>
</html>