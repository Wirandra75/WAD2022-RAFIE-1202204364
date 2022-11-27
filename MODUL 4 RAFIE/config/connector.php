<?php

$host='localhost:3308';
$username='root';
$password='';
$database='wad_modul4_rafie';

$koneksi = mysqli_connect($host,$username,$password,$database);

if(!$koneksi){
    die("Failed to connect to database");
}

?>