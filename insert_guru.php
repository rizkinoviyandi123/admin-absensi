<?php
include "config/koneksi.php";
/* memasukan setiap data inputan kedalam
setiap variabel
*/
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = md5('guru123');
//Menjalankan kueri insert
$insert = mysqli_query($koneksi, "INSERT INTO tb_user
(fullname, username, roles, `password`
)
VALUES
('$fullname',
'$username',
'teacher',
'$password'
)
");
$user_id = $koneksi->insert_id;
$nip = $_POST['nip'];
$address = $_POST['addresss'];
$gender = $_POST['gender'];
$no_hp = $_POST['no_hp'];
$mapel = $_POST['mapel_id'];
//menjakankan query insert tb_guru
$insert = mysqli_query($koneksi, "INSERT INTO tb_guru
( 
user_id, nip, addresss, gender, no_hp, mapel_id
)
VALUES
(
    '$user_id',
    '$nip',
    '$address',
    '$gender',
    '$no_hp',
    '$mapel'
)
");
if ($insert) {
    //Jika proses delete berhasil
    header("location:tampil_guru.php");
} else {
    //Jika proses delete gagal
    echo "<p>Gagal Menyimpan !</p>";
    echo "<a href='tampil_guru.php'>Coba Lagi</a>";
}
