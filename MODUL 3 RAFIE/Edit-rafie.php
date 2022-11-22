<?php

include 'config/edit.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
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
                        <a class="nav-link" href="#">MyCar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section>
        <div class="container">
            <div class="container mt-5">
                <h5 class="text-center">
                    Detail Mobil
                </h5>
                <p class="text-center">
                    Informasi lebih lanjut dari mobil
                </p>
            </div>
            <div class="row">
                <?php
                $id_mobil = $_GET['id'];
                $q1 = "select * from showroom_rafie_mobil where id_mobil = '$id_mobil'";
                $result = mysqli_query($koneksi, $q1);

                while ($r2 = mysqli_fetch_array($result)) {
                    $idmobil = $r2['id_mobil'];
                    $namamobil = $r2['nama_mobil'];
                    $merek = $r2['merek_mobil'];
                    $namapemilik = $r2['pemilik_mobil'];
                    $tanggalbeli = $r2['tanggal_beli'];
                    $deskripsi = $r2['deskripsi'];
                    $fotomobil = $r2['foto_mobil'];
                    $status = $r2['status_pembayaran'];
                ?>
                    <div class="col">
                        <?php
                        if ($error) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error ?>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if ($sukses) {
                        ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $sukses ?>
                            </div>

                            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                                <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="toast-header">
                                        <img src="..." class="rounded me-2" alt="...">
                                        <strong class="me-auto">Alert</strong>
                                        <small>Just Now</small>
                                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                    <div class="toast-body">
                                        <?php echo $sukses ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <img src="images/<?php echo $fotomobil ?>" alt="" style="width: 400px; height:300px">
                    </div>
                    <div class="col">
                        <form class="" action="" enctype="multipart/form-data" method="POST">
                            <div class="mb-3">
                                <label for="nameinput" class="form-label">Nama Mobil</label>
                                <input type="text" class="form-control" name="namamobil" id="namamobil" value="<?php echo $namamobil ?>">
                            </div>

                            <div class="mb-3">
                                <label for="nameinput" class="form-label">Nama Pemilik</label>
                                <input type="text" class="form-control" name="namapemilik" id="namapemilik" value="<?php echo $namapemilik ?>">
                            </div>

                            <div class="mb-3">
                                <label for="nameinput" class="form-label">merek</label>
                                <input type="text" class="form-control" name="merek" id="merek" value="<?php echo $merek ?>">
                            </div>

                            <div class="mb-3 ">
                                <label for="dateinput" class="form-label">Tanggal Beli</label>
                                <input type="date" class="form-control" name="tanggalbeli" id="tanggalbeli" value="<?php echo $tanggalbeli ?>">
                            </div>

                            <div class="mb-3 ">
                                <label for="phone" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?php echo $deskripsi ?>">
                            </div>

                            <div class="mb-3 ">
                                <div class="col">
                                    <label for="phone" class="form-label">Foto</label>
                                </div>
                                <input type="file" name="fotomobil" id="fotomobil" value="<?php echo $fotomobil ?>">
                            </div>

                            <div class="mb-3 ">
                                <label class="mb-3">Status Pembayaran</label><br>
                                <input type="radio" id="lunas" value="Lunas" name="status" <?php if ($status == 'Lunas') {echo "checked";} ?>><label for="lunas">Lunas</label>
                                <input type="radio" id="belum_lunas" value="Belum lunas" name="status" <?php if ($status == 'Belum lunas') {echo "checked";} ?>><label for="belum_lunas">Belum Lunas</label>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="simpan" class="btn btn-primary" style="width: 150px;" id="liveToastBtn">Simpan Data</button>
                                <!--<input id="update" type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" style="width: 150px;">-->

                            </div>
                    </div>
                    </form>

                <?php
                }
                ?>

            </div>
        </div>
    </section>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">Alert</strong>
                <small>Just Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?php echo $sukses ?>
            </div>
        </div>
    </div>
    <script>
        const toastTrigger = document.getElementById('liveToastBtn')
        const toastLiveExample = document.getElementById('liveToast')
        if (toastTrigger) {
            toastTrigger.addEventListener('click', () => {
                const toast = new bootstrap.Toast(toastLiveExample)

                toast.show()
            })
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>