<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CHECKOUT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</head>
<body>
<?php
    $Nama = $_POST["nama"];
    $tanggal = $_POST["tanggal"];
    $waktu_awal = $_POST["waktu"];
    $durasi_booking = $_POST["durasi_boking"];
    $jenis = $_POST["jenis"];
    $phone = $_POST["no"];
    $checkout = date("Y-m-d", strtotime("+$durasi_booking days", strtotime($tanggal)));
    $layanan = [];
    $harga_layanan = [];
    $subtotal_layanan = 0;
    
    if (isset($_POST["asuransi"])) {
    array_push($layanan, $_POST["asuransi"]);
    array_push($harga_layanan, 2);
    }
    if (isset($_POST["supir"])) {
    array_push($layanan, $_POST["supir"]);
    array_push($harga_layanan, 100);
    }
    if (isset($_POST["bensin"])) {
    array_push($layanan, $_POST["bensin"]);
    array_push($harga_layanan, 250);
    }

    if ($jenis == "Avanza") {
    $harga = 800.000;
    } else if ($jenis == "Agya") {
    $harga = 500.000;
    } else {
    $harga = 1.000000;
    }

    for ($i = 0; $i < count($harga_layanan); $i++) {
    $subtotal_layanan = $subtotal_layanan +  $harga_layanan[$i];
    }

    $total_price = ($harga * $durasi_booking) + $subtotal_layanan;
?>   
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img src="logo-ead.png " height="30" width="100">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="booking.php">booking</a>
      </li>
    </ul>
  </div>
</nav>
  <header>
    <div class="container text-center mt-5">
      <h5>Thank You RAFIE_1202204364 for Reserving</h5>
      <h6 class="mt-3">Please double check your reservation details</h6>
    </div>
  </header>
    <div class="container" style="min-height: 492px;">
      <div class="table-responsive">     
        <table class="table table-striped table-light  align-middle">
          <thead>
            <tr>
              <th scope="col">Nomor Booking</th>
              <th scope="col">Nama</th>
              <th scope="col">Check In</th>
              <th scope="col">Check Out</th>
              <th scope="col" width="10%">Tipe Mobil</th>
              <th scope="col">No Telp</th>
              <th scope="col" width="15%">Service(s)</th>
              <th scope="col" width="10%">Total Harga</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <tr>
              <th scope="row"><?= rand() ?></th>
              <td><?= $Nama; ?></td>
              <td><?= $tanggal; ?> <?= $waktu_awal; ?></td>
              <td>
                <?= $checkout; ?> <?= $waktu_awal; ?>
              </td>
              <td><?= $jenis; ?></td>
              <td><?= $phone; ?></td>
              <td>
                <?php if (empty($layanan)) {
                  echo "No Service";
                } else { ?> 
                    <ul>

                      <?php foreach($layanan as $hasil_layanan) { ?>
                        <li><?= $hasil_layanan; ?></li>
                      <?php } ?>            
                    </ul>          
                <?php }?>  
              </td>
              <td><?= "$", number_format($total_price, 0, ",", "."); ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>
    <footer class="bg-light mt-5">
        <div class="container text-center">
            Created BY RAFIE_1202204364
        </div>
    </footer>
</body>
</html>