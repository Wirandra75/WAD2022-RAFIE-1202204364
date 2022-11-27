<?php 
  require "config/connector.php";
  session_start();

  $variasi_warna = [
    "info" => "Cyan",
    "success" => "Green",
  ];

  if(isset($_SESSION["login"])) {
    $email = $_SESSION["email"];
    $hasil_login = mysqli_query($koneksi, "SELECT * FROM user_rafie WHERE email = '$email'");
    $data_login = mysqli_fetch_assoc($hasil_login);
  } else {
      header("Location: Login-rafie.php");
      exit;
  }

  if(isset($_POST["update"])) {
    $no_hp = $_POST["no_hp"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    if($_POST["password"] === "" && $_POST["konfirmasi_password"] === "") {
      $password = $data_login["password"];
      $konfirmasi_password = $data_login["password"];
    } else {
      $password = mysqli_real_escape_string($koneksi, $_POST["password"]);
      $konfirmasi_password = mysqli_real_escape_string($koneksi, $_POST["konfirmasi_password"]); 
    } 
    setcookie("warna_navbar", $_POST["warna_navbar"], strtotime("+3 days"), "/");

    if($password === $konfirmasi_password) {
      $query = "UPDATE user_rafie SET
                nama = '$nama',
                no_hp = '$no_hp',
                password = '$password'
              WHERE email = '$email'";
      mysqli_query($koneksi, $query);
      echo "<meta http-equiv='refresh' content='0'>";
    } else {
      echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
              <span>Kata sandi yang anda masukkan tidak sesuai!</span>
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
                <button class="btn btn-light dropdown-toggle text-<?= isset($_COOKIE["warna_navbar"]) ? $_COOKIE["warna_navbar"] : "info"; ?>" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $data_login["nama"]; ?>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-<?= isset($_COOKIE["warna_navbar"]) ? $_COOKIE["warna_navbar"] : "info"; ?>" href="profile.php">Profile</a></li>
                    <li><a class="dropdown-item text-<?= isset($_COOKIE["warna_navbar"]) ? $_COOKIE["warna_navbar"] : "info"; ?>" href="config/logout.php">Log Out</a></li>
                </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
      <h2 class="fw-bold text-center">Profile</h2>
      <form action="" method="post">
        <div class="mb-3 row">
          <label for="email" class="col-sm-2 col-form-label harus-diisi">Email</label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext " id="email" name="email" value="<?= $data_login["email"]; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="nama" class="col-sm-2 col-form-label harus-diisi">Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data_login["nama"]; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="no_hp" class="col-sm-2 col-form-label harus-diisi">Nomor Handphone</label>
          <div class="col-sm-10">
            <input type="tel" class="form-control" id="no_hp" name="no_hp" value="<?= $data_login["no_hp"]; ?>">
          </div>
        </div>
        <hr>
        <div class="mb-3 row position-relative">
          <label for="password" class="col-sm-2 col-form-label harus-diisi">Kata Sandi</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="konfimasi_password" class="col-sm-2 col-form-label ">Konfirmasi Kata Sandi</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="konfimasi_password" name="konfirmasi_password" placeholder="Konfirmasi Kata Sandi">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="warna_navbar" class="col-sm-2 col-form-label ">Warna Navbar</label>
          <div class="col-sm-10">
            <select class="form-select" aria-label="Warna Navbar" id="warna_navbar" name="warna_navbar">
              <?php foreach($variasi_warna as $warna => $value) : ?>
                <?php $selected = $warna == $_COOKIE["warna_navbar"] ? "selected" : "" ?>
                <option value="<?= $warna; ?>" <?= $selected; ?>><?= $value; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="text-center mt-5">
          <button type="submit" class="btn btn-primary px-4 button" name="update">Update</button>
        </div>
      </form>
      <div class="d-flex align-items-center logo-ead">
        <img src="https://i.ibb.co/ZV9YWRw/logo-ead.png" alt="Logo EAD" width="100">
        <span class="ms-5 ">Muhammad Rafie Wirandra_1202204364</span>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>