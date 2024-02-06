<?php
include "config/koneksi.php";
/* memasukan setiap data inputan kedalam
setiap variabel
*/
$fullname = $_POST['fullname'];
$username = $_POST['username'];
//Menjalankan kueri insert
$insert = mysqli_query($koneksi, "INSERT INTO tb_user
(fullname, roles, username
)
VALUES
('$fullname',
'admin',
'$username'
)
");
if ($insert) {
    //Jika proses delete berhasil
    header("location:tampil_user.php");
} else {
    //Jika proses delete gagal
    echo "<p>Gagal Menyimpan !</p>";
    echo "<a href='tampil_user.php'>Coba Lagi</a>";
}
