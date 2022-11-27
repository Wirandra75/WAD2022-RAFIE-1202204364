<?php
    require "connector.php";
    require "insert.php";

    function edit($data) {
        global $koneksi;
        $id_mobil = $data["id_mobil"];
        $nama_mobil = $data["nama_mobil"];
        $pemilik_mobil = $data["pemilik_mobil"];
        $merk_mobil = $data["merk_mobil"];
        $tanggal_beli = $data["tanggal_beli"];
        $deskripsi = $data["deskripsi"];
        $status_pembayaran = $data["status_pembayaran"]; 
        $foto_lama = $data["foto_mobil"];

        if($_FILES["foto_mobil"]["error"] === 4) {
        $foto_mobil = $foto_lama;
        } else {
        $foto_mobil = upload();
        }

        $query = "UPDATE showroom_rafie_table SET
                    nama_mobil = '$nama_mobil',
                    pemilik_mobil = '$pemilik_mobil',
                    merk_mobil = '$merk_mobil',
                    tanggal_beli = '$tanggal_beli',
                    deskripsi = '$deskripsi',
                    foto_mobil = '$foto_mobil',
                    status_pembayaran = '$status_pembayaran'
                WHERE id_mobil = '$id_mobil'";

        mysqli_query($koneksi, $query);
    }
?>