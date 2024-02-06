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
            <h1>Edit User</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Edit User</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Form</h5>

                    <!-- Vertical Form -->
                    <form class="row g-3" method="POST" action="update_user.php">
                        <?php
                        include "config/koneksi.php";
                        $id = $_GET['id'];
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id='$id'");
                        $data_user = mysqli_fetch_array($query);
                        ?>
                        <div class="col-12">
                            <input type="hidden" name="id" id="id" value="<?= $data_user['id'] ?>">
                            <label for="fullname" value="<?= $data_user['fullname'] ?>" class="form-label">Nama</label>
                            <input type="text" value="<?= $data_user['fullname'] ?>" class="form-control" name="fullname" id="fullname">
                        </div>
                        <div class="col-12">
                            <label for="roles" class="form-label">Role</label>
                            <select for="roles" name="roles" class="form-control" id="roles" required>
                                <option value="<?= $data_user['roles'] ?>"><?= $data_user['roles'] ?></option>
                                <option value=""> -- Pilih Roles --</option>
                                <option value="Admin"> Admin</option>
                                <option value="Teacher"> Teacher</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="username" value="<?= $data_user['username'] ?>" class="form-label">Username</label>
                            <input type="text" class="form-control" value="<?= $data_user['username'] ?>" name="username" id="username">
                        </div>
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-secondary">Close</button>
                        </div>
                    </form><!-- Vertical Form -->

                </div>
            </div>
        </div><!-- End Page Title -->
    </main><!-- End #main -->
    <?php include('templates/footer.php') ?>
</body>

</html>