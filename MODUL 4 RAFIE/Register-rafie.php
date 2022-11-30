<?php 
  require "config/connector.php";

  if(isset($_POST["register"])) {
    $no_hp = $_POST["no_hp"];
    $email = strtolower($_POST["email"]);
    $nama = $_POST["nama"];
    $password = mysqli_real_escape_string($koneksi, $_POST["password"]);
    $konfirmasi_password = mysqli_real_escape_string($koneksi, $_POST["konfirmasi_password"]);
    $result = mysqli_connect($koneksi, "SELECT email FROM user_rafie WHERE email = '$email'");    

    if(mysqli_num_rows(($result)) !== 1 && $password == $konfirmasi_password) {
      mysqli_query($koneksi, "INSERT INTO user_rafie VALUES ('', '$nama', '$email', '$password', '$no_hp')");
      echo "<div class='alert alert-success alert-dismissible fade show fixed-top' role='alert'>
                <span>Register berhasil, silahkan login!</span>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
    } elseif(mysqli_num_rows(($result)) === 1) {
      echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
              <span>Email sudah terdaftar!</span>
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    } elseif($password !== $konfirmasi_password) {
      echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
              <span>Password tidak sesuai!</span>
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
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-md-6 min-vh-100 login-register"></div>
        <div class="col-md-6">
          <div class="form-width">
            <h2 class="fw-bold mb-4">Register</h2>
            <form action="" method="post">
              <div class="mb-3">
                <label for="email" class="form-label harus-diisi">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="name" class="form-label harus-diisi">Nama</label>
                <input type="text" class="form-control" id="name" name="nama" required>
              </div>
              <div class="mb-3">
                <label for="no_hp" class="form-label harus-diisi">Nomor Handphone</label>
                <input type="tel" class="form-control" id="no_hp" name="no_hp" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label harus-diisi">Kata Sandi</label>
                <input type="password" class="form-control" id="password" name="password" required> 
              </div>
              <div class="mb-4">
                <label for="konfirmasi_password" class="form-label harus-diisi">Konfirmasi Kata Sandi</label>
                <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" required>
              </div>
              <button type="submit" class="btn btn-primary" name="register">Daftar</button>
            </form>
            <p class="mt-3">Anda sudah punya akun? <a href="Login-rafie.php">Login</a></p>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>