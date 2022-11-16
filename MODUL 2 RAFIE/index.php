<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  </head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a href="#" class="nav-item nav-link active text-light">Home</a>
  <a href="booking.php" class="nav-item nav-link active text-light ">booking</a>
  <img src="logo-ead.png " height="30" width="100">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="booking.php">booking</a>
      </li>
    </ul>
  </div>
</nav>
<body>
<?php 
$avanza = "foto mobil.png";
$hiace = "foto hiace.png";
$agya = "mobil agya.jpg";
?>
    <h1 align="center">WELCOME TO EAD RENT</h1><hr>
    <h3 align="center">find your deal!</h3><br><br>
    <div class="container d-flex justify-content-between">

        <div class="card" style="width: 20rem;">
            <img src="<?= $avanza?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Avanza</h5>
                <p class="card-text">Rp.800 000/ Day</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="fw-bold text-primary text-center list-group-item">4 SEATS</li>
                <li class="fw-bold text-primary text-center list-group-item">1500 CC</li>
                <li class="fw-bold text-primary text-center list-group-item">AUTOMATIC</li>
            </ul>
            <div class="card-body text-center bg-light">
                <a href="booking.php?mobil=<?= $avanza?>" class="card-link btn btn-primary">
                    BOOK NOW
                </a>
            </div>
        </div>
        <div class="card" style="width: 20rem;">
            <div class="h-100 mt-5">
            <img src="<?= $hiace?>" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title mt-5">Hiace</h5>
                <p class="card-text">Rp.1.000.000 / Day</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="fw-bold text-primary text-center list-group-item">8 SEATS</li>
                <li class="fw-bold text-primary text-center list-group-item">5000 CC</li>
                <li class="fw-bold text-primary text-center list-group-item">AUTOMATIC</li>
            </ul>
            <div class="card-body text-center bg-light">
                <a href="booking.php?mobil=<?= $hiace?>" class="card-link btn btn-primary">
                    BOOK NOW
                </a>
                </div>
        </div>
        <div class="card" style="width: 20rem;">
            <img src="<?= $agya?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title mt-5"> Agya</h5>
                <p class="card-text">Rp.500.000 / Day</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="fw-bold text-primary text-center list-group-item">4 SEATS</li>
                <li class="fw-bold text-primary text-center list-group-item">1000 CC</li>
                <li class="fw-bold text-primary text-center list-group-item">MANUAL</li>
            </ul>
            <div class="card-body text-center bg-light">
                <a href="booking.php?mobil=<?= $agya?>" class="card-link btn btn-primary">
                    BOOK NOW
                </a>
                </div>
        </div>
        
    </div>

    
</body>
<footer class="bg-light mt-5">
        <div class="container text-center">
            Created BY RAFIE_1202204364
        </div>
    </footer>
