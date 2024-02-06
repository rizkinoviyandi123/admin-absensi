<?php
include "config/koneksi.php";
/* Mengambil nilai nim dari parameter get
yang dikirim dari tampil mahasiswa
*/
$id_user = $_GET['id'];
//Menjalankan kueri delete
$delete = mysqli_query($koneksi, "DELETE FROM tb_user WHERE id= '$_GET[id]'");
if ($delete) {
    //Jika proses delete berhasil
    header("location:tampil_user.php");
} else {
    //Jika proses delete gagal
    echo "<p>Gagal Menghapus !</p>";
    echo "<a href='tampil_user.php'>Coba Lagi</a>";
}
