<?php

include 'connector.php';

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = '';
}

if($op == 'delete'){
    $id = $_GET['id'];
    $sql1 = "delete from mobil where id_mobil= '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if($q1){
        $sukses = 'Berhasil menghapus data';
    }else{
        $error = 'Gagal menghapus data';
    }
}
?>