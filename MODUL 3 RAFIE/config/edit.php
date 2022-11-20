<?php

include 'connector.php';

$namamobil = '';
$namapemilik = '';
$merek = '';
$tanggalbeli = '';
$deskripsi = '';
$fotomobil = '';
$status = '';
$sukses = '';
$error = '';
$tmp = '';
$direktori = 'images/';

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = '';
}

if($op == 'edit'){
    $id = $_GET['id'];
    $sql1 = "select * from mobil where id_mobil = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $namamobil = $r1['nama_mobil'];
    $namapemilik = $r1['pemilik_mobil'];
    $merek = $r1['merek_mobil'];
    $tanggalbeli = $r1['tanggal_beli'];
    $deskripsi = $r1['deskripsi'];
    $fotomobil = $r1['foto_mobil'];
    $status = $r1['status_pembayaran'];

}

if (isset($_POST['simpan'])) {
    $namamobil = $_POST['namamobil'];
    $namapemilik = $_POST['namapemilik'];
    $merek = $_POST['merek'];
    $tanggalbeli = $_POST['tanggalbeli'];
    $deskripsi = $_POST['deskripsi'];
    $fotomobil = $_FILES['fotomobil']['name'];
    move_uploaded_file($_FILES['fotomobil']['tmp_name'],$direktori.$fotomobil);
    $status = $_POST['status'];

    if ($namamobil && $namapemilik && $merek && $tanggalbeli && $deskripsi && $fotomobil && $status) {
        if($op = 'edit'){ //untuk edit
            $sql1 = "update mobil set nama_mobil = '$namamobil', pemilik_mobil = '$namapemilik', merek_mobil = '$merek', deskripsi = '$deskripsi', foto_mobil = '$fotomobil', status_pembayaran = '$status' where id_mobil = '$id'";
            $q1 = mysqli_query($koneksi, $sql1);
            if($q1){
                $sukses = 'Berhasil update data';
            }else{
                $error = 'Gagal update data';
            }
        }else{ //untuk create
            $sql1 = "insert into mobil (nama_mobil, pemilik_mobil, merek_mobil, tanggal_beli, deskripsi, foto_mobil, status_pembayaran) values ('$namamobil', '$namapemilik', '$merek', '$tanggalbeli', '$deskripsi', '$fotomobil', '$status')";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = 'Berhasil memasukkan data';
            } else {
                $error = 'Gagal memasukkan data';
            }
        }
        
    } else {
        $error = 'Silahkan isi semua data secara lengkap';
    }
}
