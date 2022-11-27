<?php 
    require "config/connector.php";
    session_start();

    $result = mysqli_query($koneksi, "SELECT * FROM showroom_rafie_table");
    $rows = [];

    if(mysqli_num_rows($result) == 0) {
        header("Location: Add-rafie.php");
        exit;
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    $jumlah = mysqli_num_rows($result);

    if(isset($_GET["crud"]) && $_GET["crud"] == "insert") {
        $notif_color = "bg-primary";
        $message = "Data berhasil ditambah";
    } elseif(isset($_GET["crud"]) && $_GET["crud"] == "edit") {
        $notif_color = "bg-warning";
        $message = "Data berhasil diupdate";
    } else {
        $notif_color = "bg-danger";
        $message = "Data berhasil dihapus";
    }  
    
    if(isset($_SESSION["login"])) {
        $email = $_SESSION["email"];
        $hasil_login = mysqli_query($koneksi, "SELECT * FROM user_rafie WHERE email = '$email'");
        $data_login = mysqli_fetch_assoc($hasil_login);
    } else {
        header("Location: Login-rafie.php");
        exit;
    }

    function readMore($string) {
        $string = strip_tags($string);
        if (strlen($string) > 105) {
        $stringCut = substr($string, 0, 105);
        $endPoint = strrpos($stringCut, ' ');
        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
        $string .= '...';
        }
        return $string;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand navbar-dark bg-<?= isset($_COOKIE["warna_navbar"]) ? $_COOKIE["warna_navbar"] : "info"; ?>">
            <div class="container py-2">
                <div class="navbar-nav">
                    <a class="nav-link" href="index.php">Home</a>
                    <a class="nav-link active" aria-current="page" href="#">MyCar</a>
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
            </div>
        </nav>

        <div class="container">
            <div class="mt-4">
                <h2 class="fw-bold">My Show Room</h2>
                <p>List Show Room RAFIE - 1202204364</p>
            </div>
            <div class="row mt-5">
                <?php foreach($rows as $mobil) : ?>
                <div class="col-lg-5 mb-5">
                    <div class="card rounded-3 shadow h-100">
                    <img src="images/<?= $mobil["foto_mobil"]; ?>" class="card-img-top p-2 rounded-4 h-100" alt="Foto Mobil">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $mobil["nama_mobil"]; ?></h5>
                        <p class="card-text " style="text-align: justify;"><?= readMore($mobil["deskripsi"]) ?></p>
                        <div class="d-flex">
                        <a href="Detail-rafie.php?id=<?= $mobil["id_mobil"]; ?>" class="btn btn-primary rounded-5 px-4 me-3 button" role="button">Detail</a>
                        <a href="config/delete.php?id=<?= $mobil["id_mobil"]; ?>" class="btn btn-danger rounded-5 px-4 me-3" role="button">Delete</a>
                        </div>
                    </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="pb-4">
                <p>Jumlah Mobil: <?= $jumlah; ?></p>
            </div>
        </div>

        <div class="toast <?= $_GET["crud"] !== null ? "show" : ""; ?>" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
            <div class="toast-header">
                <div class="<?= $notif_color; ?> rounded me-2" style="width: 20px; height: 20px"></div>
                <strong class="me-auto">Alert</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?= $message; ?>
            </div>
        </div>

        <!-- Script -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>