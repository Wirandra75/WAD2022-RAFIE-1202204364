<?php 
  require "config/connector.php";
  session_start();
  session_destroy();

  if(isset($_COOKIE["email"]) && isset($_COOKIE["password"])) {
    $email = $_COOKIE["email"];
    $password = $_COOKIE["password"];
    $result = mysqli_query($koneksi, "SELECT * FROM user_rafie WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    
    if($email === $row["email"] && $password === $row["password"]) {
      $_SESSION["email"] = $row["email"];
      $_SESSI0N["login"] = true;
    }
  }

  if(isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = mysqli_query($koneksi, "SELECT * FROM user_rafie WHERE email = '$email'");

    if(mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if($password === $row["password"]) {
        $_SESSION["email"] = $row["email"];
        $_SESSION["login"] = true;
        if(isset($_POST["remember"])) {
          setcookie("email", $row["email"], strtotime("+3 days"), "/");
          setcookie("password", $row["password"], strtotime("+3 days"), "/");
        }
        header("Location: index.php");
      } else {
        echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
                <span>Password tidak sesuai!</span>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
      }
    } else {
      echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
              <span>Email tidak terdaftar!</span>
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
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-md-6 min-vh-100 login-register"></div>
        <div class="col-md-6">
          <div class="form-width">
            <h2 class="fw-bold mb-4">Login</h2>
            <form action="" method="post">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= isset($_COOKIE["email"]) ? $_COOKIE["email"] : ""; ?>" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?= isset($_COOKIE["password"]) ? $_COOKIE["password"] : ""; ?>">
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                <label class="form-check-label" for="remember">
                  Remember me
                </label>
              </div>
              <button type="submit" class="btn btn-primary" name="login">Login</button>
            </form>
            <p class="mt-3">Anda belum punya akun? <a href="Register-rafie.php">Daftar</a></p>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>