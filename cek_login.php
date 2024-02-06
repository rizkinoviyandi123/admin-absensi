<?php
session_start();
include "config/koneksi.php";
$username = $_POST['username'];
$password = md5($_POST['password']);
$cari = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username'
AND password='$password'");
$data = mysqli_fetch_array($cari);
if (!empty($data['username'])) {
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    echo "<script>alert('Berhasil Login');
window.location='menu.php';</script>";
} else {
    echo "<script>alert('Gagal Login'); window.location='login.php';</script>";
}
