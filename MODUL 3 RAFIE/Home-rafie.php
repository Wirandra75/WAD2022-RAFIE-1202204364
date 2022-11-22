<?php

include 'config/connector.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ListCar-rafie.php">MyCar</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<section>
    <div class="container mt-5">
        <form action="Add-rafie">
        <div class="row">
            <div class="col mt-5">
                <div class="header-title">
                    <h1>Selamat datang di Show Room rafie</h1>
                </div>
                <div class="content">
                    <p>ShowRoom Rafie Merupakan Tempat Penyewaan Mobil yang Bisa dijamin Keamanannya serta bisa Terawat Produknya dan tentunya Memiliki situs website yang baik serta mudah untuk di lihat</p>
                </div>
                    <a href="<?php
                    
                    $sql3 = "select count(*) from showroom_rafie_table";
                    $q3 = mysqli_query($koneksi, $sql3);
                    $row = mysqli_fetch_array($q3);
                    $total = $row[0];
    
                    if($total = 0){
                        echo 'Add-rafie.php';
                    }else{
                        echo 'ListCar-rafie.php';
                    }
                    
                    ?>"><button type="button" class="btn btn-primary" style="width: 100px;">MyCar</button></a>
                    
                <div class="row mt-3">
                    <div class="col">
                        <img src="https://i.ibb.co/ZV9YWRw/logo-ead.png" alt="logo-ead" border="0" style="width:100px; height:30px;">
                    </div>
                    <div class="col">
                        <p>RAFIE_1202204364</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <img src="images/foto hiace.png" alt="" style="width: 600px; height:300px">
            </div>
        </div>
        </form>
    </div>
</section>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>