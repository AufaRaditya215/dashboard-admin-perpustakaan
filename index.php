<!-- Validasi login -->
<?php
session_start();

// Variabel $username di-set berdasarkan form login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $_SESSION['username'] = $username;
}

// Logout
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Perpustakaan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-light">
    <!-- Containter Start -->
    <main class="row d-flex">
        <!-- Sidebar Start -->
        <div class="col-sm-12 col-md-12 col-lg-3 sidebar">
            <ul class="nav d-flex flex-sm-row flex-lg-column p-4 flex-exsm">
                <!-- Profil -->
                <div class="d-flex flex-column align-items-center profil">
                    <?php if (isset($_SESSION['username'])): ?>
                        <img src="assets/img/profile.png" class="rounded-circle" alt="foto-profil" style="width: 75px; height: 75px;">
                        <h4 class="mt-2 text-capitalize"><?php echo $_SESSION['username']; ?></h4>
                        <p>Admin</p>
                    <?php else: ?>
                        <img src="assets/img/default-profile.png" class="rounded-circle" alt="foto-profil" style="width: 75px; height: 75px;">
                        <h4 class="mt-2 text-capitalize">Guest</h4>
                        <p>Guest</p>
                    <?php endif; ?>
                </div>
                <!-- Menu -->
                <div class="d-flex flex-column gap-2 align-items-start menu">
                    <h5 class="mt-3">Menu</h5>
                    <li class="nav-item">
                        <a class="nav-link d-flex gap-2" aria-current="page" href="index.php"><img src="assets/img/dashboard.png" alt="icon-dashboard" style="width: 25px; height: 25px;">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex gap-2" aria-current="page" href="?page=member"><img src="assets/img/member.png" alt="icon-member" style="width: 25px; height: 25px;">Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex gap-2" aria-current="page" href="?page=book"><img src="assets/img/book.png" alt="icon-book" style="width: 25px; height: 25px;">Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex gap-2" aria-current="page" href="?page=transaction"><img src="assets/img/transaction.png" alt="icon-transaction" style="width: 25px; height: 25px;">Transaction</a>
                    </li>
                </div>
            </ul>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="container-fluid col-sm-12 col-md-12 col-lg-9 p-4">
            <!-- Main Content -->
            <?php if (isset($_SESSION['username'])): ?>
                <!-- Tampilkan data jika pengguna sudah login -->
                <div class="d-flex justify-content-end mb-3">
                    <a href="?action=logout" class="btn btn-danger">Logout</a>
                </div>
                <?php
                $page = isset($_GET['page']) ? $_GET['page'] : '';
                $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';
                if ($page == "member") {
                    if ($aksi == "") {
                        include "page/member/member.php";
                    } elseif ($aksi == "add") {
                        include "page/member/add.php";
                    } elseif ($aksi == "edit") {
                        include "page/member/edit.php";
                    } elseif ($aksi == "delete") {
                        include "page/member/delete.php";
                    }
                } elseif ($page == "book") {
                    if ($aksi == "") {
                        include "page/book/book.php";
                    } elseif ($aksi == "add") {
                        include "page/book/add.php";
                    } elseif ($aksi == "edit") {
                        include "page/book/edit.php";
                    } elseif ($aksi == "delete") {
                        include "page/book/delete.php";
                    }
                } elseif ($page == "transaction") {
                    if ($aksi == "") {
                        include "page/transaction/transaction.php";
                    } elseif ($aksi == "add") {
                        include "page/transaction/add.php";
                    } elseif ($aksi == "edit") {
                        include "page/transaction/edit.php";
                    } elseif ($aksi == "delete") {
                        include "page/transaction/delete.php";
                    }
                } elseif ($page == "") {
                    include "home.php";
                }
                ?>
            <?php else: ?>
                <!-- Tampilkan pesan login jika pengguna belum login -->
                <div class="container-fluid alert alert-warning text-center" role="alert">
                    <h4 class="alert-heading">Akses Terbatas</h4>
                    <p>Anda harus login terlebih dahulu untuk melihat data.</p>
                    <hr>
                    <a href="login.php" class="btn btn-primary">Login Sekarang</a>
                </div>
            <?php endif; ?>
        </div>
        <!-- Content End -->
    </main>
    <!-- Containter End -->

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
