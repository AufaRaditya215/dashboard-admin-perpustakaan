<!-- Validasi login -->
<?php
session_start();

// Simulasi login, biasanya login dilakukan melalui form
if (isset($_POST['login'])) {
    // Variabel $username seharusnya di-set berdasarkan form login
    $username = $_POST['username'];
    $_SESSION['username'] = $username;
}

// Logout
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    header("Location: index.php"); // Redirect ke halaman utama setelah logout
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
                    <img src="assets/img/man.png" alt="foto-profil" style="width: 75px; height: 75px;">
                    <h4 class="mt-2 text-capitalize"><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></h4>
                    <p><?php echo isset($_SESSION['username']) ? 'Admin' : 'Guest'; ?></p>
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
            <div class="d-flex justify-content-end mb-3">
                <?php if (isset($_SESSION['username'])): ?>
                    <!-- Tampilkan tombol logout jika pengguna sudah login -->
                    <a href="?action=logout" class="btn btn-danger">Logout</a>
                <?php else: ?>
                    <!-- Tampilkan tombol login jika pengguna belum login -->
                    <a href="login.php" class="btn btn-primary">Login</a>
                <?php endif; ?>
            </div>
            <!-- Main Content -->
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
            }
            ?>
        </div>
        <!-- Content End -->
    </main>
    <!-- Containter End -->

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
