<?php 
    require "config/connector.php";
    require "config/insert.php";
    session_start();

    if(isset($_SESSION["login"])) {
        $email = $_SESSION["email"];
        $hasil_login = mysqli_query($koneksi, "SELECT * FROM user_rafie WHERE email = '$email'");
        $data_login = mysqli_fetch_assoc($hasil_login);
    } else {
        header("Location: Login-rafie.php");
        exit;
    }

    if(isset($_POST["insert"])) {
        insert($_POST);
        header("Location: ListCar-rafie.php?crud=insert");
    }
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand navbar-dark bg-<?= isset($_COOKIE["warna_navbar"]) ? $_COOKIE["warna_navbar"] : "info"; ?>">
            <div class="container py-2">
                <div class="navbar-nav">
                    <a class="nav-link" href="index.php">Home</a>
                    <a class="nav-link" href="ListCar-rafie.php">MyCar</a>
                </div>
                <div class="d-flex">
                    <a href="Add-rafie.php" class="btn btn-light text-<?= isset($_COOKIE["warna_navbar"]) ? $_COOKIE["warna_navbar"] : "info"; ?>" role="button">Add Car</a>
                    <div class="dropdown ms-4">
                    <button class="btn btn-light dropdown-toggle text-<?= isset($_COOKIE["warna_navbar"]) ? $_COOKIE["warna_navbar"] : "info"; ?>" type="button" data_login-bs-toggle="dropdown" aria-expanded="false">
                        <?= $data_login["nama"]; ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-<?= isset($_COOKIE["warna_navbar"]) ? $_COOKIE["warna_navbar"] : "info"; ?>" href="Profile-rafie.php">Profile</a></li>
                        <li><a class="dropdown-item text-<?= isset($_COOKIE["warna_navbar"]) ? $_COOKIE["warna_navbar"] : "info"; ?>" href="config/logout.php">Log Out</a></li>
                    </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container mt-4">
        <h2 class="fw-bold">Tambah Mobil</h2>
        <p class="">Tambah Mobil Baru Anda ke List Show Room</p>
        <div class="row mt-5">
            <div class="col-10">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama_mobil" class="form-label fw-bold">Nama Mobil</label>
                            <input type="text" name="nama_mobil" class="form-control" id="nama_mobil">
                        </div>
                        <div class="mb-3">
                            <label for="pemilik_mobil" class="form-label fw-bold">Nama Pemilik</label>
                            <input type="text" name="pemilik_mobil" class="form-control" id="pemilik_mobil">
                        </div>
                        <div class="mb-3">
                            <label for="merk_mobil" class="form-label fw-bold">Merk</label>
                            <input type="text" name="merk_mobil" class="form-control" id="merk_mobil">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_beli" class="form-label fw-bold">Tanggal Beli</label>
                            <input type="date" name="tanggal_beli" class="form-control" id="tanggal_beli">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="foto_mobil" class="form-label fw-bold">Foto</label>
                            <input class="form-control " name="foto_mobil" type="file" id="foto_mobil">
                        </div>
                        <div class="mb-3">
                            <span class="d-block mb-2 fw-bold">Status Pembayaran</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_pembayaran" id="lunas" value="Lunas">
                                <label class="form-check-label" for="lunas">Lunas</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_pembayaran" id="belumLunas" value="Belum Lunas">
                                <label class="form-check-label" for="belumLunas">Belum Lunas</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-5" name="insert">Selesai</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>