<?php
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
            <h1>Data User</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data User</li>
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
                                                <form method="POST" action="insert_user.php">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <!-- Vertical Form -->
                                                            <div class="row-8">
                                                                <div class="col-12 mt-4">
                                                                    <label for="fullname" class="form-label">Nama</label>
                                                                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Masukan Nama" required>
                                                                </div>
                                                                <div class="col-12 mt-4">
                                                                    <label for="roles" class="form-label">Role</label>
                                                                    <select for="roles" name="roles" class="form-control" id="roles" required>
                                                                        <option value=""> -- Pilih Roles --</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-12 mt-4">
                                                                    <label for="username" class="form-label">Username</label>
                                                                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
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
                                        <th style="width: 5%;">No</th>
                                        <th>Nama</th>
                                        <th>Roles</th>
                                        <th>Username</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "config/koneksi.php";
                                    $i = 0;
                                    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_user ");
                                    while ($data = mysqli_fetch_array($tampil)) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $i ?></td>
                                            <td><?= $data['fullname']; ?></td>
                                            <td><?= $data['roles']; ?></td>
                                            <td><?= $data['username']; ?></td>
                                            <td style="text-align: center;">
                                                <a href="edit_user.php?id=<?= $data['id'] ?>" class="btn btn-primary btn btn-sm">Edit</a>
                                                <a href="delete_user.php?id=<?= $data['id'] ?>" class='btn btn-danger btn btn-sm' onclick="return confirm('Apakah anda yakin ingin menghapus ini ?')">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
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