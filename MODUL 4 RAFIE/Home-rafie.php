<?php
  require 'config/connector.php';
  session_start();

  if(isset($_SESSION["login"])) {
    $email = $_SESSION["email"];
    $hasil_login = mysqli_query($koneksi, "SELECT * FROM user_rafie WHERE email = '$email'");
    $data_login = mysqli_fetch_assoc($hasil_login);
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand navbar-dark bg-<?= isset($_COOKIE["warna_navbar"]) ? $_COOKIE["warna_navbar"] : "info"; ?>">
        <div class="container py-2">
          <?php if(isset($_SESSION["login"])) { ?>
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                <a class="nav-link" href="ListCar-rafie.php">MyCar</a>
            </div>
            <div class="d-flex">
                <a href="Add-rafie.php" class="btn btn-light text-<?= isset($_COOKIE["warna_navbar"]) ? $_COOKIE["warna_navbar"] : "info"; ?>" role="button">Add Car</a>
                <div class="dropdown ms-4">
                <button class="btn btn-light dropdown-toggle text-<?= isset($_COOKIE["warna_navbar"]) ? $_COOKIE["warna_navbar"] : "info"; ?>" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $data_login["nama"]; ?>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-<?= isset($_COOKIE["warna_navbar"]) ? $_COOKIE["warna_navbar"] : "info"; ?>" href="Profile-rafie.php">Profile</a></li>
                    <li><a class="dropdown-item text-<?= isset($_COOKIE["warna_navbar"]) ? $_COOKIE["warna_navbar"] : "info"; ?>" href="config/logout.php">Log Out</a></li>
                </ul>
                </div>
            </div>
          <?php } else { ?>
            <div class="navbar-nav w-100 d-flex justify-content-between">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
              <a class="nav-link" href="Login-rafie.php">Login</a>
            </div>
          <?php } ?>
        </div>
      </nav>

      <div class="container d-flex align-content-center home">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h1 class="fw-bold">Selamat Datang di Showroom <?= isset($_SESSION["login"]) ? $data_login['nama'] : "" ?></h1>
            <p class="text-muted">ShowRoom Rafie Merupakan Tempat Penyewaan Mobil yang Bisa dijamin Keamanannya serta bisa Terawat Produknya dan tentunya Memiliki situs website yang baik serta mudah untuk di lihat</p>
            <a class="btn btn-primary" href="<?= isset($_SESSION["login"]) ? "ListCar-rafie.php" : "Login-rafie.php"; ?>" role="button">MyCar</a>
            <div class="d-flex align-items-center position-relative" style="top: 60px;">
              <img src="https://i.ibb.co/ZV9YWRw/logo-ead.png" alt="Logo EAD" width="100">
              <span class="ms-5 text-muted">Muhammad Rafie Wirandra_1202204364</span>
            </div>
          </div>
          <div class="col-md-6">
            <img class="rounded-3" src="images/foto mobil.png" alt="Foto Mobil" width="100%">
          </div>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>