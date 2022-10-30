<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BOOKING
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</head>
<body>
    <?php
      function callcar() {
        if (isset($_GET["mobil"])) {
        echo "<img src='{$_GET['mobil']}' width='100%' alt='gambar_mobil'>";
        } else {
        echo "<img src='foto mobil.png' width='50%'>";   
        echo "<img src='foto hiace.png' width='50%'>";   
        echo "<img src='mobil agya.jpg' width='50%'>";   
            }
        }
      function selecar() {
        if (isset($_GET["mobil"]) and $_GET ["mobil"] == "img/bmw.png"){
          echo "<input class='form-control' type='text' value='Avanza' name='jenis' readonly>";
        }
        else if (isset($_GET["mobil"]) and $_GET ["mobil"] == "foto hiace.png"){
          echo "<input class='form-control' type='text' value='Hiace' name='jenis' readonly>";
        }
        else if (isset($_GET["mobil"]) and $_GET ["mobil"] == "foto agya.png"){
          echo "<input class='form-control' type='text' value='Agya' name='jenis' readonly>";
        }else{
          echo "
          <select class='form-select' name='jenis' id='type'>
            <option selected  >pilih mobil</option>
            <option value='Avanza' >Avanza</option>
            <option value='Hiace' >Hiace</option>
            <option value='Agya' >Agya</option>
          </select>
          ";
      
        }
      }
      
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
        <a class="nav-link" href="#">booking</a>
      </li>
    </ul>
  </div>
</nav>
    <p class="text-center fs-1 mt-5" >
        Rent Your car now!
    </p>
    <div class="container mb-5 "> 
        <div class="row align-items-center">
          <div class="col-md-6 text-center">
              <?= callcar(); ?>
          </div>
          <div class="col-md-6">
  
              <form action="checkout.php" method="post">
                  <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                    <input name="nama" id="nama" type="text"  class="form-control"  value="RAFIE_1202204364" readonly>
                  </div>
                  <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Booking</label>
                    <input name="tanggal" type="date"  class="form-control" id="tanggal" required="">
                  </div>
                  <div class="mb-3">
                    <label for="waktu" class="form-label">Start Time</label>
                    <input name="waktu" id="waktu" type="time"  class="form-control" required="" >
                  </div>
                  <div class="mb-3">
                    <label for="durasi_boking" class="form-label">Durasi (Hari)</label>
                    <input name="durasi_boking" id="durasi_boking" type="number"  class="form-control"  min="1" required="">
                  </div>
                  <div class="mb-3">
                    <label for="type" class="form-label">Tipe Mobil</label>
                    <?= selecar(); ?>
                  </div>
                  <div class="mb-3">
                    <label for="no" class="form-label">No Telp</label>
                    <input name="no" id="no" type="tel"  class="form-control"  min="1" required="">
                  </div>
                  <span>Add Service(s)</span>
                  <div class="form-check mt-1">
                    <input class="form-check-input" type="checkbox" name="asuransi" value="Health Protocol" id="asuransi">
                    <label class="form-check-label" for="asuransih">
                      Asuransi Kesehatan / Rp.20.000
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="supir" value="Driver" id="supir">
                    <label class="form-check-label" for="supir">
                      Supir / Rp.300.000
                    </label>
                  </div>
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="bensin" value="Fuel Filled" id="bensin">
                    <label class="form-check-label" for="bensin">
                      Biaya Bensin / Rp.800.000
                    </label>
                  </div>
                  <div class="d-grid">
                    <button class="btn btn-success "  type="submit">Book Sekarang</button>
                  </div>
                </form>
              </div>
      
        </div>
    </div>
      <!-- form end -->
      <!-- footer -->
    
      <footer class="bg-light mt-5">
        <div class="container text-center">
            Created BY RAFIE_1202204364
        </div>
    </footer>
</body>
</html>