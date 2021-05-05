
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
    <?php

    require_once("config.php");
    require_once("auth.php");

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama semester
    if (isset($_GET['semester'])) {
        $semester=input($_GET["semester"]);

        $result = $db->query("SELECT * FROM ipk where semester=$semester");
        $data = $result->fetch();
    }

    //Cek apakah ada kiriman form dari method post
    if(isset($_POST['update'])){

        // filter data yang diinputkan
        $semester = filter_input(INPUT_POST, 'semester', FILTER_SANITIZE_STRING);
        $ip = filter_input(INPUT_POST, 'ip', FILTER_SANITIZE_STRING);

        //Query update data pada tabel anggota
        $sql="update ipk set
			semester='$semester',
			ip='$ip'
			where semester=$semester";

            $stmt = $db->prepare($sql);
    
            // bind parameter ke query
            $params = array(
                ":semester" => $semester,
                ":ip" => $ip
            );
        
            // eksekusi query untuk menyimpan ke database
            $saved = $stmt->execute($params);
        
        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($saved) {
            header("Location:about.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Assessment 2 PABW</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="about.php">About</a>
                </div>
                <a class="nav-link" href="admin.php?log=logout">Logout</a></div>
            </div>
        </div>
    </nav> 
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <h2>Update Data</h2>

                <form action="" method="post">
                    <div class="form-group">
                        <label>Semester :</label>
                        <input type="text" name="semester" class="form-control" value="<?php echo $data['semester']; ?>" disabled />

                    </div><br>

                    <div class="form-group">
                        <label>IP :</label>
                        <input type="text" name="ip" class="form-control" value="<?php echo $data['ip']; ?>" placeholder="Masukan IP" required/>

                    </div><br>

                    <input type="hidden" name="semester" value="<?php echo $data['semester']; ?>" />

                    <button type="submit" name="update" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>