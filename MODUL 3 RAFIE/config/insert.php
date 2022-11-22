<?php

include 'connector.php';

$namamobil = '';
$namapemilik = '';
$merk = '';
$tanggalbeli = '';
$deskripsi = '';
$fotomobil = '';
$status = '';
$sukses = '';
$error = '';
$tmp = '';
$direktori = 'images/';

if (isset($_POST['simpan'])) {
    $namamobil = $_POST['namamobil'];
    $namapemilik = $_POST['namapemilik'];
    $merk = $_POST['merk'];
    $tanggalbeli = $_POST['tanggalbeli'];
    $deskripsi = $_POST['deskripsi'];
    $fotomobil = $_FILES['fotomobil']['name'];
    move_uploaded_file($_FILES['fotomobil']['tmp_name'],$direktori.$fotomobil);
    $status = $_POST['status'];

    if ($namamobil && $namapemilik && $merk && $tanggalbeli && $deskripsi && $fotomobil && $status) {
        $sql1 = "insert into showroom_rafie_table (nama_mobil, pemilik_mobil, merk_mobil, tanggal_beli, deskripsi, foto_mobil, status_pembayaran) values ('$namamobil', '$namapemilik', '$merk', '$tanggalbeli', '$deskripsi', '$fotomobil', '$status')";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = 'Berhasil memasukkan data';
        } else {
            $error = 'Gagal memasukkan data';
        }
    } else {
        $error = 'Silahkan isi semua data secara lengkap';
    }
}

?>