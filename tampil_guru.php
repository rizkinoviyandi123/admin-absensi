<?php
include "config/koneksi.php";
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<script>alert('Anda tidak memiliki akses'); window.location =
'login.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include('templates/head.php') ?>

<body>
    <?php include('templates/header.php') ?>
    <?php include('templates/sidebar.php') ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Guru</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data Guru</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-2 mt-3 mb-3 ">
                                <a href='#' class='btn btn-primary btn btn-sm' data-bs-toggle="modal" data-bs-target="#basicModal">Tambah Data</a>
                                <div class="modal fade" id="basicModal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Form Tambah User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="col-lg-12">
                                                <form method="POST" action="insert_guru.php">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <!-- Vertical Form -->

                                                            <div class="row-8">
                                                                <div class="col-12 mt-3">
                                                                    <label for="nip" class="form-label">NIP</label>
                                                                    <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukan Username" required>
                                                                </div>
                                                                <div class="col-12 mt-3">
                                                                    <label for="fullname" class="form-label">Nama</label>
                                                                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Masukan Nama" required>
                                                                </div>
                                                                <div class="col-12 mt-3">
                                                                    <label for="username" class="form-label">Username</label>
                                                                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username" required>
                                                                </div>

                                                                <div class="col-12 mt-3">
                                                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                                                    <select for="gender" name="gender" class="form-control" id="gender" required>
                                                                        <option value=""> -- Pilih Jenis Kelamin --</option>
                                                                        <option value="L">L</option>
                                                                        <option value="P">P</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-12 mt-3">
                                                                    <label for="mapel_id" class="form-label">Mata Pelajaran</label>
                                                                    <select for="mapel_id" name="mapel_id" class="form-control" id="mapel_id" required>
                                                                        <option value=""> -- Pilih Mata Pelajaran --</option>
                                                                        <?php
                                                                        $tampil = mysqli_query($koneksi, "SELECT * FROM tb_mapel");
                                                                        while ($data = mysqli_fetch_array($tampil)) :
                                                                        ?>
                                                                            <option value="<?= $data['id'] ?>"><?= $data['nama_mapel'] ?></option>
                                                                        <?php endwhile ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-12 mt-3">
                                                                    <label for="addresss" class="form-label">Alamat</label>
                                                                    <div class="col-12">
                                                                        <textarea class="form-control" style="height: 100px" name="addresss" id="addresss"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-3">
                                                                    <label for="no_hp" class="form-label">No Hp</label>
                                                                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukan No Hp" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer mt-1">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form><!-- Vertical Form -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th style="width: 15px;">No</th>
                                        <th>Nama</th>
                                        <th>JK</th>
                                        <th style="width: 10%;">Mapel</th>
                                        <th style="width: 30%;">Alamat</th>
                                        <th>No Hp</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_guru INNER JOIN tb_user ON tb_guru.user_id = tb_user.id LEFT JOIN tb_mapel ON tb_guru.mapel_id = tb_mapel.id ");
                                    while ($data = mysqli_fetch_array($tampil)) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $i ?></td>
                                            <td><?= $data['fullname'] ?></td>
                                            <td style="text-align: center;"><?= $data['gender'] ?></td>
                                            <td><?= $data['nama_mapel'] ?></td>
                                            <td><?= $data['addresss'] ?></td>
                                            <td><?= $data['no_hp'] ?></td>
                                            <td style="text-align: center;">
                                                <a href="#" class="btn btn-primary btn btn-sm mt-1">Edit</a>
                                                <a href="#" class='btn btn-danger btn btn-sm mt-1' onclick="return confirm('Apakah anda yakin ingin menghapus ini ?')">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
    <?php include('templates/footer.php') ?>
</body>

</html>