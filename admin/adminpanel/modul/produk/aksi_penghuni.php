<?php

session_start();
error_reporting(0);
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    include "404.html";
} else {
    include "../../../config/koneksi.php";

    $p = $_GET['p'];
    $act = $_GET['act'];

    if ($act == 'hapus') {

        mysqli_query($conn, "Delete from penghuni where id_penghuni='$_GET[id]'");
        header('location:../../media.php?p=penghuni');
    } else if ($act == 'tambah') {

        $lokasi_file = $_FILES['file']['tmp_name'];
        $nama_file = $_FILES['file']['name'];

        $folder = "../../../foto_asrama/$nama_file";

        $tgl_upload = date("Ymd");

        if (!empty($lokasi_file)) {
            move_uploaded_file($lokasi_file, "$folder");
            $sql = mysqli_query($conn, "Insert into penghuni (id_penghuni, nama, nim, tanggal_lahir , alamat , no_hp, nama_orangtua, alamat_orangtua, no_hp_orangtua, foto )
            VALUES ('$_POST[id_penghuni]' , '$_POST[nama]' , '$_POST[nim]' , '$_POST[tanggal_lahir]' , '$_POST[alamat]' , '$_POST[no_hp]' , '$_POST[nama_orangtua]' , '$_POST[alamat_orangtua]' , '$_POST[no_hp_orangtua]' , '$nama_file')");
            header('location:../../media.php?p=penghuni');
        } else {
            $sql = mysqli_query($conn, "Insert into penghuni (id_penghuni, nama, nim, tanggal_lahir , alamat , no_hp, nama_orangtua, alamat_orangtua, no_hp_orangtua)
            VALUES('$_POST[id_penghuni]' , '$_POST[nama]' , '$_POST[nim]' , '$_POST[tanggal_lahir]' , '$_POST[alamat]' , '$_POST[no_hp]' , '$_POST[nama_orangtua]' , '$_POST[alamat_orangtua]' , '$_POST[no_hp_orangtua]')");
            header('location:../../media.php?p=penghuni');
        }
    }
}
