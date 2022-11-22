<?php

$host='localhost:3308';
$username='root';
$password='';
$database='modul3';

$koneksi = mysqli_connect($host,$username,$password,$database);

if(!$koneksi){
    die("Failed to connect to database");
}

?>