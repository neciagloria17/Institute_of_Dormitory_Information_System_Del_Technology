<?php
include "../config/koneksi.php";


$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($conn, "Select * from user where username ='$username' AND password ='$password'");
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

//Apabila username dan password diketemukan
if ($ketemu > 0) {
    session_start();

    $_SESSION['username'] = $r['username'];
    $_SESSION['namalengkap'] = $r['nama_lengkap'];
    $_SESSION['passuser'] = $r['password'];

    $id_lama = session_id();
    session_regenerate_id();
    $id_baru = session_id();

    echo "<script>alert('Selamat Datang $_SESSION[namalengkap]');
    window.location=media.php </script>";
    header('location:media.php?p=home');
} else {
    echo "<script>alert('Login Gagal Username dan Password anda salah'); window.location=index.php </script>";
    header('location:index.php');
}
