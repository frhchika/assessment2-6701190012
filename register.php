<?php

require_once("config.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $nim = filter_input(INPUT_POST, 'nim', FILTER_SANITIZE_STRING);
    $kelas = filter_input(INPUT_POST, 'kelas', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = "INSERT INTO user (email, password, nama, nim, kelas) 
            VALUES (:email, :password, :nama, :nim, :kelas)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":email" => $email,
        ":password" => $password,
        ":nama" => $nama,
        ":nim" => $nim,
        ":kelas" => $kelas
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Register</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="index.php">Assessment 2 PABW</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav> 

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">

            <form action="" method="POST">

                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input class="form-control" type="text" name="nama" placeholder="Nama" />
                </div>

                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input class="form-control" type="text" name="nim" placeholder="NIM" />
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input class="form-control" type="text" name="kelas" placeholder="Kelas" />
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Alamat Email" />
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password" />
                </div><br>

                <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />
                <p></br>Sudah punya akun? <a href="index.php">Login di sini</a></p>


            </form>
                
            </div>

        </div>
    </div>

</body>
</html>