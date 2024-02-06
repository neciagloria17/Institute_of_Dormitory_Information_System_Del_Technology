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

        mysqli_query($conn, "Delete from peraturan where id='$_GET[id]'");
        header('location:../../media.php?p=peraturan');
    } else if ($act == 'tambah') {

        $lokasi_file = $_FILES['file']['tmp_name'];
        $nama_file = $_FILES['file']['name'];

        $folder = "../../../foto_asrama/$nama_file";

        $tgl_upload = date("Ymd");

        if (!empty($lokasi_file)) {
            move_uploaded_file($lokasi_file, "$folder");
            $sql = mysqli_query($conn, "Insert into peraturan (id, nama_peraturan, tingkat, bentuk_pelanggaran, poin )
            VALUES ('$_POST[id]' , '$_POST[nama_pelanggaran]' , '$_POST[tingkat]' , '$_POST[bentuk_pelanggaran]' , '$_POST[poin]')");
            header('location:../../media.php?p=peraturan');
        } else {
            $sql = mysqli_query($conn, "Insert into peraturan (id, nama_peraturan, tingkat, bentuk_pelanggaran, poin )
            VALUES ('$_POST[id]' , '$_POST[nama_pelanggaran]' , '$_POST[tingkat]' , '$_POST[bentuk_pelanggaran]' , '$_POST[poin]')");
            header('location:../../media.php?p=peraturan');
        }
    }
}
