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

        mysqli_query($conn, "Delete from pengumuman where id_pengumuman='$_GET[id]'");
        header('location:../../media.php?p=pengumuman');
    } else if ($act == 'tambah') {

        $lokasi_file = $_FILES['file']['tmp_name'];
        $nama_file = $_FILES['file']['name'];

        $folder = "../../../foto_asrama/$nama_file";

        $tgl_upload = date("Ymd");

        if (!empty($lokasi_file)) {
            move_uploaded_file($lokasi_file, "$folder");
            $sql = mysqli_query($conn, "Insert into pengumuman (id_pengumuman,judul,deskripsi,tanggal_upload )
            VALUES ('$_POST[id_pengumuman]' , '$_POST[judul]' , '$_POST[deskripsi]' , '$_POST[tanggal_upload]')");
            header('location:../../media.php?p=pengumuman');
        } else {
            $sql = mysqli_query($conn, "Insert into pengumuman (id_pengumuman,judul,deskripsi,tanggal_upload )
            VALUES ('$_POST[id_pengumuman]' , '$_POST[judul]' , '$_POST[deskripsi]' , '$_POST[tanggal_upload]')");
            header('location:../../media.php?p=pengumuman');
        }
    }
}
