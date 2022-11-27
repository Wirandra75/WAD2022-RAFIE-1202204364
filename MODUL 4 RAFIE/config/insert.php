<?php 
    require "connector.php";

    function upload() {
        $namaFile = $_FILES["foto_mobil"]["name"];
        $tmpName = $_FILES["foto_mobil"]["tmp_name"];

        move_uploaded_file($tmpName, "images/" . $namaFile);
        return $namaFile;    
    }

    function insert($data) {
        global $koneksi;
        $nama_mobil = $data["nama_mobil"];
        $pemilik_mobil = $data["pemilik_mobil"];
        $merk_mobil = $data["merk_mobil"];
        $tanggal_beli = $data["tanggal_beli"];
        $deskripsi = $data["deskripsi"];
        $status_pembayaran = $data["status_pembayaran"]; 
        $foto_mobil = upload();
        $query = "INSERT INTO showroom_rafie_table VALUES ('', '$nama_mobil', '$pemilik_mobil', '$merk_mobil', '$tanggal_beli', '$deskripsi', '$foto_mobil', '$status_pembayaran')";

        mysqli_query($koneksi, $query);
    }
?>