<?php
include "config/koneksi.php";
/* memasukan setiap data inputan kedalam
setiap variabel
*/
$id_user = $_POST['id_user'];
$fullname = $_POST['fullname'];
$roles = $_POST['roles'];
$username = $_POST['username'];
//Menjalankan kueri update
$update = mysqli_query($koneksi, "UPDATE tb_user SET
fullname='$fullname',
roles='$roles',
username='$username'
WHERE id_user ='$id_user'
");

if ($update) {
    // Jika proses update berhasil
    echo "<script>alert('Berhasil diedit'); window.location='tampil_user.php';</script>";
} else {
    // Jika proses update gagal
    echo "<p>Gagal Menyimpan !</p>";
    echo "<a href='tampil_user.php'>Coba Lagi</a>";
}
